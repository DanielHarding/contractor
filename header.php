<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package Now
 * @since Now 1.0
 */
?><!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--><html class="no-js" <?php language_attributes(); ?>><!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'contractor' ), max( $paged, $page ) );

	?></title>

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/foundation.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/presentation.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/zurb.mega-drop.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/accordion.css">

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/stylesheets/now.css">

<!--[if lt IE 9]>
<link rel="stylesheet" href="/stylesheets/ie.css">
<![endif]-->

<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.foundation.js"></script>

<!-- IE Fix for HTML5 Tags -->
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

  <!-- Start header -->

<header>
    <div class="container">
    
      <div class="row">
        
        <div class="four columns">
          <a href="/"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" class="branding"></a>
        </div>
        
        <div class="eight columns slimhead">
            <nav class="right">
	            <?php 
	            $defaults = array(
	              'theme_location'  => 'main',
	              'menu'            => 'main', 
	              'container'       => 'menu-container', 
	              'container_id'    => 'container-id',
	              'menu_class'      => 'dropdown', 
	              'menu_id'         => 'menu-id',
	              'echo'            => true,
	              'fallback_cb'     => 'wp_page_menu');
	            
	            wp_nav_menu( $defaults ); 
	            
	            ?> 
	          </nav>
	
	          <div class="hairlinev">&nbsp;</div>
	
	          <span class="right subheader">Welcome to our recruitment site - <span class="label success"><a href="/contractors">calling all contractors!</a></span></span>
        </div>
      </div>
    
    </div>
  </header>
  
  <!-- End header -->

<section id="mainContent">

<?php 

/*
var_dump($post->ID);
About = 8
Product = 6
*/

$exclude_title_page_ids = array();
if (is_front_page() ) {

} else { 

  if(!in_array($post->ID, $exclude_title_page_ids)) {
?>
<!-- 
<div class="row">
  <div class="twelve columns">
    <h2 class="seriftext"><?php the_title(); ?></h2>
  </div>
</div>
-->
<?php
  }
} 

?>