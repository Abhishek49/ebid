<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
  $login->redirect('new.php');
}

if(isset($_POST['btn-login']))
{
  $uname = strip_tags($_POST['txt_uname_email']);
  $umail = strip_tags($_POST['txt_uname_email']);
  $upass = strip_tags($_POST['txt_password']);
    
  if($login->doLogin($uname,$umail,$upass))
  {
    $login->redirect('new.php');
  }
  else
  {
    $error = "Wrong Details !";
  } 
}
?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HPL AUCTION - Login</title>
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="style.css" type="text/css"  />
 <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
</head>
  

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
      <a class="navbar-brand" href="index.php" ><img src="logo.png" ></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav nav-pills navbar-center">
        <li class="active"><a href="index.php">Home</a></li>
        <li class="dropdown">
          
      </ul>
    </div>
  </div>
</nav>
<div class="signin-form">

  <div class="container">
     
        
       <form class="form-signin" method="post" id="login-form">
      
        <h2 class="form-signin-heading">User Login Portal</h2><hr />
        
        <div id="error">
        <?php
      if(isset($error))
      {
        ?>
                <div class="alert alert-danger">
                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                </div>
                <?php
      }
    ?>
        </div>
        
        <div class="form-group">
        <input type="text" class="form-control" name="txt_uname_email" placeholder="Username or E mail ID" required />
        <span id="check-e"></span>
        </div>
        
        <div class="form-group">
        <input type="password" class="form-control" name="txt_password" placeholder="Your Password" />
        </div>
       
      <hr />
        
        <div class="form-group">
            <button type="submit" name="btn-login" class="btn btn-default">
                  <i class="glyphicon glyphicon-log-in"></i> &nbsp; SIGN IN
            </button>
        </div>  
        <br />
            <label>Don't have account yet ! <a href="sign-up.php">Sign Up</a></label>
            <p>Copyright © 2016 ANAND TECHNOSOLUTIONS</p>
          <p>Developed And Maintained By Abhi </p>
      </form>

    </div>
    
</div>

</body>
</html>
