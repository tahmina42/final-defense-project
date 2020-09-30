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
						
						<li><a class="menu__item" href="index.php">Home Page</a></li>						
						<li><a class="menu__item" href="logout.php">Log Out</a></li>
					</ul>
				</div>
				<div class="heading-top">
					<h4>Vaccine & Immunization</h4>
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

<div class="container send">
	<div class="row">
		<div class="col-lg-8">
		<h3 class="vaccine-details">Vaccine Details </h3>
			<div class="search">
				<form method="post">
						<input type="text" name="text" placeholder="Search by vaccine name" size="30"><br><br>
						<input type="submit" name="search" class="vsearch"><br><br>
				</form>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="revent">
				<center><h5>Recent Events</h5></center>
				<ul class="recent-event">
		
				<?php 
				$recent= new functions();
				$sql = "SELECT * FROM event ORDER BY posted_on DESC";
				   $result = $recent->select($sql);

						foreach($result as $key => $res)

						{
							echo "<li>";
							echo "<a href='view-event.php'>".$res['e_name']."</a>";
							echo "</li>";	
							

						}

				?>
				</ul>
				
			</div>
		</div>
		<div class="row">
		<div class="col-lg-12">
			<div class="result-tab">
		
				<table class="table table-striped disease">
						<tr style='border-bottom:1px solid gray;' class="headtab2">
							<td>Disease Name</td>
							<td>Vaccine Name</td>
							
							<td>Vaccine Dose</td>
							<td>Approved Age</td>
							
						</tr>
						
						<?php
						
						if(isset($_POST['search']))
						{
									$name = ($_POST['text']);
									$query="SELECT * FROM vaccine_details where d_name='$name' OR v_name='$name' ";
									
									$result=$worker->select($query);
									if($result)
									{	
										
										foreach($result as $key => $res)

										{
											echo "<tr>
													<td>".$res['d_name']."</td>
													<td>".$res['v_name']."</td>
													<td>".$res['v_dose']."</td>
													<td>".$res['approve_age']."</td>
												</tr>";
											
												
											

										}
										
										
									}
									else{
										
										echo"<p style='color:red;font-size:20px'>Didn't match with any result</p>";
									}
	
						}
						
						else
						{
						
							
							$vaccine= new functions();
							$sql = "SELECT * FROM vaccine_details";
							$result = $vaccine->select($sql);

							foreach($result as $key => $res)

							{
								echo "<tr>
										<td>".$res['d_name']."</td>
										<td>".$res['v_name']."</td>
										<td>".$res['v_dose']."</td>
										<td>".$res['approve_age']."</td>
									</tr>";
								
									
								

							}
						}

				?>
						
						
						
				</table>
			</div>
		</div>
		
	</div>
</div>
</div>





					
				

					
			
		