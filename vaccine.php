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

?>
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

<div class="main-event">
<div class="container">
	<div class="row">
		<div class="col-lg-12">
		 <span><i class="far fa-plus-square"></i><h2>Add Vaccine Details</h2></span>
			<div class="event">
			
				<form method="POST" action="" enctype="">
					<div class="form-group">
						  <label>Disease Name</label>
						  <input type="text" class="form-control form-width" name="d_name" value="">
					</div>
					 <div class="form-group">
						<label>Vaccine Name</label>
						<input type="text" name="v_name" class="form-control form-width">
					 </div>
					<div class="form-group">
					  <label>Vaccine Dose</label>
					  <input type="text" name="v_dose" class="form-control form-width">
					</div>
					
				<div class="form-group">
				  <label>Approve Age</label>
				  <textarea 
					id="text" 
					cols="20" 
					rows="3" 
					name="approve" 
					class="form-control form-width"></textarea>
				</div>

				<div>
					<button type="submit" name="post" class="btn btn-primary">ADD VACCINE</button>
				</div>
			 </form>
		</div>
	</div>
	</div>
</div>
</div>




<?php
	


	$vaccine = new functions();	



if (isset($_POST['post'])) {
  	
		$d_name=($_POST['d_name']);
		$v_name=($_POST['v_name']);
		$v_dose=($_POST['v_dose']);
		$approve_age=($_POST['approve']);



  	$sql = "INSERT INTO vaccine_details (d_name,v_name,v_dose,approve_age) VALUES ('$d_name', '$v_name','$v_dose','$approve_age')";
  
  		

  	if($vaccine->insert($sql)){
			
				echo"Successfully Vaccine Added<br>";
				echo"<a href='vaccinelist.php'>Go to vaccine page</a>";
			
		}
		else{
			echo"Vaccine not added";
			
		}
  }
 
?> 