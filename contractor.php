<?php
/*
Template Name: Contractor Template
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

  <section role="main">

    <h2 class="seriftext"><?php the_title(); ?></h2>
    <?php echo $post->post_content; ?>

    <ul class="tabs-content">

      <?php 
        $lstr = "";
        query_posts(array('showposts' => 20, 
                          'post_parent' => $post->ID, 
                          'order'=>'ASC',
                          'orderby'=> 'menu_order',
                          'post_type' => 'trade',
                          'post_status' => 'publish',
                          'posts_per_page' => 100)); 

        $c=0;
        while ($p = have_posts()) { 
          the_post();

          // Remove spaces
          $tok = strtolower(str_replace(' ', '-', get_the_title(get_the_id())));
          $tok = str_replace(':', '', $tok);
          $tok = str_replace('--', '-', $tok);

          // Set first item as active
          $klass = ($c == 0) ? 'active' : '';

          $lstr .= '<dd class="' . $klass . ' group"><a href="#' . $tok . '"><img src="' . get_template_directory_uri() . '/images/circular-links.gif" class="right"/></a></dd>';
        ?>

        <li id="<?php echo $tok; ?>Tab" class="<?php echo $klass; ?>">
          <?php the_content(); ?>
        </li>

      <?php 
      $c++;
      } 
      ?>

    </ul>

  </section>

  <section role="complementary" class="imglinks">
    <dl class="tabs vertical">
    <?php echo $lstr; ?>
    </dl>
  </section>

</div>


<?php get_footer(); ?>