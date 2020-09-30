<?php
include("functions.php");

$editprofile = new functions();


$id = ($_GET['id']);


$result = $editprofile->select("SELECT * FROM user WHERE u_id=$id");


if (isset($_POST['update'])){

		$user_name =($_POST['uname']);
		$user_email = ($_POST['uemail']);
		$user_pass = ($_POST['upass']);
		$user_contact = ($_POST['ucontact']);

		//image upload
	    $image = $_FILES['image']['name'];
        $tname = $_FILES["image"]["tmp_name"];
      //$target = "images/".basename($image);
      $uploads_dir = 'upload-img';

      move_uploaded_file($tname, $uploads_dir.'/'.$image);
		$query = "UPDATE user SET 
					u_name='$u_name',
					u_email='$user_email,
					u_pass='$user_pass',
					u_contact='$user_contact',
					img='$image'
				WHERE 
					u_id=$id";
		if($editprofile->insert($query)){
			
			
	
			echo"<script>window.location.href=\"healthworker-dash.php\"</script>";
		}
		else{
			echo"not updated";
			
		}
	}


?>
