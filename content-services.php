<?php
/**
 * @package Now
 * @since Now 1.0
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_post_thumbnail(); ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php the_content(); ?>

		<div class="row"><hr></div>

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'contractor' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
