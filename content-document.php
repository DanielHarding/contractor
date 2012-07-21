<?php
/**
 * @package Now
 * @since Now 1.0
 */
if( function_exists( 'attachments_get_attachments' ) ) {
  $attachments = attachments_get_attachments(get_the_id());
  $total_attachments = count( $attachments );
  if( $total_attachments ) : ?>

    <?php $max = 1; ?>
    <?php for( $i=0; $i<$total_attachments; $i++ ) : ?>

      <?php if ($i >= $max) { break; } ?>
    
      <li>
        <div class="">
        <a href="<?php echo $attachments[$i]['location']; ?>" rel="bookmark" title="View <?php the_title_attribute(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/default-document.gif"/></a>
        </div>
        <h6><a href="<?php echo $attachments[$i]['location']; ?>" rel="bookmark" title="View <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h6>
      </li>

    <?php endfor; ?>

  <?php endif; ?>
<?php } ?>
