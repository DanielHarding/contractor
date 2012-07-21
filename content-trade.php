<?php
/**
 * @package Now
 * @since Now 1.0
 */
?>

<?php
$required_trade_certificates = get_post_meta($post->ID, 'wpcf-certificate'); 
if(!empty($_POST)) {

	$req = array('first_name', 'last_name', 'email', 'telephone');
	$global_required = array('uk_citizen');

	$email_sent = false;
	$errs = $mess = false;
	$gerrs = $gmess = false;
	$serrs = $smess = false;

	if(count(array_merge($req)) > 0 
		&& isset($req[0]) 
			&& trim($req[0]) !=='') {

		foreach($req as $key) {
			if(!isset($_POST[$key]) || empty($_POST[$key])) {
				$errs = true;
				$mess = "There was an error in your submission - please complete all fields marked with *";
				break;
			}
		}

	}




	if(count(array_merge($global_required)) > 0 
		&& isset($global_required[0]) 
			&& trim($global_required[0]) !=='') {

		foreach($global_required as $key) {
			if(!isset($_POST[$key]) || empty($_POST[$key])) {
				$gerrs = true;
				$gmess = "Sorry - you don't meet the general contractor requirements *";
				break;
			}
		}

	}


	

	if(count(array_merge($required_trade_certificates)) > 0 
		&& isset($required_trade_certificates[0]) 
			&& trim($required_trade_certificates[0]) !=='') {

		foreach($required_trade_certificates as $key) {
			if(!isset($_POST[$key]) || empty($_POST[$key])) {
				$serrs = true;
				$smess = "Sorry - you don't meet the trade specific requirements *";
				break;
			}
		}

	}



	if(!$errs && empty($mess) && !$gerrs && empty($gmess) && !$serrs && empty($smess)) {
		// Success

		$from = "info@everyhome-recruitment.com";
		$subj = "Test Subject";
		$message = "Thanks for registering!";

		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer();
		$phpmailer->SMTPAuth = true;
		$phpmailer->Username = 'danny+withoutfanfare.com';
		$phpmailer->Password = 'wfaba0954';
		 
		$phpmailer->IsSMTP(); // telling the class to use SMTP
		$phpmailer->Host       = "withoutfanfare.com"; // SMTP server
		$phpmailer->FromName   = $from;
		$phpmailer->Subject    = $subj;
		$phpmailer->Body       = $message;                      //HTML Body
		$phpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$phpmailer->WordWrap   = 50; // set word wrap
		$phpmailer->MsgHTML($message);
		$phpmailer->AddAddress('support@wordpressapi.com/files/', 'Wordpress support');
		//$phpmailer->AddAttachment("images/phpmailer.gif");             // attachment
		
		$mailer->AddAddress($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);

		if(!$phpmailer->Send()) {
			$errs = true;
			$mess = "Mailer Error: " . $phpmailer->ErrorInfo;
		} else {
			$email_sent =  "Message sent!";
		}

	} 

}

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
		if(!empty($required_trade_certificates)) {
			
			if(count(array_merge($required_trade_certificates)) > 0 
				&& isset($required_trade_certificates[0]) 
					&& trim($required_trade_certificates[0]) !=='') {

				echo "<h4>Trade Specific Requirements</h4>";
				echo "<ul class='simple-list'>";

				foreach ($required_trade_certificates as $value) {
					if(empty($value)) { continue; }
					echo "<li>$value (Required)</li>";	
				}	
				echo "</ul>";

			}
		}
		?> 

		<a name="application" id="application"></a>

		<h4>Contractor Application Form</h4>

		<?php
		if(!empty($mess) && $errs) {
			echo "<p class='message-error'>{$mess}</p>";
		}

		if(!empty($gmess) && $gerrs) {
			echo "<p class='message-error'>{$gmess}</p>";
		}

		if(!empty($smess) && $serrs) {
			echo "<p class='message-error'>{$smess}</p>";
		}
		?>
		
		<form action="#application" method="post" name="apply" id="frm_apply">



			<fieldset>

				<legend>Basics</legend>

				<label for="">First Name <span class="required">*</span></label>
				<input type="text" name="first_name" id="f_first_name" value="" placeholder="First Name"/>

				<label for="">Last Name <span class="required">*</span></label>
				<input type="text" name="last_name" id="f_last_name" value="" placeholder="Last Name"/>

				<label for="">Email <span class="required">*</span></label>
				<input type="text" name="email" id="f_email" value="" placeholder="Email"/>

				<label for="">Telephone <span class="required">*</span></label>
				<input type="text" name="telephone" id="f_telephone" value="" placeholder="Telephone"/>

			</fieldset>





			<fieldset>

				<legend>General Contractor Requirements</legend>

				<ul class="simple-list">
					<li>
						<div class='row'>
							<div class="two mobile-one columns">
								<label for="ch_uk_citizen">UK Citizenship <span class="required">*</span></label>
							</div>
							<div class="ten mobile-three columns">
								<input type="checkbox" name="uk_citizen" value="1" id="ch_uk_citizen"/>
							</div>
						</div>
					</li>
				</ul>

			</fieldset>



			<?php
			if(count(array_merge($required_trade_certificates)) > 0 
				&& isset($required_trade_certificates[0]) 
					&& trim($required_trade_certificates[0]) !=='') {

				echo "<fieldset>";
				echo "<legend>Trade Specific Requirements</legend>";
				echo "<ul class='simple-list'>";
				foreach ($required_trade_certificates as $value) { 
					$tok = str_replace(' ', '', $value);
				?>
				<li>
					<div class='row'>
						<div class="two mobile-one columns">
							<label for="ch_{$tok}"><?php echo $value; ?> <span class="required">*</span></label>
						</div>
						<div class="ten mobile-three columns">
							<input type="checkbox" name="<?php echo $value; ?>" value="1" id="ch_{$tok}"/>
						</div>
					</div>
				</li>
				<?php	
				}	
				echo "</ul>";
				echo "</fieldset>";
			}
			?> 

		

			<input type="submit" value="Submit" id="btn_apply"/>

		</form>


		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'contractor' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
