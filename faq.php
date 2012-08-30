<?php
/*
Template Name: FAQ Template
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
      
        <?php $content = apply_filters('the_content', $post->post_content); echo $content; ?>

      </div>
    </article>
  </div>

<!-- Start quick contact form -->
<div class="three columns">
  <a name="quick-contact" id="quick-contact"></a>
  <div class="quickcontact slim-panel blue_gradient box_round">
    <h4 class="huge-phone blue_textshadow">Quick contact</h4>
    <?php echo RGForms::get_form(2, false); ?>
  </div>
</div>
<!-- End quick contact form -->
<a href="/" class="logobrand-house">Every Home Recruitment</a>
</div>

<div class="row">
  <hr>
</div>

<?php get_footer(); ?>