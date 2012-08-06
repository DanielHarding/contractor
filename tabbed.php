<?php
/*
Template Name: Tabbed Template
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

      <h3 class="seriftext">What is <?php the_title(); ?>? | <sup>What do I need to know?</sup></h3> 
      <?php the_content(); ?>
      <div class="wrapper">
        <div id="st-accordion" class="st-accordion">
          <ul>

            <?php 
            $product_subs = get_pages( array( 'child_of' => get_the_id(), 'sort_column' => 'menu_order', 'sort_order' => 'ASC' ) );
            foreach( $product_subs as $page ) { 
            ?>

            <li>
              <a href="#">I am an <?php echo $page->post_title; ?><span class="st-arrow">Open or Close</span></a>
              <div class="st-content">
                <?php
                  echo $page->post_content;
                ?>
              </div>
            </li>

            <?php } ?>

          </ul>
        </div>
      </div>

      <?php $c++; } ?>
   
  </div>



  <!-- Start quick contact form -->
  <div class="three columns">
    <a name="quick-contact" id="quick-contact"></a>
    <div class="quickcontact slim-panel blue_gradient box_round">
      <h4 class="huge-phone blue_textshadow">Quick contact</h4>
      <?php echo RGForms::get_form(2, false, false, true); ?>      
      <script type='text/javascript'> jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render', [1, 1]) } ); </script>
    </div>
  </div>
  <!-- End quick contact form -->


</div>


<?php get_footer(); ?>