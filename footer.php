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