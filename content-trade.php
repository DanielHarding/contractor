<?php
/**
 * @package Now
 * @since Now 1.0
 */
?>

<?php
$required_trade_certificates = get_post_meta($post->ID, 'wpcf-certificate'); 
$trade_desirables = get_post_meta($post->ID, 'wpcf-desirable'); 
if(!empty($_POST)) {

	$req = array('first_name', 'last_name', 'email', 'telephone');
	$global_required = array('uk_citizen', 'uk_driving_licence');

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

		/*
export GMAIL_SMTP_USER=admin@redunderlongwave.com
export GMAIL_SMTP_PASSWORD=rulaba0954
export WEB_DOMAIN=www.redunderlongwave.com
		*/

		$from = "info@everyhome-recruitment.com";
		$subj = "Test Subject";
		$message = "Thanks for registering!";

		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer();
		$phpmailer->SMTPAuth = true;
		$phpmailer->Username = 'admin@redunderlongwave.com';
		$phpmailer->Password = 'rulaba0954';
		 
		$phpmailer->IsSMTP(); // telling the class to use SMTP
		$phpmailer->Host       = "www.redunderlongwave.com"; // SMTP server
		$phpmailer->FromName   = $from;
		$phpmailer->Subject    = $subj;
		$phpmailer->Body       = $message;                      //HTML Body
		$phpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$phpmailer->WordWrap   = 50; // set word wrap
		$phpmailer->MsgHTML($message);
		$phpmailer->AddAddress('support@wordpressapi.com/files/', 'Wordpress support');
		//$phpmailer->AddAttachment("images/phpmailer.gif");             // attachment
		
		$phpmailer->AddAddress($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);

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
		<?php the_post_thumbnail(); ?>
		<h2 class="entry-title"><?php the_title(); ?></h2>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
		<?php the_content(); ?>

		<ul class="block-grid two-up">
			<li>
				<div class='panel blue-panel'>
					<h4>General Requirements</h4>
					<ul class="simple-list">
						<li><span class='tick'>&#10003;</span>UK Citizen (Required)</li>
						<li><span class='tick'>&#10003;</span>UK Driving Licence (Required)</li>
					</ul>
				</div>
			</li>

			<?php 
			if(!empty($required_trade_certificates)) {
				
				if(count(array_merge($required_trade_certificates)) > 0 
					&& isset($required_trade_certificates[0]) 
						&& trim($required_trade_certificates[0]) !=='') {


					echo "<li><div class='panel blue-panel'>";
					echo "<h4>Trade Requirements</h4>";
					echo "<ul class='simple-list'>";

					foreach ($required_trade_certificates as $value) {
						if(empty($value)) { continue; }
						echo "<li><span class='tick'>&#10003;</span>$value (Required)</li>";	
					}	
					echo "</ul>";
					echo "</div></li>";

				}
			}
			?> 
		</ul>

		<?php
		if(count(array_merge($trade_desirables)) > 0 
			&& isset($trade_desirables[0]) 
				&& trim($trade_desirables[0]) !=='') {
		?>
		<div class='panel green-panel'>
			<h3>Desirables</h3>
			<ul class="simple-list">
				<?php
				foreach ($trade_desirables as $value) {
					if(empty($value)) { continue; }
					echo "<li><span class='awesome'>&#10003;</span>$value</li>";	
				}	
				?>
			</ul>
		</div>
		<?php
			}
		?>


		<div class="row"><hr></div>

		<a name="application" id="application"></a>

		<h3>Your Application</h3>
		<p>Please complete and submit the following form and we'll contact you to get things started. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla fermentum tristique libero, eget pharetra mi condimentum a. Nullam fermentum convallis orci eget porta. Integer id odio magna. Aenean felis nisl, pellentesque nec suscipit in, pulvinar sit amet tellus. Etiam mauris libero, fermentum eu varius vel, pharetra quis justo. Proin non tristique lacus. Ut aliquet dolor sed nisl suscipit sed euismod augue fermentum. Aenean pretium lobortis mattis.</p>

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
			
			<form action="#application" method="post" name="apply" id="frm_apply" class="custom">

				<div class='panel'>

				<fieldset>

					<legend>Contact Details</legend>

					<div class='row'>
						<div class="six mobile-two columns">
							<label for="">First Name <span class="required">*</span></label>
							<input type="text" name="first_name" id="f_first_name" value="" placeholder="First Name"/>
						</div>
						<div class="six mobile-two columns">
							<label for="">Last Name <span class="required">*</span></label>
							<input type="text" name="last_name" id="f_last_name" value="" placeholder="Last Name"/>
						</div>
					</div>

					<div class='row'>
						<div class="six mobile-two columns">
							<label for="">Email <span class="required">*</span></label>
							<input type="text" name="email" id="f_email" value="" placeholder="Email"/>
						</div>
						<div class="six mobile-two columns">
							<label for="">Telephone <span class="required">*</span></label>
							<input type="text" name="telephone" id="f_telephone" value="" placeholder="Telephone"/>
						</div>
					</div>

				</fieldset>



				<fieldset>

					<legend>General Requirements</legend>

					<ul class="simple-list">
						<li>
					        <label for="ch_uk_citizen" class="seriftext">
					          <input type="checkbox" id="ch_uk_citizen" name="uk_citizen" style="display: none;">
					          <span class="custom checkbox"></span> UK Citizenship
					        </label>
						</li>
						<li>
					        <label for="ch_uk_driving_licence" class="seriftext">
					          <input type="checkbox" id="ch_uk_driving_licence" name="uk_driving_licence" style="display: none;">
					          <span class="custom checkbox"></span> UK Driving Licence
					        </label>
						</li>
					</ul>

				</fieldset>


			<?php
			if(count(array_merge($required_trade_certificates)) > 0 
				&& isset($required_trade_certificates[0]) 
					&& trim($required_trade_certificates[0]) !=='') {


				echo "<fieldset>";
				echo "<legend>Trade Requirements</legend>";
				echo "<ul class='simple-list'>";
				foreach ($required_trade_certificates as $value) { 
					$tok = str_replace(' ', '', $value);
				?>
				<li>
					<div class='row'>
						<div><span class="row-label"><?php echo $value; ?></span></div>
						<div class="six mobile-two columns">
							<label for="ch_<?php echo $tok; ?>_id">ID/REF <span class="required">*</span></label>
							<input type="text" name="<?php echo $value; ?>[id]" id="ch_<?php echo $tok; ?>_id" value="" placeholder="ID/REF"/>
						</div>
						<div class="six mobile-two columns">
							<label for="ch_<?php echo $tok; ?>_exp">Expiry Date <span class="required">*</span></label>
							<input type="text" name="<?php echo $value; ?>[exp]" id="ch_<?php echo $tok; ?>_exp" value="" placeholder="(dd/mm/yyyy)"/>
						</div>
					</div>
				</li>
				<?php	
				}	
				echo "</ul>";
				echo "</fieldset>";

			}
			?> 


				<fieldset>

					<legend>About You...</legend>
					<div class='row'>
						<div class="twelve mobile-four columns">
							<label for="">Introduction <span class="required">*</span></label>
							<textarea name="message" id="f_message" placeholder="Introduction"></textarea>
						</div>
					</div>

				</fieldset>			


					<?php
					if(count(array_merge($trade_desirables)) > 0 
						&& isset($trade_desirables[0]) 
							&& trim($trade_desirables[0]) !=='') {

						echo '';
						echo "<fieldset>";
						echo "<legend>Desirables</legend>";
						echo "<ul class='simple-list'>";
						foreach ($trade_desirables as $value) { 
							$tok = str_replace(' ', '', $value);
						?>
						<li>
					        <label for="ch_<?php echo $tok; ?>_id" class="seriftext">
					          <input type="checkbox" id="ch_<?php echo $tok; ?>_id" name="desirable[<?php echo $tok; ?>]" style="display: none;" value="1">
					          <span class="custom checkbox"></span> <?php echo $value; ?>
					        </label>
						</li>
						<?php	
						}	
						echo "</ul>";
						echo "</fieldset>";
						echo "</li>";
					}
					?> 

			<!-- 
				<div class='row'>
			        <label for="ch_opt_out">
			          <input type="checkbox" id="ch_opt_out" name="opt_out" style="display: none;">
			          <span class="custom checkbox"></span> Don't sell my details to 3rd parties
			        </label>
			    </div>
			-->
			</div>

			    <div class='row'>
			    	<br>
			    </div>

			    <div class='row'>
			    	<div class="four columns centered">
						<input type="submit" value="Submit Application" id="btn_apply" class="large button"/>
					</div>
				</div>

			</form>

		

		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'contractor' ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
