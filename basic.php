<?php
/*
Template Name: Basic Template
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


<!-- Start quick contact form -->
<div class="three columns">
  <a name="quick-contact" id="quick-contact"></a>
  <div class="quickcontact slim-panel blue_gradient box_round">
    <h4 class="huge-phone blue_textshadow">Quick contact</h4>
    <?php echo RGForms::get_form(2, false, false, true); ?>      
    <script type='text/javascript'> jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render', [1, 1]) } ); </script>
  </div>
<!-- End quick contact form -->


<div class="panel radius">
<h3>Trade Jobs</h3>
      
      <ul class="simple-list ico-list">
        <?php 
          query_posts(array('showposts' => 20, 
                            // 'post_parent' => $post->ID, 
                            'order'=>'ASC',
                            'orderby'=> 'menu_order',
                            'post_type' => 'trade',
                            'post_status' => 'publish',
                            'posts_per_page' => 100)); 

          $c=0;
          while ($p = have_posts()) { 
            the_post();

            // Remove spaces
            $ti = get_the_title(get_the_id());
            $tok = strtolower(str_replace(' ', '-', $ti));
            $tok = str_replace(':', '', $tok);
            $tok = str_replace('--', '-', $tok);

            // Set first item as active
            $klass = ($c == 0) ? 'active' : '';
          ?>

          <li id="<?php echo $tok; ?>" class="<?php echo $klass; ?>">
            <span class="ico-trade-<?php echo $tok; ?> twenty-four-sq">&nbsp;</span>
            <?php echo '<a href="' . get_permalink() . '">'.$ti.'</a>'; ?>
          </li>

        <?php 
        $c++;
        } 
        ?>
      </ul>
	</div>

	<a href="/" class="logobrand-small right">Every Home Recruitment</a>

	</div>
	
	
</div>

<?php get_footer(); ?>