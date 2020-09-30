
<?php

include("functions.php");
$log= new functions();
if (isset($_POST['login'])){
	
	$email=$_POST['uemail'];
	$password=$_POST['upass'];
	$query = "SELECT u_name,u_email,u_pass,u_type FROM user where u_email='$email'";
	$result=$log->select($query);
	foreach($result as $key => $res){
	
		
		if($password==$res['u_pass']){
		//if($res['type']=='student'){
			$_SESSION['email']=$email;
			$_SESSION['name']=$res['u_name'];

			$_SESSION['type']=$res['u_type'];
			
			if($_SESSION['type']=='Health Worker'){
				echo"<script>window.location.href=\"healthworker-dash.php\"</script>";
					$_SESSION['success']  = "You are now logged in";
			}
		
			else if($_SESSION['type']=='Patient'){
				echo"<script>window.location.href=\"patient-dash.php\"</script>";
				$_SESSION['success']  = "You are now logged in";
				
			}
			else if($_SESSION['type']=='Admin'){
				
				
				echo"<script>window.location.href=\"admin.php\"</script>";
			}
			else{
				
				echo"<strong>User not found</font></strong>";
			}
		}
		else{
			echo "<strong><font color=red>Email or password invalid</font></strong>";
		}
		}
		
			
			
		
		
	}
	
			
			
	
	

?>