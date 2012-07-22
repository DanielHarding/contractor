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
  </div>
  <!-- End banner -->

  <!-- Start advice form -->
  <div class="three columns">
    <div class="hide-for-small show-for-medium">
      <div class="vspace20 hide-for-large">&nbsp;</div>
      <form action="/" method="post" name="contact" class="custom">
        <h4 class="huge-phone">Call 033 33 707 247</h4>
        <fieldset class="nobord nopad nomarg">
          <legend>Or email <span class="tiny-text label success"><a href="mailto:name@domain.com">name@domain.com</a></span></legend>
          <input type="text" name="name" name="rfrm_name" placeholder="Your name (required)" />
          <input type="text" name="email" name="rfrm_email" placeholder="Email address (required)" />
          <input type="text" name="phone" name="rfrm_phone" placeholder="Phone number" />
          <textarea name="message" id="rfrm_message" placeholder="Message" class="slim_textarea"></textarea>
          <span class="tiny-text left">We'll get back to you soon...</span>
          <input type="submit" name="send_contact" value="Submit" class="button small right"/>
        </fieldset>
      </form>
    </div>
  </div>
  <!-- End advice form -->

</div>




<!-- Start row 2 -->
<div class="row hide-for-small show-for-medium">
  
  <div class="three columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet1.gif">
  </div>

  <div class="three columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet2.png">
  </div>

  <div class="three columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet3.png">
  </div>

  <div class="three columns">
    <!-- 
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet.gif">
    -->

    <?php
      if( function_exists( 'attachments_get_attachments' ) ) {

        $attachments = attachments_get_attachments(get_the_id());

        if(isset($_GET['debug'])) {
          var_dump($attachments);
        }

        $total_attachments = count( $attachments );
        if(!empty($total_attachments)) {
          
          $myvj_options = array();

          // get_template_directory_uri()
          $thumb = get_the_post_thumbnail();
          if(empty($thumb) || trim($thumb) == '') {
            $td = get_template_directory_uri();
            $thumb  = $td . "/images/default-video.gif";
          }

          $myvj_options['width'] = "240px";
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
    ?>

  </div>

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
      
      <div class="vspace30 hide-for-small">&nbsp;</div>

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


      <h3>All Services</h3>
      <ul class="simple-list ico-list">
        <?php 
          query_posts(array('showposts' => 20, 
                            // 'post_parent' => $post->ID, 
                            'order'=>'ASC',
                            'orderby'=> 'menu_order',
                            'post_type' => 'service',
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
            <span class="ico-<?php echo $tok; ?> twenty-four-sq">&nbsp;</span>
            <?php echo '<a href="' . get_permalink() . '">'.$ti.'</a>'; ?>
          </li>

        <?php 
        $c++;
        } 
        ?>
      </ul>


  </div>

</div>





<!-- 
<?php
/*
if( function_exists( 'attachments_get_attachments' ) ) {
  $attachments = attachments_get_attachments(get_the_id());

  if(isset($_GET['debug'])) {
    var_dump($attachments);
  }

  $total_attachments = count( $attachments );
  if(!empty($total_attachments)) {
?>
<div class="row">
  <div class="twelve columns">
    <ul>
      <?php 
      for( $i=0; $i<$total_attachments; $i++ ) {
      ?>
             
      <li><a href="<?php echo $attachments[$i]['location']; ?>">Download</a></li>
      
      <?php
      }
      ?> 
      </ul>
  </div>
</div>
<?php 
    }
  }
  */
?>
-->


<div class="row">
  <hr>
</div>


<div class="row">

  <div class="four columns">
    <a href="/wp-content/uploads/2012/07/guide.pdf"><img src="<?php echo get_template_directory_uri(); ?>/images/guide.png"></a>
  </div>

  <div class="four columns">
  <?php echo sfstst_onerandom(); ?>
  </div>

  <div class="four columns">
      <a href="/wp-content/uploads/2012/07/guide.pdf"><img src="<?php echo get_template_directory_uri(); ?>/images/apply.png"></a>
  </div>

</div>


<?php get_footer(); ?>