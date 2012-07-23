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


    <div class="row">
      <footer>
    
        <div class="four columns">
          <h4>Information</h4>
          <ul class="simple-list">
            <li><a href="/about">About Us</a></li>
            <li><a href="/faq">FAQs</a></li>
            <li><a href="/liability-cover">Liability Cover</a></li>
            <li><a href="/privacy">Privacy</a></li>
            <li><a href="/terms-and-conditions">Terms and Conditions</a></li>
            <li><a href="/service-agreement">Service Agreement</a></li>
          </ul>
        </div>

        <div class="four columns">
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
        </div>

        <div class="two columns">
            <h4><span class="label">Contact EveryHome</span></h4>
            <ul class="simple-list">
              <li><a href="/contact">Contact Us Web Form</a></li>
              <li><strong>Email:</strong> <a href="mailto:name@domain.com">name@domain.com</a></li>
              <li><strong>Phone:</strong> 033 33 707 247</li>
              <li><strong>VAT:</strong> 012345678912345</li>
              <li>Registered UK and Wales.</li>
              <li>&copy 2012 Everyhome LTD</li>
              <li></li>
            </ul>
        </div>

        <div class="two columns">
            <h4>&nbsp;</h4>
            <ul class="simple-list">
              <li><strong>The Tannery</strong></li>
              <li>91 Kirkstall Road</li>
              <li>Leeds LS3 1HE</li>
              <li>United Kingdom</li>
              <li><strong><a href="">Map and Directions</a></strong></li>
              <li></li>
            </ul>
        </div>

      </footer>          
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