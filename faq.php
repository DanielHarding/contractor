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

  <!-- Start advice form -->
  <div class="three columns">
    <div class="hide-for-small show-for-medium slim-panel blue_gradient box_round">
      <form action="/" method="post" name="contact" class="custom">
        <h4 class="huge-phone blue_textshadow">Quick contact</h4>
        <fieldset class="nobord nopad">
          <input type="text" name="name" name="rfrm_name" placeholder="Your name (required)" />
          <input type="text" name="email" name="rfrm_email" placeholder="Email address (required)" />
          <input type="text" name="company" name="rfrm_company" placeholder="Company (required)" />
          <input type="text" name="phone" name="rfrm_phone" placeholder="Phone number" />
          <textarea name="message" id="rfrm_message" placeholder="Message" class="slim_textarea"></textarea>
          <!-- <span class="tiny-text left">We'll get back to you soon...</span> -->
          <input type="submit" name="send_contact" value="Submit" class="button small success radius right"/>
        </fieldset>
      </form>
    </div>
  </div>
  <!-- End advice form -->
<a href="/" class="logobrand-small right">Every Home Recruitment</a>
</div>

<div class="row">
  <hr>
</div>

<?php get_footer(); ?>