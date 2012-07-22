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
            <div class="twelve columns">
              <div class="three columns">
                <h3>Information</h3>
                <ul>
                  <li><a href="/about-us">About Us</a></li>
                  <li><a href="/where-we-cover">Where We Cover</a></li>
                  <li><a href="/faqs">FAQs</a></li>
                  <li><a href="/pages/terms">Terms</a></li>
                  <li><a href="/pages/sitemap">Sitemap</a></li>
                </ul>
                <hr>
                <ul>
                  <li><a href="/media-centre">Media Centre</a></li>
                  <li><a href="/careers">Careers</a></li>
                  <li><a href="/grants">Grants</a></li>
                  <li><a href="/articles">News</a></li>
                </ul>
                </div>
              <div class="three columns">
                <h3>
                  Contact Us
                </h3>
                <p>
                  <a href="/contact"></a>
                </p>
                <p>
                  Our Call Centre is in Yorkshire to serve Yorkshire! Grand.
                </p>
                <p>
                  <a href="/contact">Contact Us</a> to find out more.
                </p>
                <hr>
              </div>
              
              <div class="three columns footer-services-list">
                <h3>
                  Our Services
                </h3>
                <ul>
                  <li>
                    <a href="/services/view/1/boiler-heating">Boiler &amp; Heating</a>
                  </li>
                  <li>
                    <a href="/services/view/7/glazing-boarding">Glazing &amp; Boarding</a>
                  </li>
                  <li>
                    <a href="/services/view/2/plumbing">Plumbing</a>
                  </li>
                  <li>
                    <a href="/services/appliance_repair">Appliances</a>
                  </li>
                  <li>
                    <a href="/services/view/5/electrical">Electrical</a>
                  </li>
                  <li>
                    <a href="/services/view/4/burst-pipes">Burst Pipes</a>
                  </li>
                  <li>
                    <a href="/services/view/6/locksmith">Locksmith</a>
                  </li>
                  <li>
                    <a href="/services/view/43/pest-control">Blocked Drains</a>
                  </li>
                  <li>
                    <a href="/services/view/8/roofing">Roofing</a>
                  </li>
                  <li>
                    <a href="/services/view/43/pest-control">Pest Control</a>
                  </li>
                </ul>
              </div>
              
            </div>
            
<!--            <div class="col col-right footer-coverage-box">
              <p>
                <strong>Covering Yorkshire &amp; surrounding areas:</strong>
              </p>
              <ul>
                <li>
                  <strong>Right across Leeds</strong>
                </li>
                <li>
                  <strong>Bradford; Harrogate; York</strong>
                </li>
                <li>
                  <strong>Other areas as we grow</strong>
                </li>
              </ul>
              <p>
                Live within 90 mins of Leeds?<br>
                You’re covered!<br>
                <a href="/where-we-cover">Click Here</a>
              </p>
            </div>-->
            <p class="call-us"></p>
            <h3>
              MOBILE-FRIENDLY CALL: 033 33 707 247
            </h3>
          </footer>


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