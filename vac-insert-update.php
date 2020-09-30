<?php

	include("functions.php");
	
	$vaccine= new functions();
	if (isset($_POST['submit']))
	{
		
		//$name =($_POST['uname']);
		//$email = ($_POST['email']);
		//$pass = ($_POST['upass']);
		//$cpass = ($_POST['cpass']);
		//$contact = ($_POST['ucontact']);
		$vtype = ($_POST['vtype']);
		$vsd1 = ($_POST['vschedule1']);
		$vsd2 = ($_POST['vschedule2']);
		$vsd3 = ($_POST['vschedule3']);
		$vsd4 = ($_POST['vschedule4']);
		$page = ($_POST['page']);
		$gender = ($_POST['gender']);
		$hw = ($_POST['worker']);
		$count=0;

			$query = "INSERT INTO vaccine_assign
				(v_type,v_schedule_one,v_schedule_two,v_schedule_three,v_schedule_four,p_age,p_gender,worker_name,count)
			VALUES('$vtype','$vsd1','$vsd2','$vsd3','$vsd4','$page','$gender','$hw',$count)";
			
			if($registration->insert($query)){
				
				
				echo"assigned";
			}
			
	   }


	
	?>
