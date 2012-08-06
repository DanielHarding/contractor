<?php
/*
Template Name: News Template
*/
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Now
 * @since Now 1.0
 */
get_header(); ?>

<div class="row">
 
  <div class="nine columns">
    &nbsp;
  </div>

  <div class="three columns">
    <?php if ( ! dynamic_sidebar( 'news-sidebar' ) ) : ?>
    <?php endif; // end Archive ?>
  </div>

</div>


<?php get_footer(); ?>