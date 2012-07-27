<?php
/*
Template Name: Contact Template
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
<article class="row">
  <div class="nine columns">
  
        <header class="entry-header">
          <?php the_post_thumbnail(); ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <?php echo the_content(); ?>

  </div>
  
  <div class="three columns">
    <div class="panel">
        <p>
            <strong>Head Office</strong><br>
            Every Home<br>
            The Tannery<br>
            91 Kirkstall Road<br> 
            Leeds LS3 1HE<br>
            United Kingdom<br>
            <br><br>
            Telephone &amp; Email<br>
            0845 319 8314<br>
            <a href="mailto:jobs@workforeveryhomes.co.uk">jobs@workforeveryhomes.co.uk</a>
        </p>
    </div>
  </div>

</article>
<?php get_footer(); ?>