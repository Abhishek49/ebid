<?php

require_once("session1.php");
  
  require_once("class.user.php");
  $auth_user = new USER();
  
  
  $user_id = $_SESSION['admin_session'];
  $username=$_SESSION['admin_name'];
  
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE 1");

  
   
  $rows = $stmt -> fetch(PDO::FETCH_ASSOC);
 

if($_POST!=NULL)
{

	if(isset($_POST['cp'])){
		$updatepass=$auth_user->runQuery("UPDATE users SET user_pass=:password WHERE user_name=:username"); 
		$updatepass->execute(array(":password"=>password_hash($_POST['password'], PASSWORD_DEFAULT), ":username"=>$_POST['username']));
		if($updatepass->rowCount()>0)
			$message="Password Changed";
		else
			$message="No such user";
	}
	
	
}
if(isset($_GET['showcontestant'])){
	$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE contestant= :contestant order by amount desc");
	
	$str="<table class='table'><tr><th>Username</th><th>Bid</th></tr>";
	$stmt1->execute(array(":contestant"=>$_GET['showcontestant']));
	$str=$str.$_GET['showcontestant'];
	
	while($row=$stmt1->fetch(PDO::FETCH_ASSOC)){
		$str=$str."<tr><td>".$row['bider']."</td><td>".$row['amount']."</td></tr>";
		
		
	}
	$str=$str."</table>";
	
}
$sel=$auth_user->runQuery("SELECT sell, sellto FROM sell");
$sel->execute();
$sell=array();
$sellto=array();
while($result=$sel->fetch(PDO::FETCH_ASSOC)){
	array_push($sell,$result['sell']);
	array_push($sellto,$result['sellto']);
	
}

if(isset($_POST['sell'])){
	if(!in_array($_POST['sell'] ,$sell)){
	$qdetails=$auth_user->runQuery("SELECT * FROM bid WHERE amount in (SELECT MAX(amount) FROM bid WHERE contestant= :contestant) ");
	$qdetails->execute(array(':contestant'=>$_POST['sell']));
	$srow=$qdetails->fetch(PDO::FETCH_ASSOC);
	$qsell=$auth_user->runQuery("INSERT INTO sell(sell,sellto,amount) VALUES(:sell,:sellto,:amount)");
	$qsell->execute(array(':sell'=>$_POST['sell'],':sellto'=>$srow['bider'],':amount'=>$srow['amount']));
	if($qsell->rowCount() > 0)
	{
		$sellmessage='<div class="alert alert-success">'.$_POST['sell']." sold to ".$srow['bider']." for ".$srow['amount'].'</div>' ;
	}
	else
		$sellmessage='<div class="alert alert-danger">Something\'s not right</div>';
	}
	else
		$sellmessage='<div class="alert alert-danger">Already sold</div>';
		
}


$sel->execute();

while($result=$sel->fetch(PDO::FETCH_ASSOC)){
	array_push($sell,$result['sell']);
	array_push($sellto,$result['sellto']);
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>



    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no" />   
   <meta name="description" content="">
    <meta name="author" content="">

    <title>welcome - <?php print($username); ?></title>

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
  .navbar-inverse .navbar-nav>li>a {
    color: #FFF;
}

  .middle1 {
   position: relative;
    left: 40%;
    margin-bottom: 10px;
  }

  .middle1>.btn{
     position: relative;
    left: 12%;
  }
    #pass {
     position: absolute;
    left: 50%;
    margin: 0 20px 0 0;

}
    #btn {
    position: relative;
    margin-top: 10px;
    left: 40%;

  }
  #right
  {
    margin-left: 15%;
  }
  #btn2 {
    position: relative;
    margin-top: 10px;
    left: 40%;

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
        <li class="active"><a href="#">Home</a></li>
        
            <ul class="nav navbar-nav navbar-right">
            
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
       <strong> <span class="glyphicon glyphicon-user"></span>&nbsp;Hi! <?php echo $username; ?>&nbsp;<span class="caret"></span> </strong></a>
              <ul class="dropdown-menu">
                <li><a href="logout.php?logout=true"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Sign Out</a></li>
              </ul>
            </li>
          </ul>
        </ul>
      </ul>
    </div>
  </div>
</nav>

  

<div class="panel panel-default">
<strong><div class="panel-heading"  id="pass">CHANGE PASSWORD OF ANY USER</div></strong>
<div class="alert alert-success"><?php if(isset($message)) echo $message;  ?></div>
<form action="" method="post" >
<div class="middle1">
<div class="input-group col-xs-4">
<span class="input-group-addon" id="sizing-addon3">Username</span>
<input type="text" class="form-control" name="username" placeholder="Enter Username">
</div>
<div class="input-group col-xs-4 ">
<span class="input-group-addon" id="sizing-addon3"> Password. </span>
<input type="password" class="form-control" name="password" placeholder="Enter new Password">
</div>
<p></p>
<button type="submit" class="btn btn-danger" name="cp" >Change password</button>
</div>
</form>
</div>
</div>
</div>
<br>
<br>



<div class="panel panel-warning">
<strong><div class="panel-heading" id="pass">SEE CONTESTANT BIDING</div></strong>
<br>
<br>
<div class="panel-body">
<form method="get" action="">
<?php $contestant=$auth_user->runQuery("SELECT DISTINCT contestant from bid " );
$contestant->execute(); ?>
<div class="col-xs-4">
<select name="showcontestant" class="form-control">
<?php $contestsel="";
while($row=$contestant->fetch(PDO::FETCH_ASSOC)){
$contestsel = $contestsel . '<option value="'.$row['contestant'].'">'.$row['contestant'].'</option>';


}
echo $contestsel;
?>
</select>
<div class="abc">
<button type= "submit" class="btn btn-info" id="btn">Search</button>
</div>
</div>
</form>
<div class="col-xs-4" id="right">
<form method="post" action="">
<?php 
echo '<select name="sell" class="form-control ">';

echo $contestsel;
echo "</select>";

echo '<button type="submit" class="btn btn-info" id="btn2" >Sell</button>'; ?>


</form> 
</div>

</div>
<?php if(isset($sellmessage)) echo $sellmessage; ?>
<?php if(isset($str)) echo $str; ?>

</form>
</div>
</div>
</div>


</body>
</html>