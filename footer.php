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

      <footer class="row">
    
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

        <!--<div class="four columns">
          <div class="tweet-box">
            <div class="vspace20">&nbsp;</div>
              <?php           
              $wpTwitterWidget = wpTwitterWidget::getInstance();  
              if(!empty($wpTwitterWidget)) {      
                // echo $wpTwitterWidget->display($wpTwitterWidget->getSettings($wpTwitterWidget));
              }
              ?>
            </p>
          </div>
        </div>-->

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

      </footer>
    <div class="row">           
      <div class="one centered">
        <div class="circle" id="top_circle">
          <h5><a href="#top" id="btn_top" class="">Top</a></h5>
        </div>
      </div>
    </div>
  </section>
  <!-- End maincontent -->
   
  <?php 
  if(isset($_GET['debug'])) { 
  ?>
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
  <?php
  }
  ?>
  
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