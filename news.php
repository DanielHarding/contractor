<?php
/*
Template Name: News Template
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
    &nbsp;
  </div>

<!--  
  <div class="nine columns">

    <h2 class="seriftext">Recent News Article Title</h2>
    
    <img src="<?php echo get_template_directory_uri(); ?>/images/default-news.gif" class="left"/>

    <p>
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna purus, molestie sit amet consequat ut, facilisis sed purus. Morbi non condimentum nunc. Cras rutrum rutrum rutrum. Nullam ornare eros et mauris vulputate ac vulputate diam vulputate. Etiam gravida vehicula lacinia. Nam dapibus ultrices lorem, a lobortis magna iaculis in. Duis nec diam tincidunt libero aliquet faucibus semper vitae urna. Curabitur pretium, massa id viverra sagittis, mauris ligula rhoncus nulla, nec ultrices lacus sem sed arcu. Duis sagittis mattis sapien non varius. Donec id nunc vitae mi aliquet vehicula non a eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nec quam nunc, eget tempus augue. Donec at odio felis. Aliquam sit amet porta libero.
    </p>

    <p>
    Nulla sit amet quam eros, non varius tellus. Mauris aliquet, urna aliquam tristique pulvinar, lorem lacus congue ipsum, eget blandit nunc dui a tortor. Ut ullamcorper risus id mauris rhoncus semper. Proin consectetur rhoncus elit, quis fringilla felis mattis vel. Nulla cursus varius metus, eu tristique diam cursus eu. Curabitur in sodales mauris. Donec mattis congue eros, et rhoncus ligula porta eu. Donec mi diam, malesuada eget accumsan semper, accumsan vitae metus. Praesent id nisl et mi aliquet dictum. Nulla quis arcu mi, vitae porta dui. Aenean ac lectus laoreet mauris dignissim vulputate. In cursus aliquet malesuada.
    </p>

    <div class="row">
      <hr>
    </div>

    <div class="row">
      <div class="left"><a href="#">Previous</a></div>
      <div class="right"><a href="#">Next</a></div>
    </div>

    <div class="row">
      <hr>
    </div>

  </div>
-->

<!-- 
  <div class="three columns">
    <h4 class="seriftext sideheading">Categories</h4>
    <ul class="simple-list">
      <li><a href="#">Company News</a></li>
      <li><a href="#">Industry News</a></li>
    </ul>
    <h4 class="seriftext sideheading">Archive</h4>
    <ul class="simple-list">
      <li><a href="#">July</a></li>
      <li><a href="#">June</a></li>
      <li><a href="#">May</a></li>
      <li><a href="#">April</a></li>
      <li><a href="#">March</a></li>
      <li><a href="#">February</a></li>
      <li><a href="#">January</a></li>
    </ul>
  </div>
-->

  <div class="three columns">
    <?php if ( ! dynamic_sidebar( 'news-sidebar' ) ) : ?>
    <?php endif; // end Archive ?>
  </div>

</div>



<!-- 
<div class="row">

  <div class="nine columns">
    <ul class="full-width group">
      <li class="group">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/default-news.gif" class="left"/></a>
        <h5 class="seriftext"><a href="#">News Article Title</a></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum fringilla dui, at vestibulum orci tempor et. Duis commodo justo at ligula rhoncus venenatis. Vivamus rhoncus, erat et tempus condimentum, justo velit commodo nisi, quis consequat sem lectus quis urna. Cras ac mauris erat. Morbi dignissim erat nec felis consequat vitae dapibus nisi mollis. Sed placerat leo sed eros pretium imperdiet.</p>
        <p><a href="#" class="right">More</a></p>
      </li>
      <li class="group">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/default-news.gif" class="left"/></a>
        <h5 class="seriftext"><a href="#">News Article Title</a></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum fringilla dui, at vestibulum orci tempor et. Duis commodo justo at ligula rhoncus venenatis. Vivamus rhoncus, erat et tempus condimentum, justo velit commodo nisi, quis consequat sem lectus quis urna. Cras ac mauris erat. Morbi dignissim erat nec felis consequat vitae dapibus nisi mollis. Sed placerat leo sed eros pretium imperdiet.</p>
        <p><a href="#" class="right">More</a></p>          
      </li>
      <li class="group">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/default-news.gif" class="left"/></a>
        <h5 class="seriftext"><a href="#">News Article Title</a></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum fringilla dui, at vestibulum orci tempor et. Duis commodo justo at ligula rhoncus venenatis. Vivamus rhoncus, erat et tempus condimentum, justo velit commodo nisi, quis consequat sem lectus quis urna. Cras ac mauris erat. Morbi dignissim erat nec felis consequat vitae dapibus nisi mollis. Sed placerat leo sed eros pretium imperdiet.</p>
        <p><a href="#" class="right">More</a></p>          
      </li>
      <li class="group">
        <a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/default-news.gif" class="left"/></a>
        <h5 class="seriftext"><a href="#">News Article Title</a></h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce elementum fringilla dui, at vestibulum orci tempor et. Duis commodo justo at ligula rhoncus venenatis. Vivamus rhoncus, erat et tempus condimentum, justo velit commodo nisi, quis consequat sem lectus quis urna. Cras ac mauris erat. Morbi dignissim erat nec felis consequat vitae dapibus nisi mollis. Sed placerat leo sed eros pretium imperdiet.</p>
        <p><a href="#" class="right">More</a></p>          
      </li>
    </ul>
  </div>

</div>
--> 


<?php get_footer(); ?>