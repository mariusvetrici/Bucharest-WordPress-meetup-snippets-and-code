<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package meetup_wp
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="shortcut icon" href="<?php echo get_theme_mod( 'html5_favicon' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

	<header id="masthead" class="site-header" role="banner">
     <div class="container">
      <div class="row">
       <div class="col-lg-4 col-md-4 col-sm-12">

		   <div class="site-branding">
			    <?php
			     $custom_logo_id = get_theme_mod( 'custom_logo' );
	             $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
	             
				 if ($image == TRUE) { ?>
	               <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	                <img src="<?php echo $image[0]; ?>" alt="logo">
	               </a> 
	             <?php } else { ?>
	             <div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></div>
	            <?php 
	              }
	             ?>
		    </div><!-- .site-branding -->
        </div><!-- end .col-lg-4 .col-md-4 -->
        
          <div class="col-lg-8 col-md-8">
             <div class="header_html">
           	  <?php dynamic_sidebar( 'header-right' ); ?>
           </div>
        </div>
      </div><!-- end .row -->
    </div><!-- end .container -->
	</header><!-- #masthead -->
	    <nav id="site-navigation" class="main-navigation" role="navigation">
		<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
		  <i class="fa fa-bars" aria-hidden="true"></i> <?php esc_html_e( 'MENIU', 'meetup_wp' ); ?>
		</button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	<div class="clear"></div>
	<div id="content" class="site-content">