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
    <a href="/contractor-jobs-yorkshire/"><?php the_post_thumbnail(); ?></a>    
  </div>
  <!-- End banner -->



  <!-- Start advice form -->
  <div class="three columns">
    <a name="quick-contact" id="quick-contact"></a>
    <div class="hide-for-small slim-panel blue_gradient box_round">
      <!-- <h4 class="huge-phone blue_textshadow">Quick contact</h4> -->
      <?php echo RGForms::get_form(2); ?>
    </div>
  </div>
  <!-- End advice form -->



</div>



<!-- Start row 2 -->
<div class="row">
  
  <div class="three columns">
    <a href="/contractor-jobs-yorkshire/#phone">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet1.png" class="thumb">
    </a>
  </div>

  <div class="three columns">
    <a href="/contractor-jobs-yorkshire/#trades">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet2.png" class="thumb">
    </a>
  </div>

  <div class="three columns">
    <a href="/contractor-jobs-yorkshire/#applications">
    <img src="<?php echo get_template_directory_uri(); ?>/images/realtime.png" class="thumb">
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
<?php get_footer(); ?>