<?php
/*
Template Name: Press Template
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
  
  <div class="twelve columns">

    <h2 class="seriftext"><?php the_title(); ?></h2>

    <?php echo $post->post_content; ?>

  </div>

</div>

<?php get_footer(); ?>