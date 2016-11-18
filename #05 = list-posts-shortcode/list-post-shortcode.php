<?php
function listpost_func($atts){
	ob_start ();

	$atts = shortcode_atts( array(
		'cat' => '',
		'count' => '6',
		'posts_id' => '',
		'excerpt' => false,
		'column' => 3
	), $atts, 'listpost' );


	// Query for remaining 4 post
	$count=0;
	$args = array ('cat' => $atts['cat'], 'posts_per_page' => $atts['count']);
	if(isset($atts['posts_id'])  && $atts['posts_id']!=''){
		$args['post__in'] = explode(',',$atts['posts_id']);
	}
	$query = new WP_Query( $args ); if ( $query->have_posts() ) { while (
	$query->have_posts() ) { $query->the_post();
		?>

		<?php if ($count==0) : ?>
			<div class="grid-full">
		<?php endif; ?>

		<div class=" crelatedposts col-1-<?php echo $atts['column'];?>">
			<div class="content">

				<div class="crelated-thumb"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php	the_post_thumbnail('myimg_xlarge', array('class' =>'thumbnail')); ?></a></div>
				<div class="crelated-caption"><p><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></p></div>
				<?php if( true == $atts['excerpt'] ) {?><div class="excerpt"><?php the_excerpt(); ?></div><?php } ?>
			</div>
		</div>

		<?php $count++; ?>
		<?php if ($count==$atts['column'] ||$query->found_posts==0) : ?>
			<?php $count=0; ?>
			</div>
		<?php endif; ?>
	<?php } } else {} wp_reset_postdata();?>


	<?php
	$html = ob_get_contents ();
	ob_end_clean ();

	return $html;
}
add_shortcode( 'listpost', 'listpost_func' );
?>