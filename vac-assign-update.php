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
<?php include("functions.php"); ?>

<?php 
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



<section class="empty">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="patient-list-tab">
					<center>
						<h2 class="mb-20">Vaccine Assigned Patients</h2>
							<table class="table table-striped">
							<tr style='border-bottom:1px solid gray;' class="tr-back">
								<td>Full Name</td>
								<td>Contact</td>
								<td>Vaccine Type</td>
								<td>First Dose</td>
								<td>Next Dose</td>	
								<td>Age</td>
								<td>Gender</td>
								<td>Health Worker</td>
								<td>Update Schedule</td>
								

							</tr>
							
								<?php

									$list= new functions();
									$hw_name=$_SESSION['name'];
									//$query="SELECT * FROM vaccine_assign where worker_name='$hw_name'";
									$query="SELECT 
												vaccine_assign.p_id,
												vaccine_assign.v_type,
												vaccine_assign.v_schedule_one,
												vaccine_assign.v_schedule_two,
												vaccine_assign.p_age,
												vaccine_assign.p_gender,
												vaccine_assign.worker_name,
												user.u_name,
												user.u_contact
											FROM vaccine_assign 
											INNER JOIN user 
											ON 
											user.u_id=vaccine_assign.user_id
											where 
											worker_name='$hw_name' ";
									
									$result=$list->select($query);
									if($result)
									{

										foreach($result as  $key => $res){
											echo "<tr>";
												echo"<td style='border-bottom:1px solid gray;'>
														
													<span class='all-user'><img src='assets/img/patient.png' alt='patient'>".$res['u_name']."<span>
													</td>";
												echo "<td style='border-bottom:1px solid gray;'>
												
													".$res['u_contact']."
												</td>";
												echo "<td style='border-bottom:1px solid gray;'>
														
														".$res['v_type']."
													</td>";
												
												echo "<td style='border-bottom:1px solid gray;'>
													
													".$res['v_schedule_one']."
												</td>";
												
												echo "<td style='border-bottom:1px solid gray;'>
													
													".$res['v_schedule_two']."
												</td>";
												
												echo "<td style='border-bottom:1px solid gray;'>
													
													".$res['p_age']."
												</td>";
												echo "<td style='border-bottom:1px solid gray;'>
													
													".$res['p_gender']."
												</td>";
												echo "<td style='border-bottom:1px solid gray;'>
													
													".$res['worker_name']."
												</td>";
												
											echo "<td style='border-bottom:1px solid gray;'>
													<div class='assign-link'>
														<a href=\"update-schedule.php?id=$res[p_id]\">Update </a> 
													</div>
														</td>";
											echo "<tr/>";			
										}
										
									}
	

								?>
							</table>
					</center>
				</div>
			</div>
		</div>
	</div>


</section>



<body>
<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>