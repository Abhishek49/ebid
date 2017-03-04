<?php

require_once('dbconfig.php');

class USER
{	

	private $conn;
	
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	}
	
	public function register($uname,$umail,$upass,$bal)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO users(user_name,user_email,user_pass,balance) 
		                                               VALUES(:uname, :umail, :upass, :bal)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
			$stmt->bindparam(":bal", $bal);		
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	

	public function adminregister($uname,$umail,$upass)
	{
		try
		{
			$new_password = password_hash($upass, PASSWORD_DEFAULT);
			
			$stmt = $this->conn->prepare("INSERT INTO admin(user_name,user_email,user_pass) 
		                                               VALUES(:uname, :umail, :upass)");
												  
			$stmt->bindparam(":uname", $uname);
			$stmt->bindparam(":umail", $umail);
			$stmt->bindparam(":upass", $new_password);										  
			
			$stmt->execute();	
			
			return $stmt;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
	public function doLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM users WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['user_session'] = $userRow['user_id'];
					$_SESSION['user_name']=$userRow['user_name'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}

	public function adminLogin($uname,$umail,$upass)
	{
		try
		{
			$stmt = $this->conn->prepare("SELECT user_id, user_name, user_email, user_pass FROM admin WHERE user_name=:uname OR user_email=:umail ");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() == 1)
			{
				if(password_verify($upass, $userRow['user_pass']))
				{
					$_SESSION['admin_session'] = $userRow['user_id'];
					$_SESSION['admin_name']=$userRow['user_name'];
					return true;
				}
				else
				{
					return false;
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	
	public function is_loggedin()
	{
		if(isset($_SESSION['user_session']))
		{
			return true;
		}
	}


	public function is_adminloggedin()
	{
		if(isset($_SESSION['admin_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout()
	{
		session_destroy();
		unset($_SESSION['user_session']);
		return true;
	}
}
?>