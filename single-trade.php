<?php
/**
 * The Template for displaying all single posts.
 *
 * @package Now
 * @since Now 1.0
 */

get_header(); ?>


<div class="row">
  
	<div class="nine columns">
	<?php while ( have_posts() ) : the_post(); ?>
		<?php // contractor_content_nav( 'nav-above' ); ?>
		<?php get_template_part( 'content', 'trade' ); ?>
		<?php // contractor_content_nav( 'nav-below' ); ?>
	<?php endwhile; // end of the loop. ?>
	</div>




	<div class="three columns">
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




  <!-- Start advice form -->
  <div class="hide-for-small slim-panel blue_gradient box_round">
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
  <!-- End advice form -->


	</div>

</div>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>