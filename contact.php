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
<div class="row">
  <div class="nine columns">
  
        <header class="entry-header">
          <?php the_post_thumbnail(); ?>
          <h2 class="entry-title"><?php the_title(); ?></h2>
        </header><!-- .entry-header -->

        <?php echo the_content(); ?>

        <?php
          if( function_exists( 'gravity_form' ) ) {
            gravity_form(1, true, true, false, '', false);
          }
        ?>
  </div>
  
  <div class="three columns">
    <div class="panel">
        <p>
            <strong>Every Home Customer Service</strong><br>
            The Tannery<br>
            91 Kirkstall Road<br> 
            Leeds LS3 1HE<br>
            United Kingdom<br>
            <br><br>
            Telephone &amp; Email<br>
            033 33 707 247<br>
            info@every-home.co.uk
        </p>
    </div>
  </div>

</div>
<?php get_footer(); ?>