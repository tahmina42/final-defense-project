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
						<li><a class="menu__item" href="patient-vaccine-card.php">Vaccine Card</a></li>	
						<li><a class="menu__item" href="search-worker.php">Search Health Worker</a></li>
						
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

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-8">
			<div class="Event-head">
			<h2>All Events</h2>
				
				<?php

				$show = new functions();	
				$sql = "SELECT * FROM event ORDER BY posted_on DESC";
				$rst = $show->select($sql);	
?> 
<?php
    foreach($rst as $key => $res) {
      echo "<div id='eventimg_div'>";
		echo "<a><span class='admin'><i class='fas fa-user'></i>Posted By:</span> ".$res['posted_by']."</a>";
		echo "<a class='date'><span><i class='fas fa-calendar-alt'></i>Posted On:</span> ".$res['posted_on']."</a>";
      	echo "<img class='event-img' src='upload-img/".$res['img']."' >";
		echo"<div class='post-mid'>
      	 <h4><span>Event name:</span> ".$res['e_name']."</h4>
      	 <p><span>Event Details:</span> ".$res['details']."</p>
		</div>";
      	echo "</div>";
      	
        
    }
	echo"<br><br>";
  ?>
			</div>
		</div>
		<div class="col-lg-4 up">
			<div class="revent">
				<center><h5>Vaccine List</h5></center>
				<ul class="recent-event">
		
					<?php
					$recent= new functions();
				$sql = "SELECT * FROM vaccine_details";
				   $result = $recent->select($sql);

						foreach($result as $key => $res)

						{
							echo "<li>";
							echo "<a href='vaccinelist.php'>".$res['d_name']."</a>";
							echo "</li>";	
							

						}

				?>

				
				</ul>
				
			</div>
		</div>
	</div>

</div>


</body>
</html>

