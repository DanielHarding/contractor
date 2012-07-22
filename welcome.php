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
  <div class="eight columns">
    <?php the_post_thumbnail(); ?>
  </div>
  <!-- End banner -->

  <!-- Start advice form -->
  <div class="four columns">
    <div class="hide-for-small show-for-medium">
      <div class="vspace20 hide-for-large">&nbsp;</div>
      <form action="/" method="post" name="contact" class="custom">
        <h4 class="subheader seriftext huge-phone">Call 033 33 707 247</h4>
        <fieldset class="nobord nopad">
          <legend>Or drop us an email</legend>
          <input type="text" name="name" placeholder="Your name (required)" />
          <input type="text" name="email" placeholder="Email address (required)" />
          <input type="text" name="phone" placeholder="Phone number" />
          <!--
            <label for="checkbox1" class="seriftext">
              <input type="checkbox" id="checkbox1" name="newsletter" style="display: none;">
              <span class="custom checkbox"></span> I wish to subscribe to your newsletter
            </label>
            <br>
          -->
          <input type="submit" name="send_contact" value="Submit" class="button small"/>
        </fieldset>
      </form>
    </div>
  </div>
  <!-- End advice form -->

</div>




<!-- Start row 2 -->
<div class="row hide-for-small show-for-medium">
  
  <div class="four columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet1.gif">
  </div>

  <div class="four columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet2.gif">
  </div>

  <div class="four columns">
    <img src="<?php echo get_template_directory_uri(); ?>/images/triplet.gif">
  </div>

</div>




<!-- Start row 3 -->
<div class="row">
  
  <div class="eight columns">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <header class="entry-header">
        &nbsp;
      </header><!-- .entry-header -->

      <div class="entry-content">
        <?php echo $post->post_content; ?>
      </div>
    </article>
  </div>


  <div class="four columns">
      
      <div class="vspace30 hide-for-small">&nbsp;</div>
      <h3>All Trades</h3>
      
      <ul class="simple-list">
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

  <div class="two columns">
    <a href="/wp-content/uploads/2012/07/guide.pdf"><img src="<?php echo get_template_directory_uri(); ?>/images/guide.gif"></a>
  </div>

  <div class="eight columns">
  <?php echo sfstst_onerandom(); ?>
  </div>

  <div class="two columns">
      <a href="/contractors/"><img src="<?php echo get_template_directory_uri(); ?>/images/start.gif"></a>
  </div>

</div>


<?php get_footer(); ?>