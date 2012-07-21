<?php
/*
Template Name: Media Template
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

<div class="row">
  
  <div class="nine columns">
  
    <div class="row">
      <div class="primary-media twelve columns">
        <div class="panel group">
          
          <?php
          $args=array(
            'mediatype' => 'video',
            'post_type' => 'resource',
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'caller_get_posts'=> 1,
            'order'=>'ASC',
            'orderby'=> 'menu_order',
            'meta_key' => 'wpcf-featured',
            'meta_value' => 'yes'
          );

          $my_query = null;
          $my_query = new WP_Query($args);

          if( $my_query->have_posts() ) {
            while ($my_query->have_posts()) : $my_query->the_post(); ?>

              <?php
                $mediatype = 'thumbnail';

                foreach ( (array) get_object_taxonomies($post->post_type) as $taxonomy ) {
                  if($taxonomy !== 'mediatype') { continue; }
                  $object_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'all'));
                  if ($object_terms) {
                    $c = 0;
                    foreach ($object_terms as $term) {
                      if($c == 0) {
                        $mediatype = $term->name;
                        break;
                      }
                      // echo '<p><a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a><p> ';
                      $c++;
                    }
                  }
                }
              ?>

              <div class="left">
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
                      $thumb  = $td . "/images/default-".strtolower($mediatype).".gif";
                    }

                    $myvj_options['poster'] = $thumb;
                    
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

              <h4 class="seriftext"><?php the_title(); ?></h4>
              <?php the_content(); ?>

              <?php endwhile; ?>

          <?php 
            } 
          wp_reset_query();  // Restore global post data stomped by the_post().
          ?>
        </div>
      </div>
    </div>


  </div>



  <div class="three columns">
        <?php if ( ! dynamic_sidebar( 'media-sidebar' ) ) : ?>
        <?php endif; // end Archive ?>
  </div>

</div>

<br>

<?php get_footer(); ?>