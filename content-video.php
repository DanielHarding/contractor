<?php
/**
 * @package Now
 * @since Now 1.0
 */
?>
<li>
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
      
      // ! TODO - the featured image thumbs isn't working...
      // $thumb = get_the_post_thumbnail();
      $thumb = false;
      if(empty($thumb) || trim($thumb) == '') {
        $td = get_template_directory_uri();
        $thumb  = $td . "/images/default-video.gif";
      }

      $myvj_options['poster'] = $thumb;

      $myvj_options['width'] = '258';
      $myvj_options['height'] = '200';
      
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
<div class="caption">
  <h6><?php the_title(); ?></h6>
</div>
</li>
