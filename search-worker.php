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
						<li><a class="menu__item" href="patient-dash.php">My Account</a></li>
						<li><a class="menu__item" href="index.php">Home Page</a></li>
						<li><a class="menu__item" href="patient-vaccine-card.php">Vaccine Card</a></li>	
						<li><a class="menu__item" href="search-worker.php">Contact Us</a></li>
						<li><a class="menu__item" href="logout.php">Log Out</a></li>
					</ul>
				</div>
				<div class="heading-top">
					<h4>Vaccine & Immunization</h4>
				</div>
				<div class="heading-top-two">
					
				</div>
			</div>
		</div>
	</div>
</header>
<div class="space-50"></div>

<!-------------------------------------- Main section starts ------------------------------------------->
<!-------------------------------------- ****************** ------------------------------------------->
<?php


$worker= new functions();



?>

<div class="worker-find">
<div class="container">
	<div class="row">
		<div class="col-lg-12 search">
			<div class='col-lg-12 worker'>
				<center><h4>Meet Our Health Worker</h4></center>
			</div>
			
		</div>
	</div>
</div>
		<div class="container">
			<div class="row">
			<div class="col-lg-12">
				<form method="post">
				<input type="text" name="name" placeholder="search by name" size="30"><br><br>
				<input type="submit" name="search"><br><br>
			</form>	
			<div class="worker-tab">
				<table class="table table-striped">
					<tr>
						<td>Health Worker Name</td>
						<td>Email</td>
						<td>Contact No</td>
						<td>Working Area</td>
						<td>Image</td>
					</tr>
							<?php

									if(isset($_POST['search']))
						{
									$name = ($_POST['name']);
									$query="SELECT * FROM user where u_type='Health Worker'";
									
									$result=$worker->select($query);
									if($result)
									{	
										
										foreach($result as  $key => $res){
											if($name==$res['u_name']){
											echo "<tr>";
											echo "<td style='border-bottom:1px solid gray;'>
														
														".$res['u_name']."
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
												
												if($res['img']==null)
												{
													echo"<td style='border-bottom:1px solid gray;'>
															<img src='assets/img/user.png' class='profile-image-main4'>
														</td>";
							
												}
													else
												{
													echo"<td td style='border-bottom:1px solid gray;'>
															<div class='circular-image-part'>
																<img class='profile-image-main-worker' src='upload-img/".$res['img']."' >
															</div>
														</td>";
												}
												
											
											echo "<tr/>";			
										}
										
										}
									}
	
						}
						else{
							
							$query="SELECT * FROM user where u_type='Health Worker'";
									$result=$worker->select($query);
									if($result)
									{	
										
										foreach($result as  $key => $res){
											echo "<tr>";
											echo "<td style='border-bottom:1px solid gray;'>
														
														".$res['u_name']."
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
												
												if($res['img']==null)
												{
													echo"<td style='border-bottom:1px solid gray;'>
															<img src='assets/img/user.png' class='profile-image-main4'>
														</td>";
							
												}
													else
												{
													echo"<td td style='border-bottom:1px solid gray;'>
															<div class='circular-image-part'>
																<img class='profile-image-main-worker' src='upload-img/".$res['img']."' >
															</div>
														</td>";
												}
												
											
											echo "<tr/>";			
										}
										
									}
							
						}
								?>
				</table>
		
		</div>
	</div>
</div>

</div>								

</body>							
						
</html>
<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>
