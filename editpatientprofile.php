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
$editaccount= new functions();
$id = ($_GET['id']);

$result = $editaccount->select("SELECT * FROM user WHERE u_id=$id");


foreach ($result as $res) {
	

		$user_name 	=($res['u_name']);
		$user_mail 	=($res['u_email']);
		$user_pass	= ($res['u_pass']);
		$user_contact= ($res['u_contact']);
		$user_img= ($res['img']);
		$user_addr    = ($res['u_address']);
		

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
						<li><a class="menu__item" href="#">My Account</a></li>
						<li><a class="menu__item" href="#">Home Page</a></li>
						<li><a class="menu__item" href="#">Offered Vaccine</a></li>
						<li><a class="menu__item" href="#">Events</a></li>
						<li><a class="menu__item" href="#">Contact Us</a></li>
						<li><a class="menu__item" href="#">Log Out</a></li>
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
						<a href="healthworker-dash.php"><?php echo $_SESSION['name']; ?></a></li>
						<?php endif ?> 
						<!--<li><img class="pro-img2" src="assets/img/user.png" alt="user-image"></li>-->
						<li>
							
								
							
								<?php
								//$photo = ($res['img'] == null) ? "default.jpg" : $info['photo'];
								//echo "<img class=\"memberImage\" src=images/". $photo .">";
								
								
								if($res['img']==null){
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
					<form action="" method="post" id="myform" enctype="multipart/form-data">
						<?php
						//$photo = ($res['img'] == null) ? "default.jpg" : $info['photo'];
						//echo "<img class=\"memberImage\" src=images/". $photo .">";
						
						
						if($res['img']==null){
							  echo'<img src="assets/img/user.png" class="profile-image-main-acc">';
							
						}
						else{
							
							echo"<div class='circular-image'>
									<img class='profile-image-main2' src='upload-img/".$res['img']."' >
								</div>";
						}
					?>
					
						<div class="form-row">
							<label>Update Your Profile Picture</label>
							<input type="file" name="image" value="<?php echo 'upload-img/'.$user_img;?>">
							<input type="hidden" name="size" >
						</div>
				</div>
				<div class="col-lg-6 padding-both" style="background-color:#1b5692;"> 
					<h1 class="heading">My Account</h1>
					<table>
						
							<tr>
								<td>
									<div class="form-group">
									<label class="label" for="uname">User Name:</label>
								</td>
								<td>
									  <input type="text" class="form-control" id="uname" placeholder="Enter your name" name="uname" required 
									  value="<?php echo $user_name; ?>">
									   
									  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="mail" >Email:</label>
								</td>
								<td>
								  <input type="email" class="form-control" id="mail" placeholder="Enter Your email" name="uemail" required
								  value="<?php echo $user_mail;?>">
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Password:</label>
								</td>
								<td>
								  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upass" required
								  value="<?php echo $user_pass;?>">
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
		
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Contact No:</label>
								</td>
								<td>
								  <input type="text" class="form-control" id="pwd" placeholder="Enter your contact no" name="ucontact" 
								  required value="<?php echo $user_contact;?>">
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Address</label>
								</td>
								<td>
								 <textarea  cols="30" name="uaddress" value="" required><?php echo $user_addr;?></textarea>
									</div>
								</td>
							</tr>
							
						</table>
					 <input type="submit" name="update" id="button" class="btn login" value="Update">
					</form>
				</div>
			</div>
		</div>
<?php


$id = ($_GET['id']);

if (isset($_POST['update'])){

		$user_name =($_POST['uname']);
		$user_email = ($_POST['uemail']);
		$user_pass = ($_POST['upass']);
		$user_contact = ($_POST['ucontact']);

		//image upload
	    $image = $_FILES['image']['name'];
        $tname = $_FILES["image"]["tmp_name"];
      //$target = "images/".basename($image);
      $uploads_dir = 'upload-img';

      move_uploaded_file($tname, $uploads_dir.'/'.$image);
	  $user_addr = ($_POST['uaddress']);
		$query = "UPDATE user SET 
					u_name='$user_name',
					u_email='$user_email',
					u_pass='$user_pass',
					u_contact='$user_contact',
					img='$image',
					u_address='$user_addr'
					
				WHERE 
					u_id=$id";
		if($editaccount->insert($query)){
			
			$result = $editaccount->select("SELECT * FROM user WHERE u_id=$id");


			foreach ($result as $res) {
				

					$user_name 	=($res['u_name']);
					
					

			}
			$_SESSION['name']=$res['u_name'];
	
			echo"<script>window.location.href=\"patient-dash.php\"</script>";
		}
		else{
			echo"not updated";
			
		}
	}


?>
	</section>
	</body>
</html>