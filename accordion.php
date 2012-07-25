<?php
/*
Template Name: Accordion Template
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


    <div class="wrapper">
      <div id="st-accordion" class="st-accordion">
        <ul>    

    <?php 
      // echo "<pre>"; print_r($wp_query->query_vars); echo "</pre>";
      query_posts(array('showposts' => 20, 
                        'post_parent' => $post->ID, 
                        'order'=>'ASC',
                        'orderby'=> 'menu_order',
                        'post_type' => 'page',
                        'post_status' => 'publish',
                        'posts_per_page' => 100)); 

      $c=0;
      while ($p = have_posts()) { 
        the_post();
    ?>

          <li>
            <a href="#"><?php the_title(); ?><span class="st-arrow">Open or Close</span></a>
            <div class="st-content">
              <?php
                the_content();
              ?>
            </div>
          </li>


    <?php $c++; } ?>

        </ul>
      </div>
    </div>
 
  </div>



  <div class="three columns centered">

    <div class="panel">
      <h3>Core Principles</h3>
      <p>We pride ourselves on...</p>
      <ul>
        <li>Transparency</li>
        <li>Communication</li>
        <li>Item 3</li>
      </ul>

    </div>

  </div>

</div>


<?php get_footer(); ?>