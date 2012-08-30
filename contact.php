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
  <div class="eight columns">
  
        <header class="entry-header">
          <?php the_post_thumbnail(); ?>
          <h1 class="entry-title"><?php the_title(); ?></h1>
        </header><!-- .entry-header -->

        <?php echo the_content(); ?>
  </div>
  
  <div class="four columns">
    <div class="panel radius callout ">
        <p>
            <strong>Head Office</strong><br>
            Every Home LTD<br>
            The Tannery<br>
            91 Kirkstall Road<br> 
            Leeds LS3 1HS<br>
            United Kingdom<br>
            <br><br>
            Telephone &amp; Email<br>
            0845 319 8314<br>
            <a href="mailto:jobs@workforeveryhome.co.uk">jobs@workforeveryhome.co.uk</a>
        </p>
    </div>
    
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
    	
    	<a href="/" class="logobrand-house">Every Home Recruitment</a>
    	</div>
    
  </div>

</article>
<?php get_footer(); ?>