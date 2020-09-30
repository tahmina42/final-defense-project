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
						<li><a class="menu__item" href="#">Login</a></li>
						<li><a class="menu__item" href="#">Registration</a></li>
						<li><a class="menu__item" href="#">Home Page</a></li>
						<li><a class="menu__item" href="#">Offered Vaccine</a></li>
						<li><a class="menu__item" href="#">Events</a></li>
						<li><a class="menu__item" href="#">Contact Us</a></li>
					</ul>
				</div>
				<div class="heading-top">
					<h4>Vaccine & Immunization</h4>
				</div>
			</div>
			
		</div>
	</div>
</header>
	<?php
	include("insert.php");?>
<div class="space-50"></div>


	<section class="bg-dark">
		<div class="container reg-small">
			 <div class="row hgt">
				<div class="col-lg-6 padding-both" style="background-color:lightblue;"> 
					 <img src="assets/img/Png doctor.png" class="reg_img_item"><br>
					 <span class="reg-span">Already registered?<a href="login.html"> Sign in here</a></span>
				</div>
				<div class="col-lg-6 padding-both" style="background-color:#1b5692;"> 
					<h1 class="heading">Sign Up</h1>
					<table>
						<form action="" method="post">
							<tr>
								<td>
									<div class="form-group">
									<label class="label" for="uname">User Name:</label>
								</td>
								<td>
									  <input type="text" class="form-control" id="uname" placeholder="Enter your name" name="uname" required>
									   
									  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="mail">Email:</label>
								</td>
								<td>
								  <input type="email" class="form-control" id="mail" placeholder="Enter Your email" name="email" required>
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
								  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="upass" required>
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Confirm Password:</label>
								</td>
								<td>
								  <input type="password" class="form-control" id="pwd" placeholder="Re-enter password" name="cpass" required>
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Account No:</label>
								</td>
								<td>
								<input type="text" class="form-control" id="pwd" placeholder="Enter your account no" name="acc" required>
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
								  <input type="text" class="form-control" id="pwd" placeholder="Enter your contact no" name="ucontact" required>
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
							
							<tr>
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd">Working Area</label>
								</td>
								<td>
								 <textarea  cols="30" name="address" required></textarea>
									</div>
								</td>
							</tr>
							
							<tr style="display:none">
								<td>
									<div class="form-group">
									<label class="label_item" for="pwd"></label>
								</td>
								<td>
									
								  <input type="text" class="form-control" id="pwd" name="utype"
								   value="Health Worker" required>
								  <div class="invalid-feedback">Please fill out this field.</div>
									</div>
								</td>
							</tr>
						</table>
					 <input type="submit" name="submit" id="button" class="btn login" value="Submit">
					</form>
				</div>
			</div>
		</div>
		
	</section>
	</body>
</html>