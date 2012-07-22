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
  <div class="eight columns">

      <h2 class="seriftext"><?php the_title(); ?></h2>
      <?php echo $post->post_content; ?>

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



  <div class="four columns centered">

    <div class="panel">

      <form action="/" method="post" name="contact" class="custom">

        <span>Call</span>
        <h4 class="subheader seriftext huge-phone">0333 332 2222</h4>
        <span>Free Auto Enrolment pension advice</span>
        
        <fieldset>
          
          <legend>Or simply fill out this form</legend>
          
          <input type="text" name="name" placeholder="Your name (required)" />
          <input type="text" name="company" placeholder="Company name (required)" />
          <input type="text" name="email" placeholder="Email address (required)" />
          <input type="text" name="phone" placeholder="Phone number" />
          
          <label for="checkbox1" class="seriftext">
            <input type="checkbox" id="checkbox1" name="newsletter" style="display: none;">
            <span class="custom checkbox"></span> NOW:Pensions newsletter?
          </label>
          <br>
          <p>
          <input type="submit" name="send_contact" value="Submit" />
          </p>

        </fieldset>

      </form>

    </div>

  <!--  
    <div class="vspace60 hide-for-small">&nbsp;</div>
    <ul class="side-nav seriftext">
      <li class="active"><a href="#">NOW:Pensions For Employers</a></li>
      <li class="divider"></li>
      <li><a href="#">NOW:Pensions For Advisors</a></li>
      <li class="divider"></li>
      <li><a href="#">NOW:Pensions For Employees</a></li>
    </ul>
    <div class="vspace60 hide-for-small">&nbsp;</div>
  -->

  </div>

</div>


<?php get_footer(); ?>