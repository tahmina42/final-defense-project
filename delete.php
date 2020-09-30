

<?php




include("functions.php");
$delete= new functions();
$id = ($_GET['id']);

$result = $delete->select("SELECT * FROM user WHERE u_id=$id");
foreach ($result as $res) {
	

		$user_type 	=($res['u_type']);
		
		

}
if($user_type=='Health Worker'){
	$query = "DELETE FROM user WHERE u_id = $id";
	$result=$delete->delete($query);
	$msg="User has been deleted";
		if($result){
			
			
			echo
			"<script>
				
				window.location.replace(\"all-health-worker.php\");
			
			</script>";
		}

}
else{
	
	$query = "DELETE FROM user WHERE u_id = $id";
	$result=$delete->delete($query);
	$msg="User has been deleted";
		if($result){
			
			
			echo
			"<script>
				
				window.location.replace(\"all-patient.php\");
			
			</script>";
		}
	
}


 ?>
