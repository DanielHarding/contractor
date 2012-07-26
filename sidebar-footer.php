<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package Now
 * @since Now 1.0
 */
?>



  <!-- Start footer -->
  <footer class="row">
  
	<?php do_action( 'before_sidebar' ); ?>
	<?php if ( ! dynamic_sidebar( 'footer' ) ) : ?>

    <!--<section class="four columns">
      <div id="blogfeed">

        <?php

        $toptions = get_option( 'contractor_theme_options' ); 

        if($toptions) {

          $str = "";
          $feed_url = $toptions['blog_feed_url'];
          $feed_id = md5($feed_url . date("d-m-Y"));
          $lim = $toptions['blog_item_limit'];
         
          if(isset($_GET['debug'])) {
            var_dump($feed_url);
          }

          $cached = wp_cache_get($feed_id);
          if(empty($cached)) {

            include_once(ABSPATH.WPINC.'/rss.php'); // path to include script
            $feed = fetch_rss($feed_url); // specify feed url

            if(isset($_GET['debug'])) {
              var_dump($feed);
            }            

            $items = array_slice($feed->items, 0, $lim); // specify first and last item
            ?>

            <?php if (!empty($items)) : ?>
            <?php foreach ($items as $item) : ?>

            <?php 
            $str .= "<h4 class='seriftext'><a href='" . $item['link'] ."'>" . $item['title'] . "</a></h4>";
            $str .= "<p>" . $item['description'] . "</p>";
            ?>

            <?php endforeach; ?>
            
            <?php wp_cache_set( $feed_id, $str ); ?>

            <?php endif; ?>

          <?php 
          } else {
            echo $str = $cached;
          } 

          echo $str;

        }

        ?>

      </div>
    </section>-->

		<div class="three columns">          
		  <?php 
		  $defaults = array(
		    'theme_location'  => 'footer',
		    'menu'            => 'footer', 
		    'container'       => 'menu-container', 
		    'container_id'    => 'container-id',
		    'menu_class'      => 'simple-list', 
		    'menu_id'         => 'menu-id',
		    'echo'            => true,
		    'fallback_cb'     => 'wp_page_menu');
		  
		  wp_nav_menu( $defaults ); 
		  
		  ?>
		</div>

		<div class="three columns">
		    <h5>Contact EveryHome</h5>
		    <ul class="simple-list">
		      <li><a href="/contact">Contact Us Web Form</a></li>
		      <li><strong>Email:</strong> <a href="mailto:jobs@workforeveryhome.co.uk">jobs@workforeveryhome.co.uk</a></li>
		      <li><strong>Phone:</strong> 0845 319 8314</li>
		      <li>Registered UK and Wales.</li>
		      <li>&copy 2012 Everyhome LTD</li>
		      <li></li>
		    </ul>
		</div>

		<div class="two columns">
		    <h5>Head Office&nbsp;</h5>
		    <ul class="simple-list">
		      <li><strong>The Tannery</strong></li>
		      <li>91 Kirkstall Road</li>
		      <li>Leeds LS3 1HE</li>
		      <li>United Kingdom</li>
		      <li><strong><a href="/contact/">Map and Directions</a></strong></li>
		    </ul>
		</div>

    <?php endif; // end sidebar widget area ?>

  </footer>
  <!-- End footer -->

