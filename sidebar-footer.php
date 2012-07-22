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

    <section class="four columns">
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
    </section>

    <section class="four columns">
      <div class="tweet-box">
        <div class="vspace20">&nbsp;</div>
          <?php           
          $wpTwitterWidget = wpTwitterWidget::getInstance();  
          if(!empty($wpTwitterWidget)) {      
            echo $wpTwitterWidget->display($wpTwitterWidget->getSettings($wpTwitterWidget));
          }
          ?>
        </p>
      </div>
    </section>

    <section class="four columns">
      <div class="vspace40 hide-for-small">&nbsp;</div>
      <ul class="block-grid two-up seriftext">
        <li><strong>EveryHome</strong><br>
            The Tannery<br>
            91 Kirkstall Road<br> 
            Leeds LS3 1HE<br>
            United Kingdom<br>
        </li>
        <li>
            Telephone &amp; Email<br>
            033 33 707 247<br>
            info@everyhome-recruitment.com
        </li>
      </ul>
    </section>

    <?php endif; // end sidebar widget area ?>

  </footer>
  <!-- End footer -->
