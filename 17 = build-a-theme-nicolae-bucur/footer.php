<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package meetup_wp
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">

     <?php if( get_theme_mod( 'hide_widget_footer' ) == '') { ?>

        <div class="container">
		  <div class="row">
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-left' ); ?>
		    </div><!-- end .col-md-4 -->
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-center' ); ?>
		    </div><!-- end .col-md-4 -->
		    <div class="col-md-4">
		       <?php dynamic_sidebar( 'footer-right' ); ?>
		    </div><!-- end .col-md-4 -->
		  </div><!-- end .row -->
		</div><!-- end .container -->

	<?php } // end if ?>

		<div class="site-info">
		 <div class="container">
		  <div class="row">
		    <div class="col-md-12">

		     &copy; <?php echo date("Y"); ?> <?php echo get_theme_mod('copyright_footer'); ?>
		       
		    </div><!-- end .col-md-12 -->
		  </div><!-- end .row -->
		 </div><!-- end .container -->
		</div><!-- .site-info -->

	</footer><!-- #colophon -->

<a href="#" id="back-to-top" title="Back to top">&uarr;</a>

<?php wp_footer(); ?>

</body>
</html>
