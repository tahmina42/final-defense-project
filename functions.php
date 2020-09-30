<?php
include_once 'connection.php';
session_start();
class functions extends connection
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function insert($data) 
	{
		
		$execute=$this->con->query($data);
		if($execute)
		{
			
			return true;
		}
		else
		{
			
			
			return false;
		}
			
	}
	public function select($selectdata)
	{
		
		$result = $this->con->query($selectdata);
		
		if ($result == false) {
			return false;
		} 
		
		$rows = array();
		
		while ($row = $result->fetch_assoc()) {
			$rows[] = $row;
		}
		
		return $rows;
	}

	public function delete($id) 
	{ 
		$query = "DELETE FROM reguser WHERE reg_id = $id";
		
		$result = $this->con->query($query);
	
		if ($result == false) {
			echo 'Error: cannot delete data ';
			return false;
		} else {
			return true;
		}
	}
	
	public function escape_string($value)
	{
		return $this->con->real_escape_string($value);
	}
	public function logout(){
		unset($_SESSION['email']);
		header("location:index.php");
		
	}
}
?>
