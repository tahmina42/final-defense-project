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
<!-------------------------------------- header area starts ------------------------------------------->
<!-------------------------------------- ****************** ------------------------------------------->



<?php 
include("functions.php");
$account= new functions();
if (isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		$query="SELECT * FROM user where u_email= '$email'";
		$result=$account->select($query);
		if($result)
		{	
			foreach($result as  $key => $res){
				$user_img= ($res['img']);
				
			}
			
		}
	}

?>




<header class="header">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="hamburger-menu">
					<input id="menu__toggle" type="checkbox" />
					<label class="menu__btn" for="menu__toggle">
						<span></span>
					</label>
					<ul class="menu__box">
						<li><a class="menu__item" href="healthworker-dash.php">My Account</a></li>
						<li><a class="menu__item" href="index.php">Home Page</a></li>
						<li><a class="menu__item" href="get-patient-list.php">Patient List</a></li>
						<li><a class="menu__item" href="vac-assign-update.php">Vaccine Registered Patient</a></li>
						<li><a class="menu__item" href="send-mail.php">Send Email</a></li>
						<li><a class="menu__item" href="logout.php">Log Out</a></li>
					</ul>
				</div>
				<div class="heading-top">
					<h4>Vaccine & Immunization</h4>
				</div>
				<div class="heading-top-two">
					<ul>
						
						<!--<li><a href="health-worker-profile.php">User Name</a></li>
						<li><a href="health-worker-profile.php">User Name</a></li>-->
						<li class="session-top"><?php  if (isset($_SESSION['email'])) : ?>
							<a href="healthworker-dash.php"><?php echo $_SESSION['name']; ?></a>
						</li>
						<?php endif ?> 
						<!--<li><img class="pro-img2" src="assets/img/user.png" alt="user-image"></li>-->
						<li>
							<?php
								
							if($user_img==null){
								 echo'<img src="assets/img/user.png" class="profile-image-main">';
									
							}
							else{
									
								echo"<div class='circular-image2'>
										<img class='profile-image-main3' src='upload-img/".$res['img']."' >
									</div>";
								}
							?>
						
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="space-50"></div>

<!-------------------------------------- Main section starts ------------------------------------------->
<!-------------------------------------- ****************** ------------------------------------------->
<?php


$email= new functions();



?>

<div class="container send">
	<div class="row">
		<div class="col-lg-12">
		<center><span><b><h3 class='text-primary'>Send Email Reminder<i class="fas fa-paper-plane"></i></h3></b></center></span>
			<div class="search">
				<form method="post">
						<input type="date" name="date" placeholder="format is 2020-09-10" size="30"><br><br>
						<input type="submit" name="search" class="mailsearch"><br><br>
				</form>
			</div>
		</div>
		<div class="col-lg-12">
			<div class="searchemail">
			
			<table class="table table-striped">
							<tr style='border-bottom:1px solid gray;' class="headtab tr-back ">
								<td>Patient Name</td>
								
								<td>Vaccine Type</td>
								<td>Vaccine Date</td>
								<td>Email Address</td>
								<td>Email Status</td>
								<td>Send Email </td>
							</tr>
									<?php
											
											//echo $time;
											if(isset($_POST['search']))
											{
												$time = ($_POST['date']);
												
												$query="SELECT 
															vaccine_assign.p_id,
															vaccine_assign.v_type,
															vaccine_assign.v_schedule_two,
															vaccine_assign.mail_status,
															user.u_name,
															user.u_email
													FROM vaccine_assign 
													INNER JOIN user 
													ON 
													user.u_id=vaccine_assign.user_id
													where 
													v_schedule_two='$time' ";

												//$query="SELECT * FROM vaccine_assign where v_schedule_two='$time'";
												
												$result=$email->select($query);
												if($result)
													{	
												
														foreach($result as  $key => $res)
														{	
															echo "<tr>";
															echo "<td style='border-bottom:1px solid gray;'>
																	<span class='all-user'><img src='assets/img/patient.png' alt='patient'>
																		".$res['u_name']."
																	</span>
																	</td>";
																
																echo "<td style='border-bottom:1px solid gray;'>
																		
																		".$res['v_type']."
																	</td>";
																
																echo "<td style='border-bottom:1px solid gray;'>
																		
																		".$res['v_schedule_two']."
																	</td>";
																	
															echo "<td style='border-bottom:1px solid gray;'>
																
																	".$res['u_email']."
																</td>";
																if($res['mail_status']=='Sent'){
																	echo "<td style='border-bottom:1px solid gray;'>
																		
																		<span class='text-success'><i class='fa fa-check-circle' aria-hidden='true'></i></span>".$res['mail_status']."
																	</td>";
																}
																else{
																	
																	echo "<td style='border-bottom:1px solid gray;'>
																		
																		<span class='text-danger'><i class='fa fa-times' aria-hidden='true'></i></span>".$res['mail_status']."
																	</td>";
																}
															echo "<td style='border-bottom:1px solid gray;'><div class='update-link2'>
																			<a href=\"mail.php?id=$res[p_id]\">Send</a> 
																	</div></td>";
						
															echo "<tr/>";			
															
														}	
													}
													else{
														
														echo"<h4><b><span class='text-danger'>On this date there is no patient for sending email</span></b></h4>";
														
													}
											}
											
											else{
												
												//$query="select *from vaccine_assign where v_schedule_two=curdate()";
												
												$query="SELECT 
															vaccine_assign.p_id,
															vaccine_assign.v_type,
															vaccine_assign.v_schedule_two,
															vaccine_assign.mail_status,
															user.u_name,
															user.u_email
													FROM vaccine_assign 
													INNER JOIN user 
													ON 
													user.u_id=vaccine_assign.user_id
													where 
													v_schedule_two=curdate() ";
												
												
												$result=$email->select($query);
												if($result)
													{	
												
														foreach($result as  $key => $res)
														{	
															echo "<tr>";
															echo "<td style='border-bottom:1px solid gray;'>
																		
																		".$res['u_name']."
																	</td>";
																
																echo "<td style='border-bottom:1px solid gray;'>
																		
																		".$res['v_type']."
																	</td>";
																
																echo "<td style='border-bottom:1px solid gray;'>
																		
																		".$res['v_schedule_two']."
																	</td>";
																	
															echo "<td style='border-bottom:1px solid gray;'>
																
																	".$res['u_email']."
																</td>";
																if($res['mail_status']=='Sent'){
																	echo "<td style='border-bottom:1px solid gray;'>
																		
																		<span class='text-success'><i class='fa fa-check-circle' aria-hidden='true'></i></span>".$res['mail_status']."
																	</td>";
																}
																else{
																	
																	echo "<td style='border-bottom:1px solid gray;'>
																		
																		<span class='text-danger'><i class='fa fa-times' aria-hidden='true'></i></span>".$res['mail_status']."
																	</td>";
																}
															echo "<td style='border-bottom:1px solid gray;'><div class='update-link2'>
																			<a href=\"mail.php?id=$res[p_id]\">Send</a> 
																	</div></td>";
						
															echo "<tr/>";			
															
														}	
													}
													else{
														
														echo"<h4><b><span class='text-danger'>On this date there is no patient for sending email</span></b></h4>";
														
													}
												
											}
										?>
						</table>
				</div>
		</div>
	</div>
</div>



<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>


</body>


					
				

					
			
		