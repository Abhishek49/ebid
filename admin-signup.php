<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('admin.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "provide username !";	
	}
	else if($umail=="")	{
		$error[] = "provide email id !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Please enter a valid email address !';
	}
	else if($upass=="")	{
		$error[] = "provide password !";
	}
	else if(strlen($upass) < 6){
		$error[] = "Password must be atleast 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT user_name, user_email FROM admin WHERE user_name=:uname OR user_email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['user_name']==$uname) {
				$error[] = "sorry username already taken !";
			}
			else if($row['user_email']==$umail) {
				$error[] = "sorry email id already taken !";
			}
			else
			{
				if($user->adminregister($uname,$umail,$upass)){	
					$user->redirect('admin-signup.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
 <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HPL AUCTION ADMIN SIGNUP</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  /> 
<link href="css/style.css" rel="stylesheet" media="screen">    
    
  </head>
<style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 60%;
      margin: auto;
  }
  @media(min-width:767px){
  .dropdown-submenu {
    position:relative;
}

.navbar-default{
  
  background:rgba(225,225,225,0.5);
  height:80px;
  -webkit-transition: 0.5s All;
}
.navbar-brand{
  height:100%;
  padding:5px;
}
  .navbar-brand>img{
    height:60px;
    width:120px;  
    padding-right:20px;
  }
.navbar-default .navbar-nav>li>a{
    height:100%;
    padding-top:30px;
    padding-bottom:30px;
   
  }
  .nav>li>a {
      position: relative;
    display: block;
    padding: 25px 50px;
  }
  </style>
<body>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header" >
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#" ><img src="logo.png" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav nav-pills navbar-center">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
          
        </li>
        <li><a href="admin-login">Admin Login</a></li>
        
      
      </ul>
    </div>
  </div>
</nav>
<div class="signin-form">

<div class="container">
    	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Sign up.</h2><hr />
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Successfully registered <a href='admin-login.php'>login</a> here
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_uname" placeholder="Enter Username" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" class="form-control" name="txt_umail" placeholder="Enter E-Mail ID" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" class="form-control" name="txt_upass" placeholder="Enter Password" />
            </div>
            <div class="clearfix"></div><hr />
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;SIGN UP
                </button>
            </div>
            <br />
            <label>have an account ! <a href="admin-login.php">Sign In</a></label>
        </form>
       </div>
</div>

</div>

</body>
</html>