<?php
/**
 * @package Now
 * @since Now 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_post_thumbnail(); ?>
		<?php the_content(); ?>

		<h4>General Contractor Requirements</h4>
		<ul class="simple-list">
			<li>UK Citizen</li>
			<li>Requirement</li>
			<li>Requirement</li>
			<li>Requirement</li>
		</ul>

		<?php 
		$required_trade_certificates = get_post_meta($post->ID, 'wpcf-certificate'); 
		// var_dump($required_trade_certificates);
		if(!empty($required_trade_certificates)) {
			echo "<h4>Trade Specific Requirements</h4>";
			echo "<ul class='simple-list'>";
			foreach ($required_trade_certificates as $value) {
				echo "<li>$value (Required)</li>";	
			}	
			echo "</ul>";
		}
		?> 

		<h4>Contractor Application Form</h4>
		<form action="" method="post" name="apply" id="frm_apply">

			<legend>Basics</legend>

			<label for="">First Name <span class="required">*</span></label>
			<input type="text" name="first_name" id="f_first_name" value="" placeholder="First Name"/>

			<label for="">Last Name <span class="required">*</span></label>
			<input type="text" name="last_name" id="f_last_name" value="" placeholder="Last Name"/>

			<label for="">Email <span class="required">*</span></label>
			<input type="text" name="email" id="f_email" value="" placeholder="Email"/>

			<label for="">Telephone <span class="required">*</span></label>
			<input type="text" name="telephone" id="f_telephone" value="" placeholder="Telephone"/>

			<legend>Requirements</legend>

			<?php
			if(!empty($required_trade_certificates)) {
				echo "<ul class='simple-list'>";
				foreach ($required_trade_certificates as $value) { 
					$tok = str_replace(' ', '', $value);
				?>
				<li>
					<div class='row'>
						<div class="one mobile-one columns">
							<label for="ch_{$tok}"><?php echo $value; ?></label>
						</div>
						<div class="eleven mobile-three columns">
							<input type="checkbox" name="$value" value="1" id="ch_{$tok}"/>
						</div>
					</div>
				</li>
				<?php	
				}	
				echo "</ul>";
			}
			?> 

			<br>
			<input type="submit" value="Submit" id="btn_apply"/>
		</form>


		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'contractor' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
