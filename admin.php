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

?>
<!-------------------------------------- header area starts ------------------------------------------->
<!-------------------------------------- ****************** ------------------------------------------->
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
						<li><a class="menu__item" href="admin.php">My Account</a></li>
						<li><a class="menu__item" href="index.php">Home Page</a></li>
						<li><a class="menu__item" href="health-worker-list.php">Health Worker List</a></li>
						<li><a class="menu__item" href="patient-list.php">Patient List</a></li>
						<li><a class="menu__item" href="event.php">Add Event</a></li>
						<li><a class="menu__item" href="vaccine.php">Add Vaccine</a></li>
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

<section class="bg-dark">
		<div class="container reg-small">
			 <div class="row hgt">
				<div class="col-lg-6 padding-both" style="background-color:lightblue;"> 
				
				<?php
						
						
						if($res['img']==null){
							  echo"<img src='assets/img/user.png' class='profile-image-main-acc'>";
							
						}
						else{
							echo"<div class='circular-image'>
								 <img class='profile-image-main2' src='upload-img/".$res['img']."' >
							</div>";
						}
					?>
					 
				</div>
				<div class="col-lg-6 padding-both" style="background-color:#1b5692;"> 
					<h1 class="heading">My Account</h1>
						<div class="account">
							<table>
							<?php
								
								if (isset($_SESSION['email']))
								{
									$email=$_SESSION['email'];
									$query="SELECT * FROM user where u_email= '$email'";
									$result=$account->select($query);
									if($result)
										{
											
											foreach($result as  $key => $res)

											{
												echo "<tr style='border-bottom:1px solid gray;'>
														<td><b>Full Name :</b></td>
														<td>".$res['u_name']."</td>
													</tr>";
												echo "<tr style='border-bottom:1px solid gray;'>
													<td><b>Email Address :</b></td>
													<td>".$res['u_email']."</td>
												</tr>";												
												echo "<tr style='border-bottom:1px solid gray;'>
														<td><b>Contact :</b></td>
														<td>".$res['u_contact']."</td>
													</tr>";
												echo "<tr style='border-bottom:1px solid gray;'>
													<td><b>Designation :</b></td>
													<td>".$res['u_type']."</td>
												</tr>";
												
											
												
											}
										}
								}
							?>		
						</table>
					</div>
					<?php
						echo "<div class='update-link'>
								<a href=\"edithealthworkerprofile.php?id=$res[u_id]\">Update your proile</a> 
							</div>";
					?>
					
					
				</div>
			</div>
		</div>
		
	</section>
	<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>
</body>
</html>