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

	</div>

</div>
<?php get_sidebar('footer'); ?>
<?php get_footer(); ?>