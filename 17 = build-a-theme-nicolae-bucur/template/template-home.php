<?php
/**
 * Template name: Template Home
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package meetup_wp
 */

get_header(); ?>


<?php // echo do_shortcode('[slider]'); ?>

<div class="home">

<div class="container">
  <div class="row">

    <div class="col-md-12">
      <h2 class="welcome">Welcome to wp site</h2>
    </div>

	<div class="col-md-4 center-block">
      <div class="box_info">
         <img src="/wp-content/themes/meetup_wp/images/icon1.png">
         <h3>Info style</h3>
         <button class="box">Read More</button>
     </div>
	</div>
	<div class="col-md-4 center-block">
       <div class="box_info">
         <img src="/wp-content/themes/meetup_wp/images/icon2.png">
         <h3>Info style</h3>
         <button class="box">Read More</button>
     </div>

	</div>
	<div class="col-md-4 center-block">
       <div class="box_info">
         <img src="/wp-content/themes/meetup_wp/images/icon3.png">
         <h3>Info style</h3>
         <button class="box">Read More</button>
     </div>

	</div>

  </div><!-- end .row -->
 </div><!-- end .container -->

   <div class="paralax">
    <h2 class="paralax">Lorem Ipsum-ul generat</h2>
    <div class="container">
     <p><i class="fa fa-arrow-right" aria-hidden="true"></i> Există o mulţime de variaţii disponibile ale pasajelor Lorem Ipsum, dar majoritatea lor au suferit alterări într-o oarecare măsură prin infiltrare de elemente de umor, sau de cuvinte luate aleator, care nu sunt câtuşi de puţin credibile. Daca vreţi să folosiţi un pasaj de Lorem Ipsum, trebuie să vă asiguraţi că nu conţine nimic stânjenitor ascuns printre randuri.
     <br> 
     <br><i class="fa fa-address-book" aria-hidden="true"></i> Toate generatoarele de Lorem Ipsum de pe Internet tind să repete bucăţi de text în funcţie de necesitate, astfel făcându-l pe acesta primul generator adevarat de pe Internet. El utilizează un dicţionar de peste 200 cuvinte din latina, combinate cu o cantitate considerabilă de modele de structuri de propoziţii, pentru a genera Lorem Ipsum care arată decent. Astfel, Lorem Ipsum-ul generat nu conţine repetiţii, infiltrări de elemente de umor sau de cuvinte non-caracteristice, etc.</p>
    </div>
   </div><!-- end .paralax -->
    
 </div>

<?php get_footer(); ?>
