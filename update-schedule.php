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
<?php 
$assign= new functions();
$id = ($_GET['id']);
//$result = $assign->select("SELECT * FROM vaccine_assign WHERE p_id=$id");

		
		
$query="SELECT 
				vaccine_assign.p_id,
				vaccine_assign.v_type,
				vaccine_assign.v_schedule_one,
				vaccine_assign.v_schedule_two,
				vaccine_assign.p_age,
				vaccine_assign.p_gender,
				vaccine_assign.worker_name,
				vaccine_assign.count,
				user.u_name,
				user.u_contact
		FROM vaccine_assign 
		INNER JOIN user 
		ON 
		user.u_id=vaccine_assign.user_id
		where 
		p_id='$id' ";
		
$result = $assign->select($query);		
if($result){
	foreach ($result as $res) 
	{
			$patient_name 	=($res['u_name']);
			//$patient_email	=($res['p_email']);
			$vtype = ($res['v_type']);
			$vsd1 = ($res['v_schedule_one']);
			$vsd2 = ($res['v_schedule_two']);
			//$vsd3 = ($res['v_schedule_three']);
			//$vsd4 = ($res['v_schedule_four']);
			$page = ($res['p_age']);
			$gender = ($res['p_gender']);
			$hw = ($res['worker_name']);
			$count=($res['count']);
	}
}
?>


<section class="empty-two">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<center><div class="vaccine-form-center">
					<center><h2>Update Vaccine</h2></center>
					
						<div class="table-two">
						<form method="post" action="">
						<center><table>
						  <tr>
							<td style="padding:13px 25px"><label>Patient Name:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="text" name="pname" disabled="disabled"
							value="<?php echo $patient_name;?>"  placeholder="Enter patient's name" required></td>
						
						  </tr>
						  
						  <tr>
							<td style="padding:13px 25px"><label>Vaccine Type:</label></td>
							<td style="padding:13px 25px">
								<select name="vtype" value="<?php echo $vtype;?>">
									<option >DPT</option>
									<option>HepA vaccine</option>
									<option>HepB vaccine</option>
									<option>Flu vaccine</option>
									<option>Varicella vaccine</option>
									<option>Influenza</option>
								</select>
							</td>
						  </tr>
						  
						  <tr>
							<td style="padding:13px 25px"><label>Vaccine Dose-1:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="date" name="vschedule1" value="<?php echo $vsd1;?>" placeholder="Enter Vaccine Schedule" required ></td>
						  </tr>
						  
						  <tr>
							<td style="padding:13px 25px"><label>Vaccine Dose-2:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="date" name="vschedule2" value="<?php echo $vsd2;?>" placeholder="Enter Vaccine Schedule" ></td>
						  </tr>
						  
						  <tr style="display:none">
							<td style="padding:13px 25px"><label>Vaccine Dose-3:</label></td>
							<td style="padding:13px 25px"><input class="tab" type="date" name="vschedule3" value="<?php echo $vsd3;?>" placeholder="Enter Vaccine Schedule"  ></td>
						  </tr>
						  
						  <tr style="display:none">
							<td style="padding:13px 25px"><label>Vaccine Dose-4:</label></td>
							<td style="padding:13px 25px"><input class="tab" type="date" name="vschedule4" value="<?php echo $vsd4;?>" placeholder="Enter Vaccine Schedule"  ></td>
						  </tr>
						  
						  <tr>
							<td style="padding:13px 25px"><label>Age:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="text" name="page" value="<?php echo $page;?>" placeholder="Enter patient's age" required ></td>
						  </tr>
						  
						  <tr>
							<td style="padding:13px 25px"><label>Gender:</label></td>
							<td style="padding:13px 25px">
													
								<input type="radio" id="male" name="gender" value="male">
								<label for="male">Male</label>
								<input type="radio" id="female" name="gender" value="female">
								<label for="female">Female</label><br>
															
							</td>
						  </tr>
						  
						   <tr style="display:none">
							<td style="padding:13px 25px"><label>Health Worker:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="text" name="worker" value="<?php echo $hw; ?>" placeholder="Enter Health Worker's name" required ></td>
						  </tr>
						  
						   <tr style="display:none">
							<td style="padding:13px 25px"><label>Mail:</label></td>
							<td style="padding:13px 25px"><input class="tab2" type="text" name="status" value="Not-Send" ></td>
						  </tr>
						  
						  <tr>
							<td>
							</td>
							<td>
								<input type="submit" name="update" id="button" class="btn login-two" value="Update">
							</td>
						  </tr>
					</table></center>
					
					</form>
					</div>
				</div></center>
			</div>
		</div>
	</div>		
</section>

<?php	//$vaccine= new functions();
	if (isset($_POST['update']))
	{
		
		//$name =($_POST['uname']);
		//$email = ($_POST['email']);
		//$pass = ($_POST['upass']);
		//$cpass = ($_POST['cpass']);
		//$contact = ($_POST['ucontact']);
		//$pname =($_POST['pname']);
		//$pemail = ($_POST['pmail']);
		$vtype = ($_POST['vtype']);
		$vsd1 = ($_POST['vschedule1']);
		$vsd2 = ($_POST['vschedule2']);
		//$vsd3 = ($_POST['vschedule3']);
		//$vsd4 = ($_POST['vschedule4']);
		$page = ($_POST['page']);
		$gender=($_POST['gender']);
		$status = ($_POST['status']);
		$count=$count+1;
		//$hw = ($_POST['worker']);
		

			$query = "UPDATE vaccine_assign SET 
				
					v_type='$vtype',
					v_schedule_one='$vsd1',
					v_schedule_two='$vsd2',	
					p_age='$page',
					p_gender='$gender',
					mail_status='$status',
					count='$count'
					WHERE 
					p_id='$id' ";
					if($assign->insert($query))
					{

						echo"<script>window.location.href=\"vac-assign-update.php\"</script>";
					}
				else{
					echo"not updated";
					
				}
					
			
	}
	?>

	</body>
</html>
<?php
	if($_SESSION['email']==""){
	header("location:index.php");
								
	}
?>