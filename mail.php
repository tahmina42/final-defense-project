

<?php
require 'PHPMailer/PHPMailerAutoload.php';
require 'PHPMailer/class.smtp.php';
include("functions.php");
$mailing= new functions();
$mail = new PHPMailer;
$id = ($_GET['id']);
if (isset($_GET['id'])){
	
	$result = $mailing->select("SELECT * FROM vaccine_assign WHERE p_id=$id");
	
	//need to relate database
	foreach ($result as $res) {
		
		$user_name 	=($res['p_name']);
		$to_email = ($res['p_email']);
		$vaccine = ($res['v_type']);
		
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output

		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'immuunization@gmail.com';                 // SMTP username
		$mail->Password = 'tahmina1234';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    


		$mail->setFrom('immuunization@gmail.com');
		$mail->addAddress($to_email);     // Add a recipient
		$mail->addReplyTo('immuunization@gmail.com');
		
		$mail->isHTML(true);
		
		$mail->Subject = 'Reminder';
		$mail->Body    = 'Dear $user_name..You have vaccine taking schedule today for vaccine $vaccine .To know more contact with your health worker';
		$mail->AltBody = 'Dear $user_name..You have vaccine taking schedule today for vaccine $vaccine .To know more contact with your health worker';
		
		$msg="Email has been successfully sent to $user_name...";
		if ($mail->send())
			{
				$sql = "UPDATE vaccine_assign SET mail_status='Sent' WHERE p_id=$id";
				
				if($mailing->insert($sql))
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
					
			
	}
}





// TCP port to connect to

 // Set email format to HTML



/*if() {
    echo 'Message has been sent.';
  
}
  else{
  echo 'Messagecould not be  sent';}*/
  ?>