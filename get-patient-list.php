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
						<h2>All Patients</h2>
							<table class="table table-striped">
							
								<tr style="border-bottom:1px solid gray" class="tr-back">
									<td scope="col">Full Name</td>
									<td>Email</td>
									<td>Contact</td>
									<td>Address</td>
									<td>Assign Vaccine</td>

								</tr>
						
							
									<?php

										$list= new functions();

										$query="SELECT * FROM user where u_type='Patient'";
										$result=$list->select($query);
										if($result)
										{	
											
											foreach($result as  $key => $res){
												echo "<tr>";
													echo "<td style='border-bottom:1px solid gray;'>
																
																<span class='all-user'> <i class='fas fa-user'></i>".$res['u_name']."</span>
															</td>";
														echo "<td style='border-bottom:1px solid gray;'>
														
															".$res['u_email']."
														</td>";
														echo "<td style='border-bottom:1px solid gray;'>
																
																".$res['u_contact']."
															</td>";
														
														echo "<td style='border-bottom:1px solid gray;'>
															
															".$res['u_address']."
														</td>";
															
														echo "<td style='border-bottom:1px solid gray;'>
																	<div class='assign-link'>
																		<a href=\"vaccine-assign.php?id=$res[u_id]\">Assign </a> 
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
<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>



