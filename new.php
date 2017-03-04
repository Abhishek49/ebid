<?php

  require_once("session.php");
  
  require_once("class.user.php");
  $auth_user = new USER();
  
  
  $user_id = $_SESSION['user_session'];
  $username=$_SESSION['user_name'];
  
  $stmt = $auth_user->runQuery("SELECT * FROM users WHERE user_id=:user_id");
  $stmt->execute(array(":user_id"=>$user_id));
   
  $userRow = $stmt -> fetch(PDO::FETCH_ASSOC);
   

  
  if($_POST!=NULL){
	  $message="";
		$bal=$userRow['balance'];
		if(isset($_POST['elem1']) && !empty($_POST['elem1']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant1"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem1'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem1'],":username"=>$username,":contestant"=>"contestant1"));
					$newamt=$userRow['balance'] - ($_POST['elem1'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem1'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant1", ":bider"=>$username,":amount"=>$_POST['elem1']));
					$newamt=$userRow['balance'] - $_POST['elem1'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}
			}
  
		}
		
		//2
		if(isset($_POST['elem2']) && !empty($_POST['elem2']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant2"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem2'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem2'],":username"=>$username, ":contestant"=>"contestant2"));
					$newamt=$userRow['balance'] - ($_POST['elem2'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem2'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant2", ":bider"=>$username,":amount"=>$_POST['elem2']));
					$newamt=$userRow['balance'] - $_POST['elem2'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
				
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}			
			}
  
		}
		
		//3
			if(isset($_POST['elem3']) && !empty($_POST['elem3']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant3"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem3'] - $userRow1['amount']) >= 0)
					{
						$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem3'],":username"=>$username, ":contestant"=>"contestant3"));
					$newamt=$userRow['balance'] - ($_POST['elem3'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem3'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant3", ":bider"=>$username,":amount"=>$_POST['elem3']));
					$newamt=$userRow['balance'] - $_POST['elem3'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}
			}
  
		}
		
		//4
		if(isset($_POST['elem4']) && !empty($_POST['elem4']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant4"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem4'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem4'],":username"=>$username, ":contestant"=>"contestant4"));
					$newamt=$userRow['balance'] - ($_POST['elem4'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem4'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant4", ":bider"=>$username,":amount"=>$_POST['elem4']));
					$newamt=$userRow['balance'] - $_POST['elem4'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
				
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}
			}
  
		}
		
		//5
		if(isset($_POST['elem5']) && !empty($_POST['elem5']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant5"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem5'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem5'],":username"=>$username, ":contestant"=>"contestant5"));
					$newamt=$userRow['balance'] - ($_POST['elem5'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem5'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant5", ":bider"=>$username,":amount"=>$_POST['elem5']));
					$newamt=$userRow['balance'] - $_POST['elem5'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
				
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}
			}
  
		}
		
		//6
		if(isset($_POST['elem6']) && !empty($_POST['elem6']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant6"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem6'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem6'],":username"=>$username, ":contestant"=>"contestant6"));
					$newamt=$userRow['balance'] - ($_POST['elem6'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem6'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant6", ":bider"=>$username,":amount"=>$_POST['elem6']));
					$newamt=$userRow['balance'] - $_POST['elem6'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}	
				
			}
  
		}
		
		//7
		if(isset($_POST['elem7']) && !empty($_POST['elem7']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant7"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem7'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem7'],":username"=>$username, ":contestant"=>"contestant7"));
					$newamt=$userRow['balance'] - ($_POST['elem7'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}
			}
			else
			{
				if($userRow['balance'] - $_POST['elem7'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant7", ":bider"=>$username,":amount"=>$_POST['elem7']));
					$newamt=$userRow['balance'] - $_POST['elem7'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}	
				
			}
  
		}
		
		//8
		if(isset($_POST['elem8']) && !empty($_POST['elem8']))
		{
			$stmt1 = $auth_user->runQuery("SELECT * FROM bid WHERE bider=:username AND contestant=:contestant");
			$stmt1->execute(array(":username"=>$username, ":contestant"=>"contestant8"));
			$userRow1 = $stmt1 -> fetch(PDO::FETCH_ASSOC);
			if($stmt1->rowCount() > 0)
			{
					if($userRow['balance'] - ($_POST['elem8'] - $userRow1['amount']) >= 0)
					{
					$stmt11 = $auth_user->runQuery("UPDATE bid SET amount= :amount WHERE bider= :username AND contestant= :contestant");
					$stmt11->execute(array(":amount"=>$_POST['elem8'],":username"=>$username, ":contestant"=>"contestant8"));
					$newamt=$userRow['balance'] - ($_POST['elem8'] - $userRow1['amount']);
					
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
					}
					else
					{
						$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
					}	
			}
			else
			{
				if($userRow['balance'] - $_POST['elem8'] >= 0)
				{
					$stmt11 = $auth_user->runQuery("INSERT INTO bid(contestant,bider,amount) VALUES(:contestant, :bider, :amount)");
					$stmt11->execute(array(":contestant"=>"contestant8", ":bider"=>$username,":amount"=>$_POST['elem8']));
					$newamt=$userRow['balance'] - $_POST['elem8'];
					$stmt12 = $auth_user->runQuery("UPDATE users SET balance= :amount WHERE user_name= :username ");
					$stmt12->execute(array(":amount"=>$newamt,":username"=>$username));
					$message='<div class="alert alert-success text-center"><strong>Bid successful!</strong></div>';
				}
				else
				{
					$message='<div class="alert alert-danger text-center"><strong>Insufficient Funds</strong></div>';
				}
				
			}
  
		}
  }	
		$maxr = array();
		$max1 = $auth_user->runQuery("SELECT MAX(amount) AS amount from bid WHERE contestant= :contestant");
		
		$mybid = $auth_user->runQuery("SELECT amount, contestant from bid where bider= :bider");
		$mybid->execute(array(":bider"=>$_SESSION['user_name']));
		
		
		$i=1;
		$rows=$mybid->fetchAll(PDO::FETCH_ASSOC);
		$myar=array();
		$myad=0;
		$mybid->fetch(PDO::FETCH_ASSOC);
		while($i<=8){
			$myad=0;
			$conts="contestant".$i;
			foreach($rows as $row)
			{
			
				if($row['contestant']==$conts)
				{
					
					array_push($myar,$row['amount']);
					$myad=1;
				}
			}
			
			if($myad==0)
				array_push($myar,0);	
			$i++;
			reset($mybid);
		}
		
		$max1->execute(array(":contestant"=>"contestant1"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		
		
		$max1->execute(array(":contestant"=>"contestant2"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		$max1->execute(array(":contestant"=>"contestant3"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		$max1->execute(array(":contestant"=>"contestant4"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		$max1->execute(array(":contestant"=>"contestant5"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);			
		else
		array_push($maxr,"No bids");
		
		$max1->execute(array(":contestant"=>"contestant6"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		$max1->execute(array(":contestant"=>"contestant7"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
	
		$max1->execute(array(":contestant"=>"contestant8"));
		$res=$max1->fetch(PDO::FETCH_ASSOC);
		if($res['amount']!= NULL)
		array_push($maxr,$res['amount']);
		else
		array_push($maxr,"No bids");
		
		$stmt->execute(array(":user_id"=>$user_id));
	
		$R=$stmt->fetch(PDO::FETCH_ASSOC);
		$bal1=$R['balance'];
		
		$sel=$auth_user->runQuery("SELECT sell, sellto FROM sell");
	$sel->execute();
	$sell=array();
	$sellto=array();
	while($result=$sel->fetch(PDO::FETCH_ASSOC)){
	array_push($sell,$result['sell']);
	$sellto[$result['sell']]=$result['sellto'];
	
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
       <strong> <span class="glyphicon glyphicon-user"></span>&nbsp;Hi' <?php echo $username; ?>&nbsp;<span class="caret"></span> </strong></a>
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
<div class="container-fluid">
<div class="row "><div class="col-sm-3 alert alert-info"><strong><?php if (isset($bal1))echo "Balance : ".$bal1; ?></strong></div></div>
<div class="row">
<?php if(isset($message) && !empty($message)) echo $message;?>
</div>
	<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">	
				<form action="" method="post">
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[0]; ?></h4></div>
				<img src="images/1.jpg" style="margin-left:30% ;width:auto;height:200px;" />
				<h2>Sachin Tendulkar</h2>
				
				<?php if(!in_array("contestant1",$sell)) echo '<input type="number" name="elem1" value="'. $myar[0] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Sachin Tendulkar sold to ".$sellto['contestant1'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[1]; ?></h4></div>
				<img src="images/2.png" style="margin-left:10% ;width:auto;height:200px;" />
				<h2>Rickey Ponting</h2>
				
				<?php if(!in_array("contestant2",$sell)) echo '<input type="number" name="elem2" value="'. $myar[1] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Rickey Ponting sold to ".$sellto['contestant2'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[2]; ?></h4></div>
				<img src="images/8.jpg" style="margin-left:20% ;width:auto;height:200px;" />
				<h2>AB de Villiers</h2>
				<?php if(!in_array("contestant3",$sell)) echo '<input type="number" name="elem3" value="'. $myar[2] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."AB de Villiers sold to ".$sellto['contestant3'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[3]; ?></h4></div>
				<img src="images/4.jpg" style="margin-left:10% ;width:auto;height:200px;" />
				<h2>Ravindra Jadeja</h2>
				<?php if(!in_array("contestant4",$sell)) echo '<input type="number" name="elem4" value="'. $myar[3] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Ravindra Jadeja sold to ".$sellto['contestant4'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	</div>
	
	<div class="row">
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[4]; ?></h4></div>
				<img src="images/5.jpg" style="margin-left:20% ;width:auto;height:200px;" />
				<h2>Arpit Singh</h2>
				<?php if(!in_array("contestant5",$sell)) echo '<input type="number" name="elem5" value="'. $myar[4] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Arpit Singh sold to ".$sellto['contestant5'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[5]; ?></h4></div>
				
				<img src="images/6.jpg" style="margin-left:5% ;width:auto;height:200px;" />
				<h2>Virat Kohli</h2>
				
				<?php if(!in_array("contestant6",$sell)) echo '<input type="number" name="elem6" value="'. $myar[5] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Virat Kohli sold to ".$sellto['contestant6'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[6]; ?></h4></div>
			<img src="images/7.jpg" style="margin-left:10% ;width:auto;height:200px;" />
				<h2>M.S Dhoni</h2>
				
				<?php if(!in_array("contestant7",$sell)) echo '<input type="number" name="elem7" value="'. $myar[6] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."M S Dhoni sold to ".$sellto['contestant7'].'</div>' ;?>
				
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-3">
		<div class="panel panel-default">
			<div class="panel panel-body">
				<form action="" method="post">
				
				<div class="alert alert-warning">max-bid:<h4><?php  echo $maxr[7]; ?></h4></div>
				<img src="images/3.jpg" style="width:100%;height:200px;" />
				<h2>Rishabh Rajput</h2>
				<?php if(!in_array("contestant8",$sell)) echo '<input type="number" name="elem8" value="'. $myar[7] .'" /> <input type="submit" value="bid!" />'; 
				else echo'<div class="alert alert-info">'."Rishabh Rajput sold to ".$sellto['contestant8'].'</div>' ;?>
				</form>
			</div>
		</div>
	</div>
	</div>
</div>
</body>
</html>
