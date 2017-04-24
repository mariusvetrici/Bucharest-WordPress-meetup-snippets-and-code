<?php

// Register Style
function responsive() {
   wp_enqueue_style ( 'responsive', get_template_directory_uri() . '/css/responsive.css');
   wp_enqueue_style ( 'font-awesome.min', get_template_directory_uri() . '/css/font-awesome.min.css');
}
add_action( 'wp_enqueue_scripts', 'responsive' );

function wpse_google_webfonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    $query_args = array(
        'family' => 'Ubuntu+Condensed|Open+Sans:400italic,700italic,400,700',
        'subset' => 'latin,latin-ext',
    );
    wp_enqueue_style('google-webfonts',
        add_query_arg($query_args, "$protocol://fonts.googleapis.com/css" ),
        array(), null);
}
add_action( 'wp_enqueue_scripts', 'wpse_google_webfonts' );



// Enable for widget title
add_filter('widget_title', 'do_shortcode');
// Enable for widget text
add_filter('widget_text', 'do_shortcode');

// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
    global $post;
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function custom_excerpt( $length ) {
      return 25;
}
add_filter( 'excerpt_length', 'custom_excerpt', 999 );


function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

function bones_filter_ptags_on_images($content){
	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
global $wp_meta_boxes;

wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

function custom_dashboard_help() {
echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:bucurblog2009@gmail.com">here</a>. For WordPress Tutorials visit: <a href="http://www.bucurion.ro" target="_blank">Bucurion blog</a></p>';
}



function insert_css() {
?>
<style type="text/css">

header#masthead.site-header { 
    background: <?php echo get_theme_mod ('header_bgcolor'); ?> !important;
}

</style>

<?php }
add_action('wp_head', 'insert_css');





function wpb_author_info_box( $content ) {

global $post;
// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {

// Get author's display name 
$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );

// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );

// Get author's website URL 
$user_website = get_the_author_meta('url', $post->post_author);

// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));
 
if ( ! empty( $display_name ) )

$author_details = '<p class="author_name">About ' . $display_name . '</p>';

if ( ! empty( $user_description ) )
// Author avatar and bio

$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';

$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';  

// Check if author has a website in their profile
if ( ! empty( $user_website ) ) {

// Display author website link
$author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';

} else { 
// if there is no author website then just close the paragraph
$author_details .= '</p>';
}

// Pass all this info to post content  
$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
}
return $content;
}

// Add our function to the post content filter 
add_action( 'the_content', 'wpb_author_info_box' );

// Allow HTML in author bio section 
remove_filter('pre_user_description', 'wp_filter_kses');



/****** Add Thumbnails in Manage Posts/Pages List ******/
if ( !function_exists('AddThumbColumn') && function_exists('add_theme_support') ) {

    // for post and page
    add_theme_support('post-thumbnails', array( 'post', 'page' ) );

    function AddThumbColumn($cols) {

        $cols['thumbnail'] = __('Thumbnail');

        return $cols;
    }

    function AddThumbValue($column_name, $post_id) {

            $width = (int) 35;
            $height = (int) 35;

            if ( 'thumbnail' == $column_name ) {
                // thumbnail of WP 2.9
                $thumbnail_id = get_post_meta( $post_id, '_thumbnail_id', true );
                // image from gallery
                $attachments = get_children( array('post_parent' => $post_id, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
                if ($thumbnail_id)
                    $thumb = wp_get_attachment_image( $thumbnail_id, array($width, $height), true );
                elseif ($attachments) {
                    foreach ( $attachments as $attachment_id => $attachment ) {
                        $thumb = wp_get_attachment_image( $attachment_id, array($width, $height), true );
                    }
                }
                    if ( isset($thumb) && $thumb ) {
                        echo $thumb;
                    } else {
                        echo __('None');
                    }
            }
    }

    // for posts
    add_filter( 'manage_posts_columns', 'AddThumbColumn' );
    add_action( 'manage_posts_custom_column', 'AddThumbValue', 10, 2 );

    // for pages
    add_filter( 'manage_pages_columns', 'AddThumbColumn' );
    add_action( 'manage_pages_custom_column', 'AddThumbValue', 10, 2 );
}