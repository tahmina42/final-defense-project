<?php
class connection
{
	public $host="localhost";
	public $username="root";
	public $password="";
	public $dbname="final_defense";
	public $con;
	public function __construct()
	{
	    $this->con=new mysqli($this->host,$this->username,$this->password,$this->dbname);
		if(mysqli_connect_errno())
			{
				echo"database connection failed";
				exit;
			}
		else
			{
			
				return true;
			}
	}
	
	
}

?>