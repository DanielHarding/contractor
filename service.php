<?php
/*
Template Name: Service Template
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

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">
        <?php the_post_thumbnail(); ?>
        <h1 class="entry-title"><?php the_title(); ?></h1>
      </header><!-- .entry-header -->

      <div class="entry-content">
      
        <?php echo $post->post_content; ?>

      </div>
    </article>

  </div>




  <div class="three columns">
  </div>

</div>

<?php get_footer(); ?>