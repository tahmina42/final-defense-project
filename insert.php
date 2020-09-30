<?php



	include("functions.php");
	
	$registration= new functions();
	if (isset($_POST['submit']))
	{
		
		$name =($_POST['uname']);
		$email = ($_POST['email']);
		$pass = ($_POST['upass']);
		$cpass = ($_POST['cpass']);
		$acc = ($_POST['acc']);
		$contact = ($_POST['ucontact']);
		$type = ($_POST['utype']);
		$addr = ($_POST['address']);
		if($pass==$cpass)
		{
			$fetch="SELECT * FROM worker_acc";
			$result=$registration->select($fetch);
			if($result)
			{
				foreach($result as  $key => $res)
				{
					$user_acc= ($res['acc_nmbr']);
					if($type=='Health Worker')
					{
						
						if($user_acc==$acc )
						{
							$query = "INSERT INTO user(u_name,u_email,u_pass,u_contact,u_type,u_address,acc_no)VALUES
							('$name','$email','$pass','$contact','$type','$addr','$acc')";
							if($registration->insert($query))
							{
								$query = "SELECT u_name,u_email FROM user where u_email='$email'";
									$result=$registration->select($query);
									
									foreach($result as $key => $res)
									{
	
										$_SESSION['email']=$email;
										$_SESSION['name']=$res['u_name'];
										echo"<script>window.location.href=\"healthworker-dash.php\"</script>";
										
									}
								
							}
							
							else
							{
								echo "Can't register";
							}
						
						}
						else
							{
								echo '<script>alert("Registrtaion is not done.Give your Registered Account number properly")</script>'; 
								
							}
							
					}
					
					
					else
					{
						$query = "INSERT INTO user(u_name,u_email,u_pass,u_contact,u_type,u_address)VALUES
							('$name','$email','$pass','$contact','$type','$addr')";
							if($registration->insert($query))
							{
								$query = "SELECT u_name,u_email FROM user where u_email='$email'";
									$result=$registration->select($query);
									
									foreach($result as $key => $res)
									{
	
		
		
										$_SESSION['email']=$email;
										$_SESSION['name']=$res['u_name'];
										echo"<script>window.location.href=\"patient-dash.php\"</script>";
										
									}
								
							}
							
							else
							{
								echo "Can't register";
							}
						
					}
					
						
						
				}
					
				
			}
			

		}
		else
			
		{

			echo"Password & confirm password didn't match";
				
		}
		
	}
	

	
	?>
