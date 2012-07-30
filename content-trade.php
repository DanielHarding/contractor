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

	$email_sent = false;
	$req = array('first_name', 'last_name', 'email', 'telephone');
	$global_required = array('uk_citizen', 'uk_driving_licence', 'crb_checked', 'two_years_trade_experience');

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
				$mess = "There was an error in your submission - please complete all fields marked with * ";
				break;
			}
		}

	}




	if(count(array_merge($global_required)) > 0 
		&& isset($global_required[0]) 
			&& trim($global_required[0]) !=='') {
		foreach($global_required as $key => $val) {
			if(!is_array($val)) { $key = $val; }
			$ukey = ucwords(str_replace('_', ' ', $key));
			$key = strtolower($key);
			if(!isset($_POST[$key]) || empty($_POST[$key])) {
				$gerrs = true;
				$gmess = "Sorry - you don't meet the general contractor requirements - " . $ukey;
				break;
			}
		}

	}


	

	if(count(array_merge($required_trade_certificates)) > 0 
		&& isset($required_trade_certificates[0]) 
			&& trim($required_trade_certificates[0]) !=='') {
		// var_dump($_POST);
		foreach($required_trade_certificates as $key => $val) {
			if(!is_array($val)) { $key = $val; }
			if(!isset($_POST[$key]) || empty($_POST[$key])) {

				$serrs = true;
				$smess = "Sorry - you don't meet the trade specific requirements - " . $key;
				break;
			}
		}

	}



	if(!$errs && empty($mess) && !$gerrs && empty($gmess) && !$serrs && empty($smess)) {
		// Success

		/*
		Mail Server Username: contact+workforeveryhome.co.uk
		Incoming Mail Server: mail.workforeveryhome.co.uk
		Incoming Mail Server: (SSL) stickypiston.co
		Outgoing Mail Server: mail.workforeveryhome.co.uk (server requires authentication) port 25
		Outgoing Mail Server: (SSL) stickypiston.co (server requires authentication) port 465
		Supported Incoming Mail Protocols: POP3, POP3S (SSL/TLS), IMAP, IMAPS (SSL/TLS)
		Supported Outgoing Mail Protocols: SMTP, SMTPS (SSL/TLS)
		Password: xIG20etew7gK
		*/

		$from = "contact@workforeveryhome.co.uk";
		$subj = "Contract Application";
		$message = "Thanks for registering!";

		require_once ABSPATH . WPINC . '/class-phpmailer.php';
		require_once ABSPATH . WPINC . '/class-smtp.php';
		$phpmailer = new PHPMailer();
		
		$phpmailer->SMTPAuth = true;
		$phpmailer->Username = 'contact+workforeveryhome.co.uk';
		$phpmailer->Password = 'xIG20etew7gK';
		 
		$phpmailer->IsSMTP(); // telling the class to use SMTP
		$phpmailer->Host       = "mail.workforeveryhome.co.uk"; // SMTP server
		$phpmailer->FromName   = $from;
		$phpmailer->Subject    = $subj;
		$phpmailer->Body       = $message;                      //HTML Body
		$phpmailer->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
		$phpmailer->WordWrap   = 50; // set word wrap
		$phpmailer->MsgHTML($message);
		
		// $phpmailer->AddAddress('support@wordpressapi.com/files/', 'Wordpress support');
		// $phpmailer->AddAttachment("images/phpmailer.gif");             // attachment
		
		$phpmailer->AddAddress($_POST['email'], $_POST['first_name'] . ' ' . $_POST['last_name']);

		if(!$phpmailer->Send()) {
			$errs = true;
			$mess = "Mailer Error: " . $phpmailer->ErrorInfo;
		} else {
			$email_sent =  "Application sent!";
		}

	} 

}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php the_post_thumbnail(); ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->

	<div class="entry-content">
	
	<div class="row">
		<p class="six columns centred"><a href="#application" class="large success button">Start Application Now</a></p>
	</div>
			
		<?php the_content(); ?>


		<div class="row"><hr></div>
		
		<a name="application" id="application"></a>

		<h2>Application Request</h2>
		<p>Please complete and submit the following form and we'll contact you to get things started.</p>

			<?php
			if(!empty($mess) && $errs) {
				echo "<div class='alert-box alert'><p class=''>{$mess}</p></div>";
			}

			if(!empty($gmess) && $gerrs) {
				echo "<div class='alert-box alert'><p class=''>{$gmess}</p></div>";
			}

			if(!empty($smess) && $serrs) {
				echo "<div class='alert-box alert'><p class=''>{$smess}</p></div>";
			}

			if(!empty($email_sent)) {
				echo "<div class='alert-box success'><p class=''>Message sent</p></div>";
			}
			?>
			
			<div class="row">
			<form action="#application" method="post" name="apply" id="frm_apply" class="custom eight columns">
					

				<fieldset>

					<legend>Contact Details</legend>

					<div class='row'>
						<div class="six mobile-two columns">
							<?php $has_error = (isset($_POST) && empty($_POST['first_name'])) ? true : false; ?>
							<label for="f_first_name" class='<?php echo ($has_error) ? 'error' : ''; ?>'>First Name <span class="required">*</span></label>
							<input type="text" name="first_name" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="f_first_name" value="<?php echo (isset($_POST['first_name'])) ? $_POST['first_name'] : ''; ?>" placeholder="First Name"/>
						</div>
						<div class="six mobile-two columns">
							<?php $has_error = (isset($_POST) && empty($_POST['last_name'])) ? true : false; ?>
							<label for="f_last_name" class='<?php echo ($has_error) ? 'error' : ''; ?>'>Last Name <span class="required">*</span></label>
							<input type="text" name="last_name" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="f_last_name" value="<?php echo (isset($_POST['last_name'])) ? $_POST['last_name'] : ''; ?>" placeholder="Last Name"/>
						</div>
					</div>

					<div class='row'>
						<div class="six mobile-two columns">
							<?php $has_error = (isset($_POST) && empty($_POST['email'])) ? true : false; ?>
							<label for="f_email" class='<?php echo ($has_error) ? 'error' : ''; ?>'>Email <span class="required">*</span></label>
							<input type="text" name="email" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="f_email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" placeholder="Email"/>
						</div>
						<div class="six mobile-two columns">
							<?php $has_error = (isset($_POST) && empty($_POST['telephone'])) ? true : false; ?>
							<label for="f_telephone" class='<?php echo ($has_error) ? 'error' : ''; ?>'>Telephone <span class="required">*</span></label>
							<input type="text" name="telephone" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="f_telephone" value="<?php echo (isset($_POST['telephone'])) ? $_POST['telephone'] : ''; ?>" placeholder="Telephone"/>
						</div>
					</div>
					
					<div class='row'>
						<div class="six mobile-two columns">
							<?php $has_error = (isset($_POST) && empty($_POST['website'])) ? true : false; ?>
							<label for="f_website">Website Address</label>
							<input type="text" name="website" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="f_website" value="<?php echo (isset($_POST['website'])) ? $_POST['website'] : ''; ?>" placeholder="Website Address"/>
						</div>
						<div class="six mobile-two columns">
						</div>
					</div>

				</fieldset>



				<fieldset>

					<legend>General Requirements</legend>

					<ul class="simple-list">
						<li>
					        <?php $checked = (isset($_POST['uk_citizen']) && !empty($_POST['uk_citizen'])) ? ' checked' : ''; ?>
					        <?php $has_error = (isset($_POST) && empty($_POST['uk_citizen'])) ? true : false; ?>
					        <label for="ch_uk_citizen" class='<?php echo ($has_error) ? 'error' : ''; ?>'>
					          <input type="checkbox" value="1" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="ch_uk_citizen" name="uk_citizen" style="display: none;" <?php echo $checked; ?>>
					          <span class="custom checkbox"></span> UK Citizenship <span class="required">*</span>
					        </label>
						</li>
						<li>
					        <?php $checked = (isset($_POST['uk_driving_licence']) && !empty($_POST['uk_driving_licence'])) ? ' checked' : ''; ?>
					        <?php $has_error = (isset($_POST) && empty($_POST['uk_driving_licence'])) ? true : false; ?>
					        <label for="ch_uk_driving_licence" class='<?php echo ($has_error) ? 'error' : ''; ?>'>
					          <input type="checkbox" value="1" class='<?php echo ($has_error) ? 'error' : ''; ?>' id="ch_uk_driving_licence" name="uk_driving_licence" style="display: none;" <?php echo $checked; ?>>
					          <span class="custom checkbox"></span> UK Driving Licence <span class="required">*</span>
					        </label>
						</li>
						<li>
					        <?php $checked = (isset($_POST['two_years_trade_experience']) && !empty($_POST['two_years_trade_experience'])) ? ' checked' : ''; ?>
					        <?php $has_error = (isset($_POST) && empty($_POST['two_years_trade_experience'])) ? true : false; ?>
					        <label for="ch_two_years_trade_experience" class='<?php echo ($has_error) ? 'error' : ''; ?>'>
					          <input type="checkbox" class='<?php echo ($has_error) ? 'error' : ''; ?>' value="1" id="ch_two_years_trade_experience" name="two_years_trade_experience" style="display: none;" <?php echo $checked; ?>>
					          <span class="custom checkbox"></span> Two years trade experience <span class="required">*</span>
					        </label>
						</li>
						<li>
					        <?php $checked = (isset($_POST['crb_checked']) && !empty($_POST['crb_checked'])) ? ' checked' : ''; ?>
					        <?php $has_error = (isset($_POST) && empty($_POST['crb_checked'])) ? true : false; ?>
					        <label for="ch_crb_checked" class='<?php echo ($has_error) ? 'error' : ''; ?>'>
					          <input type="checkbox" class='<?php echo ($has_error) ? 'error' : ''; ?>' value="1" id="ch_crb_checked" name="crb_checked" style="display: none;" <?php echo $checked; ?>>
					          <span class="custom checkbox"></span> CRB checked <span class="required">*</span>
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
					$tok = strtolower(str_replace(' ', '', $value));
					$tok = str_replace('/', '', $tok);
					$psted_id = (isset($_POST[$tok]['id'])) ? $_POST[$tok]['id'] : '';
					$psted_exp = (isset($_POST[$tok]['exp'])) ? $_POST[$tok]['exp'] : '';
					$has_error_id = (isset($_POST) && empty($_POST[$tok]['id'])) ? true : false;
					$has_error_exp = (isset($_POST) && empty($_POST[$tok]['exp'])) ? true : false;
				?>
				<li>
					<div class='row'>
						<div><span class="row-label"><?php echo $value; ?></span></div>
						<div class="six mobile-two columns">
							<label  class='<?php echo ($has_error_id) ? 'error' : ''; ?>' for="ch_<?php echo $tok; ?>_id">ID/REF <span class="required">*</span></label>
							<input type="text" name="<?php echo $tok; ?>[id]" id="ch_<?php echo $tok; ?>_id" value="<?php echo $psted_id; ?>" placeholder="ID/REF" class='<?php echo ($has_error_id) ? 'error' : ''; ?>'/>
						</div>
						<div class="six mobile-two columns">
							<label  class='<?php echo ($has_error_exp) ? 'error' : ''; ?>' for="ch_<?php echo $tok; ?>_exp">Expiry Date <span class="required">*</span></label>
							<input type="text" name="<?php echo $tok; ?>[exp]" id="ch_<?php echo $tok; ?>_exp" value="<?php echo $psted_exp; ?>" placeholder="(dd/mm/yyyy)" class='<?php echo ($has_error_exp) ? 'error' : ''; ?>'/>
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
				<legend>Which other trades do you cover?</legend>
					<div class='row'>
						<label for="checkbox1">
						  <input type="checkbox" id="checkbox1" value="1" name="trades[appliance_engineer]" style="display: none;"<?php echo (isset($_POST['trades']['appliance_engineer']) && !empty($_POST['trades']['appliance_engineer'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Appliance Engineer
						</label>
						
						<label for="checkbox2">
						  <input type="checkbox" id="checkbox2" value="1" name="trades[drainage_engineer]" style="display: none;"<?php echo (isset($_POST['trades']['drainage_engineer']) && !empty($_POST['trades']['drainage_engineer'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Drainage Engineer
						</label>
						
						<label for="checkbox3">
						  <input type="checkbox" id="checkbox3" value="1" name="trades[electrician]" style="display: none;"<?php echo (isset($_POST['trades']['electrician']) && !empty($_POST['trades']['electrician'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Electrician
						</label>
						
						<label for="checkbox4">
						  <input type="checkbox" id="checkbox4" value="1" name="trades[gas_engineer]" style="display: none;"<?php echo (isset($_POST['trades']['gas_engineer']) && !empty($_POST['trades']['gas_engineer'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Gas Engineer
						</label>
						
						<label for="checkbox5">
						  <input type="checkbox" id="checkbox5" value="1" name="trades[glazer_and_boarder]" style="display: none;"<?php echo (isset($_POST['trades']['glazer_and_boarder']) && !empty($_POST['trades']['glazer_and_boarder'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Glazer And Boarder
						</label>
						
						<label for="checkbox6">
						  <input type="checkbox" id="checkbox6" value="1" name="trades[locksmith]" style="display: none;"<?php echo (isset($_POST['trades']['locksmith']) && !empty($_POST['trades']['locksmith'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Locksmith
						</label>
						
						<label for="checkbox7">
						  <input type="checkbox" id="checkbox7" value="1" name="trades[pest_controller]" style="display: none;"<?php echo (isset($_POST['trades']['pest_controller']) && !empty($_POST['trades']['pest_controller'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Pest Controller
						</label>
						
						<label for="checkbox8">
						  <input type="checkbox" id="checkbox8" value="1" name="trades[plumber]" style="display: none;"<?php echo (isset($_POST['trades']['plumber']) && !empty($_POST['trades']['plumber'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Plumber
						</label>
						
						<label for="checkbox9">
						  <input type="checkbox" id="checkbox9" value="1" name="trades[roofer]" style="display: none;"<?php echo (isset($_POST['trades']['roofer']) && !empty($_POST['trades']['roofer'])) ? ' checked' : ''; ?>>
						  <span class="custom checkbox"></span> Roofer
						</label>
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
							$tok = strtolower(str_replace(' ', '', $value));
							$tok = str_replace('/', '', $tok);
							$checked = (isset($_POST['desirable'][$tok]) && !empty($_POST['desirable'][$tok])) ? ' checked' : '';
						?>
						<li>
					        <label for="ch_<?php echo $tok; ?>_id">
					          <input type="checkbox" id="ch_<?php echo $tok; ?>_id" name="desirable[<?php echo $tok; ?>]" style="display: none;" value="1" <?php echo $checked; ?>>
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

				<fieldset>

					<legend>About You...</legend>
					<div class='row'>
						<?php $has_error = (isset($_POST) && empty($_POST['message'])) ? true : false; ?>
						<div class="twelve mobile-four columns">				
							<label class='<?php echo ($has_error) ? 'error' : ''; ?>' for="f_message">Introduction <span class="required">*</span></label>
							<textarea class='<?php echo ($has_error) ? 'error' : ''; ?>' name="message" id="f_message" placeholder="Introduction"><?php echo (isset($_POST['message'])) ? $_POST['message'] : ''; ?></textarea>
						</div>
					</div>
				</fieldset>


				<fieldset>
				<legend>How would you like to receive your application pack?</legend>
					<div class='row'>
						<label for="radio1">
						  <input name="radio1" type="radio" value="1" id="radio1" <?php echo (isset($_POST['radio1']) && !empty($_POST['radio1'])) ? ' checked' : ''; ?>> By Post
						</label>
						
						<label for="radio2">
						  <input name="radio2" type="radio" value="1" id="radio2" <?php echo (isset($_POST['radio2']) && !empty($_POST['radio2'])) ? ' checked' : ''; ?>> By Email
						</label>
					</div>
				</fieldset>


			<!-- 
				<div class='row'>
			        <label for="ch_opt_out">
			          <input type="checkbox" id="ch_opt_out" name="opt_out" style="display: none;">
			          <span class="custom checkbox"></span> Don't sell my details to 3rd parties
			        </label>
			    </div>
			-->
			
			
			    <div class='row'>
			    	<br>
			    </div>

			    <div class='row'>
			    	<div class="four columns centered">
						<input type="submit" value="Submit Application" id="btn_apply" class="large button"/>
					</div>
				</div>
			</form>
			
			
			<div class="four columns requirements">
			<h3>Requirements and Desirables</h3>
					<ul class="block-grid up-up">
						<li>
							<div class='panel blue-panel'>
								<h4>General Requirements</h4>
								<ul class="simple-list">
									<li><span class='tick'>&#10003;</span>UK Citizen</li>
									<li><span class='tick'>&#10003;</span>UK Driving Licence</li>
									<li><span class='tick'>&#10003;</span>Two years trade experience</li>
									<li><span class='tick'>&#10003;</span>CRB checked</li>
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
						<h4>Desirables</h4>
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
			
			
			
			</div>
			</div>
			
			
	</div><!-- .entry-content -->

</article><!-- #post-<?php the_ID(); ?> -->
