<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />   
   <meta name="description" content="">
    <meta name="author" content="">

    <title>HPL AUCTION</title>

    <!-- Bootstrap core CSS -->
    <link rel= "stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="js/jquery.js"></script>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
    
    
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
  p{
    text-indent: 100px;
    
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
        <li><a href="index.php">Home</a></li>
        
        <li  class="active"><a href="rules.php">Rules</a></li>
        <li><a href="admin-login.php">Admin Login</a></li>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="sign-up.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> User Login</a></li>
        </ul>
      </ul>
    </div>
  </div>
</nav>

<p>
<h4>Sign Up</h4>
        <ul class='list-group'>
            
            <li class='list-group-item'>You can enter your details which includes (Username , Email ,Password ) and can register for HPL Auction.</li>
            <li class='list-group-item'>As you signup Virtual Money of Rs.6000 will be credited to your account</li>
        </ul>

          <h4>Login</h4>
        <ul class='list-group'>
            
            <li class='list-group-item'>You can enter your Username/Email and password to login </li>
            </ul>

        <h4>Bidding Process</h4>
        <ul class='list-group'>
                
                    <li class='list-group-item'>You can Bid on any player of your choice.</li>
                    <li class='list-group-item'>Maximum bidding will be displayed on every players profile</li>
               
                </ul>
           <h4>Admin</h4>
            <ul class='list-group'>
                
                    <li class='list-group-item'>Admin can change your password incase you forget your password</li>
                    <li class='list-group-item'>Admin can lock the bidding after a particular time</li>
                    <li class='list-group-item'>Admin can allot the players after bidding is completed</li>            
        </ul>
    </p>

</body>
</html>
