<?php
/*
Template Name: Welcome Template
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


<!-- Start row 1 -->
<div class="row">
  
  <!-- Start banner -->
  <div class="nine columns">
    <?php the_post_thumbnail(); ?>
    
    
    
    <!--<div class='gf_browser_chrome gform_wrapper' id='gform_wrapper_2' ><form method='post' enctype='multipart/form-data'  id='gform_2'  action='/contact/'>
                            <div class='gform_heading'>
                                <h3 class='gform_title'>Quick Contact</h3>
                                <span class='gform_description'>Call - 0845 319 8314</span>
                            </div>
                            <div class='gform_body'>
                                <ul id='gform_fields_2' class='gform_fields top_label description_below'><li id='field_2_1' class='gfield               gfield_contains_required' ><label class='gfield_label' for='input_2_1'>Your name<span class='gfield_required'>*</span></label><div class='ginput_container'><input name='input_1' id='input_2_1' type='text' value='Your Name' class='medium'  tabindex='1'   /></div></li><li id='field_2_3' class='gfield               gfield_contains_required' ><label class='gfield_label' for='input_2_3'>Email Address<span class='gfield_required'>*</span></label><div class='ginput_container'><input name='input_3' id='input_2_3' type='text' value='Email Address' class='medium'  tabindex='2'   /></div></li><li id='field_2_4' class='gfield               gfield_contains_required' ><label class='gfield_label' for='input_2_4'>Company<span class='gfield_required'>*</span></label><div class='ginput_container'><input name='input_4' id='input_2_4' type='text' value='Company' class='medium'  tabindex='3'   /></div></li><li id='field_2_6' class='gfield' ><label class='gfield_label' for='input_2_6'>Phone number</label><div class='ginput_container'><input name='input_6' id='input_2_6' type='text' value='Phone Number' class='medium' tabindex='4'  /></div></li><li id='field_2_7' class='gfield' ><label class='gfield_label' for='input_2_7'>Message</label><div class='ginput_container'><textarea name='input_7' id='input_2_7' class='textarea medium' tabindex='5'   rows='10' cols='50'>Message</textarea></div></li>
                                </ul></div>
            <div class='gform_footer top_label'> <input type='submit' id='gform_submit_button_2' class='button gform_button' value='Submit' tabindex='6' />
                <input type='hidden' class='gform_hidden' name='is_submit_2' value='1' />
                <input type='hidden' class='gform_hidden' name='gform_submit' value='2' />
                <input type='hidden' class='gform_hidden' name='gform_unique_id' value='5011b401202f9' />
                <input type='hidden' class='gform_hidden' name='state_2' value='YToyOntpOjA7czo2OiJhOjA6e30iO2k6MTtzOjMyOiIxM2Y5MDVhMjdkNDQ1MTcwZWVmYTFlMGJhYmQ0ZWFmMSI7fQ==' />
                <input type='hidden' class='gform_hidden' name='gform_target_page_number_2' id='gform_target_page_number_2' value='0' />
                <input type='hidden' class='gform_hidden' name='gform_source_page_number_2' id='gform_source_page_number_2' value='1' />
                <input type='hidden' name='gform_field_values' value='' />
                
            </div>
                    </form>
                    </div><script type='text/javascript'> jQuery(document).ready(function(){jQuery(document).trigger('gform_post_render', [2, 1]) } ); </script>-->
    
    
    
  </div>
  <!-- End banner -->

  <!-- Start advice form -->
  <div class="three columns">
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
  </div>
  <!-- End advice form -->

</div>



<!-- Start row 2 -->
<div class="row hide-for-small">
  
  <div class="three columns">
    <a href="/contractors/#phone">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet1.png" class="thumb box_shadow">
    </a>
  </div>

  <div class="three columns">
    <a href="/contractors/#trades">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet2.png" class="thumb box_shadow">
    </a>
  </div>

  <div class="three columns">
    <a href="/contractors/#applications">
    <img src="<?php echo get_template_directory_uri(); ?>/images/realtime.png" class="thumb box_shadow">
    </a>
  </div>

  <div class="three columns">

    <?php
      if( function_exists( 'attachments_get_attachments' ) ) {

        $attachments = attachments_get_attachments(get_the_id());

        if(isset($_GET['debug'])) {
          var_dump($attachments);
        }

        $total_attachments = count( $attachments );
        $total_attachments = false;
        if(!empty($total_attachments)) {
          
          if( function_exists( 'vjspro_video_shortcode' ) ) {

            $myvj_options = array();

            // get_template_directory_uri()
            $thumb = get_the_post_thumbnail();
            if(empty($thumb) || trim($thumb) == '') {
              $td = get_template_directory_uri();
              $thumb  = $td . "/images/default-video.gif";
            }

            $myvj_options['width'] = "228px";
            $myvj_options['height'] = "120px";

            // $myvj_options['poster'] = $thumb;
            
            for( $i=0; $i<$total_attachments; $i++ ) {


              switch($attachments[$i]['mime']) {
                case 'video/mp4':

                  if(stripos($attachments[$i]['location'], '.m4v')) {
                    $myvj_options['mobile'] = $attachments[$i]['location'];
                  } else {
                    $myvj_options['mp4'] = $attachments[$i]['location'];
                  }

                break;
                case 'video/ogg':
                  $myvj_options['ogg'] = $attachments[$i]['location'];
                break;
                case '':

                break;
                default:
                break;
              }

            }

          }

          /*
          Example:
          $atts = array("poster" =>"http://nowpensions.mac/wp-content/uploads/2012/07/example.gif",
          "mobile" =>"http://nowpensions.mac/wp-content/uploads/2012/07/example.m4v",
          "ogg" =>"http://nowpensions.mac/wp-content/uploads/2012/07/example.ogg",
          "webm" =>"http://nowpensions.mac/wp-content/uploads/2012/07/example.webm",
          "mp4" =>"http://nowpensions.mac/wp-content/uploads/2012/07/example.mp4",
          "googleid" => "Test File");
          */

          echo vjspro_video_shortcode($myvj_options);

        } else {
          ?>

          <img src="<?php echo get_template_directory_uri(); ?>/images/non-franchise.png" class="thumb box_shadow">

          <?php
        }
    }

    ?>

  </div>

</div>


<div class="row">
  <hr>
</div>


<!-- Start row 3 -->
<div class="row">
  
  <div class="nine columns">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="entry-content">
        <?php echo $post->post_content; ?>
      </div>
    </article>
  </div>


  <div class="three columns">
      
      <div class="vspace10 hide-for-small">&nbsp;</div>

      <h3>All Trades</h3>
      
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

<div class="row prefooter">
  <div class="four columns">
  	<img src="/wp-content/themes/contractor/images/logo-safe.png" height="" width="" alt="Every Home Recruitment" />
  </div>
  <div class="four columns">
  <?php echo sfstst_onerandom(); ?>
  </div>
  <div class="four columns">
      <a href="/wp-content/uploads/2012/07/guide.pdf"><img src="<?php echo get_template_directory_uri(); ?>/images/apply.png"></a>
  </div>
</div>
<?php get_footer(); ?>