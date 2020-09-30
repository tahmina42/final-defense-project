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
		 <span><i class="far fa-plus-square"></i><h2>Add Event Details</h2></span>
			<div class="event">
			
				<form method="POST" action="" enctype="multipart/form-data">
					<div class="form-group">
						  <label>Posted By</label>
						  <input type="text" class="form-control form-width" name="p_by" value="<?php echo $_SESSION['name']; ?>" size="30">
					</div>
					 <div class="form-group">
						<label>Posted On</label>
						<input type="date" name="date" class="form-control form-width">
					 </div>
					<div class="form-group">
					  <label>Event name</label>
					  <input type="text" name="e_name" class="form-control form-width">
					</div>
					<div class="form-group">
						<label>Upload image</label>
						<input type="file" name="image" class="form-control form-width">
						<input type="hidden" name="size" value="1000000">
					</div>

				<div class="form-group">
				  <label>Event details</label>
				  <textarea 
					id="text" 
					cols="40" 
					rows="4" 
					name="e_details" 
					class="form-control form-width"></textarea>
				</div>

				<div>
					<button type="submit" name="post" class="btn btn-primary">POST</button>
				</div>
			 </form>
		</div>
	</div>
	</div>
</div>
</div>




<?php
	


	$event = new functions();	



if (isset($_POST['post'])) {
  	
  		$image = $_FILES['image']['name'];

  		$tname = $_FILES["image"]["tmp_name"];
  		//$target = "images/".basename($image);
  		 $uploads_dir = 'upload-img';

	    move_uploaded_file($tname, $uploads_dir.'/'.$image);

		$date = ($_POST['date']);

		$pby=($_POST['p_by']);
		$c_name=($_POST['e_name']);
		
		$c_details = ($_POST['e_details']);



  	$sql = "INSERT INTO event (posted_by,posted_on,e_name,img,details) VALUES ('$pby', '$date','$c_name','$image','$c_details')";
  
  		

  	if($event->insert($sql)){
			
				echo"Successfully Event Added";
				echo"<a href='view-event.php'>Go to Event page</a>";
	
			
		}
		else{
			echo"Event not added";
			
		}
  }
 
?> 