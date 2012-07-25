<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Now
 * @since Now 1.0
 */

get_header(); ?>

<div class="row">
  
  <div class="nine columns">

	<?php if ( have_posts() ) : ?>

		<?php
		// var_dump(get_post_type($post));
		?>

		<?php $taxonomy_array = array(); ?>

		<header class="page-header">
			<h1 class="page-title">
				<?php
					if ( is_category() ) {
						printf( __( '%s', 'contractor' ), '<span>' . single_cat_title( '', false ) . '</span>' );

					} elseif ( is_tag() ) {
						printf( __( 'Tag Archives: %s', 'contractor' ), '<span>' . single_tag_title( '', false ) . '</span>' );

					} elseif ( is_author() ) {
						/* Queue the first post, that way we know
						 * what author we're dealing with (if that is the case).
						*/
						the_post();
						printf( __( 'Author Archives: %s', 'contractor' ), '<span class="vcard"><a class="url fn n" href="' . get_author_posts_url( get_the_author_meta( "ID" ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' );
						/* Since we called the_post() above, we need to
						 * rewind the loop back to the beginning that way
						 * we can run the loop properly, in full.
						 */
						rewind_posts();

					} elseif ( is_day() ) {
						printf( __( 'Daily Archives: %s', 'contractor' ), '<span>' . get_the_date() . '</span>' );

					} elseif ( is_month() ) {
						printf( __( 'Monthly Archives: %s', 'contractor' ), '<span>' . get_the_date( 'F Y' ) . '</span>' );

					} elseif ( is_year() ) {
						printf( __( 'Yearly Archives: %s', 'contractor' ), '<span>' . get_the_date( 'Y' ) . '</span>' );

					} else {
						 _e( 'Archives', 'contractor' );

					}
				?>
			</h1>
			<?php

				if ( is_category() ) {
					// show an optional category description
					$category_description = category_description();
					if ( ! empty( $category_description ) )
						echo apply_filters( 'category_archive_meta', '<div class="taxonomy-description">' . $category_description . '</div>' );

				} elseif ( is_tag() ) {
					// show an optional tag description
					$tag_description = tag_description();
					if ( ! empty( $tag_description ) )
						echo apply_filters( 'tag_archive_meta', '<div class="taxonomy-description">' . $tag_description . '</div>' );
				}
			?>
		</header>

		<?php rewind_posts(); ?>

		<?php // contractor_content_nav( 'nav-above' ); ?>

		<?php 
		/* Start the Loop

		We will loop the Posts and build an array that is grouped by the 'mediatype' Taxonomy.
		This allows us to display them as horizontal <ul><li> for each mediatype.

		*/
		?>
		<?php while ( have_posts() ) : the_post(); ?>

			<?php			
				foreach ( (array) get_object_taxonomies($post->post_type) as $taxonomy ) {
				  if($taxonomy !== 'mediatype') { continue; }
				  $object_terms = wp_get_object_terms($post->ID, $taxonomy, array('fields' => 'all'));
				  if ($object_terms) {
				    foreach ($object_terms as $term) {
				    	if(!isset($taxonomy_array[$term->name]) || empty($taxonomy_array[$term->name])) {
				    		$taxonomy_array[$term->name] = array();
				    	}
				    	$taxonomy_array[$term->name][] = my_return_template_part( 'content', strtolower($term->name));				    	
				    }
				  }
				}
			?>

		<?php endwhile; ?>


		<?php
		/*
		Now output the grouped rows.
		*/
		uksort($taxonomy_array, "mediatype_sort");
		foreach($taxonomy_array as $tk => $ta) {
		?>

	    <div class="row wpanel">
	      <h5><?php echo $tk; ?></h5>
	      <ul class="block-grid media-grid">
			<?php
			if(is_array($ta)) {
				foreach($ta as $ta_post) {
					print($ta_post);
				}
			}
			?>
	      </uL>
	    </div>

		<?php
			}
		?>

		<?php // contractor_content_nav( 'nav-below' ); ?>

	<?php else : ?>

		<?php get_template_part( 'no-results', 'archive' ); ?>

	<?php endif; ?>

	</div>


	<div class="three columns">
		<?php 
		// We need to branch between the news/media sidebars.

		if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
		<?php endif; // end Archive ?>
	</div>



</div>

<?php // get_sidebar(); ?>
<?php get_footer(); ?>