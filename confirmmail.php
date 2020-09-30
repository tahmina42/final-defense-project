<!Doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Vaccine</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- bootstrap -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		
		<!-- font-awesome -->
		
		<link rel="stylesheet" href="assets/css/fontawesome.min.css" />
		<link rel="stylesheet" href="assets/css/all.min.css" />
		
		<!-- main style -->
		<link rel="stylesheet" href="assets/css/style.css"/>
    </head>
	
<body>


<?php

include("functions.php");
$mail= new functions();
$id = ($_GET['id']);

$result = $mail->select("SELECT * FROM vaccine_assign WHERE p_id=$id");


foreach ($result as $res) {
	

	$user_name 	=($res['p_name']);
		$user_mail 	=($res['p_email']);
		
		

}
?>




<?php


$id = ($_GET['id']);

if (isset($_GET['id'])){
	
	$result = $mail->select("SELECT * FROM vaccine_assign WHERE p_id=$id");
	
	
	foreach ($result as $res) {
		

		$user_name 	=($res['p_name']);
		$to_email = ($res['p_email']);
		$vaccine = ($res['v_type']);
		$subject = "Reminder";
		$body ="Dear $user_name..You have vaccine taking schedule today for vaccine $vaccine .To know more contact with your health worker";
		$headers = "From: immuunization@gmail.com";
		$msg="Email successfully sent to $user_name...";
		if (mail($to_email, $subject, $body, $headers))
			{
				$sql = "UPDATE vaccine_assign SET mail_status='Sent' WHERE p_id=$id";
				
				if($mail->insert($sql))
						{

							echo
							"<script>
								alert('$msg')
								window.location.replace(\"send-mail.php\");
							
							</script>";
						}
				
				else
			{
				echo "Email sending failed";
			}
				
			} 
		else
			{
				echo "Email sending failed...";
			}
					
			//$from="From: test@example.com";
			//$to = ($res['p_email']); // The column where your e-mail was stored.
			//$subject = 'Sample Form';
			//$msg = 'Hello world!';
			//mail($to, $subject, $msg, $from);
			//echo "A mail has been sent to you";

	}
}
?>
</body>