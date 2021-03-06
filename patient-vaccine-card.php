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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		
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
		//select *from DemoTable where str_to_date(JoiningDate,'%d/%m/%Y')=curdate();
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
						<li><a class="menu__item" href="patient-dash.php">My Account</a></li>
						<li><a class="menu__item" href="index.php">Home Page</a></li>
						<li><a class="menu__item" href="patient-vaccine-card.php">Vaccine Card</a></li>	
						<li><a class="menu__item" href="search-worker.php">Search Health Worker</a></li>
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

<center>
<?php 
$notify= new functions();
if (isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		//$query="SELECT * FROM vaccine_assign where u_email= '$email'";
		$query="select *from vaccine_assign where p_email= '$email' AND v_schedule_two=curdate()";
		$result=$notify->select($query);
		if($result)
		{	
			foreach($result as  $key => $res){
				$type= ($res['v_type']);
			
				echo"<div class='notify'>
						<div class='alert alert-danger alert-dismissible'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <span><i class='fa fa-bell' aria-hidden='true'></i> Today is your vaccination date for <strong>$type</strong></span>
						</div>
					</div>	";
			}
			
		}
		else{
			echo"<div class='notify'>
					<div class='alert alert-info alert-dismissible'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							  <h5> <strong>No Vaccine for today</strong></h5>
					</div>
				</div>";
			
		}
	}

?>









<div class="cardd">
	<center>
		<div class='container'>
			
<?php
	$card= new functions();						
	if (isset($_SESSION['email']))
	{
		$email=$_SESSION['email'];
		$query="SELECT * FROM vaccine_assign where p_email= '$email'";
		$result=$card->select($query);

		if($result){
			
			foreach($result as  $key => $res){
				
				echo "	<div class='row'>
							<div class='col-lg-12 cardd-body'>
								<div class='bottom'>
									<h4>Patient's Vaccine Card</h4>
									<span class='pname'>Patient's Name : ".$res['p_name']."</span>
									
									<span class='pemail'>Email: ".$res['p_email']."</span><br>
									
									<span class='age'>Patient's Age: ".$res['p_age']."</span>
									
									<span class='gndr'>Gender :  ".$res['p_gender']."</span><br>
									<span class='wrkr'>Health Worker : ".$res['worker_name']."</span>
									<div class='inside-tab'>
										<table class='tab-table table table-striped'>
											<tr>
												<td>Vaccine Type</td>
												<td>First Dose</td>
												<td>Next Dose</td>
												
											</tr>
											<tr>
												<td>".$res['v_type']."</td>
												<td>".$res['v_schedule_one']."</td>
												<td>".$res['v_schedule_two']."</td>
											
												
											</tr>
										</table>
									</div>
								</div>
							</div>		
					</div>
				
					";
					
				
				//echo gettype($res['v_schedule_one']);
			}
				echo "<div class='margin-bottom'></div>";
		}
										
	}
?>		

							
		</div>
	</center>			
</div>				
		

</body>
</html>
<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>

