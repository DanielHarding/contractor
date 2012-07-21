<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Now
 * @since Now 1.0
 */
?>


  </section>
  <!-- End maincontent -->


  <!-- Start footer -->
  <footer class="row">
  
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

  </footer>
  <!-- End footer -->






  <!-- Start copyright -->
  <div id="copyright">
    <div class="row">

      <div class="twelve columns">

        <ul class="block-grid right link-list">
          <li>
            <a href="/privacy">Privacy</a>
          </li>
          <li>
            <a href="/terms-and-conditions">Terms and Conditions</a>
          </li>
          <li>
            <a href="/contact">Contact</a>
          </li>
          <li>&copy; EveryHome 2012
          </li>
        </ul>

      </div>
    </div>
  </div>
  <!-- End copyright -->


  <!-- 
  <div class="ten columns">
    <p class="debug">
      <strong class="show-for-xlarge">You are on a very large screen.</strong> 
      <strong class="show-for-large">You are on a large screen.</strong> 
      <strong class="show-for-large">You are on a large or very large screen.</strong>
      <strong class="show-for-medium">You are on a medium screen.</strong> 
      <strong class="show-for-medium">You are on a medium or small screen.</strong>
      <strong class="show-for-small">You are on a small screen, like a smartphone.</strong>
      <strong class="show-for-touch">You are on a touch-enabled device.</strong>
      <strong class="hide-for-touch">You are not on a touch-enabled device.</strong>
    </p>
  </div>
  -->


  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/foundation.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.accordion.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.easing.1.3.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.offcanvas.js"></script>
  <script src="<?php echo get_template_directory_uri(); ?>/js/app.js"></script>

  <script type="text/javascript">
    $(function() {
        $('#st-accordion').accordion({
          oneOpenedItem : true
        });
    });
  </script>

  <?php wp_footer(); ?>

</body>
</html>