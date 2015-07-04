<?
$your_email=trim($_POST['your_email']);
$your_web_site_name=trim($_POST['your_web_site_name']);
?>

<?php 
//If the form is submitted
if(isset($_POST['name'])) {

		//Check to make sure that the name field is not empty
		if(trim($_POST['name']) === '') {
			$hasError = true;
		} else {
			$name = trim($_POST['name']);
		}
		
		//Check to make sure sure that a valid email address is submitted
		if(trim($_POST['email']) === '')  {
			$hasError = true;
		} else if (!eregi("^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$", trim($_POST['email']))) {
			$hasError = true;
			$errorMessage = "Please enter a valid email address!";
		} else {
			$email = trim($_POST['email']);
		}

		//Check to make sure that the phone field is not empty
		if(trim($_POST['phone']) === '') {
			$hasError = true;
		} else {
			$phone = trim($_POST['phone']);
		}

		//company name
		$company_name = trim($_POST['company_name']);

		//company url
		$company_url = trim($_POST['company_url']);

			
		//Check to make sure comments were entered	
		if(trim($_POST['message']) === '') {
			$hasError = true;
		} else {
			if(function_exists('stripslashes')) {
				$comments = stripslashes(trim($_POST['message']));
			} else {
				$comments = trim($_POST['message']);
			}
		}



		//If there is no error, send the email
		if(!isset($hasError)) {

			$emailTo = $your_email;
			$subject = 'Contact Form Submission from '.$name;
			
			//message body 
			$body  ="Name: $name \n\n";
			$body .="Email: $email \n\n";
			$body .="Phone:$phone\n\n";
			$body .="Company Name:$company_name\n\n";
			$body .="Company Url:$company_url \n\n";
			$body .="Message: $comments";


			$headers = 'From: '.$your_web_site_name.' <'.$emailTo.'>' . "\r\n" . 'Reply-To: ' . $email;
			
			mail($emailTo, $subject, $body, $headers);

			$emailSent = true;
	}
} 
?>

<?php if(isset($emailSent) == true) { ?>
	<div class="ok_box">
		<h3>Thanks, <?php echo $name;?></h3>
		<p>Your email was successfully sent. We will be in touch soon.</p>
	</div>
<?php } ?>

<?php if(isset($hasError) ) { ?>
	<div class="error_box">
		There was an error submitting the form.
		<br />
		<?php echo $errorMessage;?>
	</div>
<?php } ?>
