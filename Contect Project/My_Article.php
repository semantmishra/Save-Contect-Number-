<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
} ?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>My Article </title>
<style>
.a{
border:none;
}
.a:hover{

border-bottom-style:double;
}

</style>

<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">
</head>

<body class="container-fluid">

<?php include("menu.php"); ?>
<div><h2 align="center"> Welcome To  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h2>
</div>
 <div class="row">
	<div class="col-lg-10 m-auto">


<form method="post" onSubmit="return onSubmitf()" action="submit_article.php">
  <div align="center"><span style="color:#FF0000; text-align:center; ">
	  <?php 
	if(isset($_GET['e']))
	{
	echo $_GET['e'];
	}
	if(isset($_GET['s']))
	{
	echo $_GET['s'];
	}
	
	?>
	  
	</span>
  </div>

  
	<input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ;?>">
	<input type="text" class="form-control a" onBlur="ti()" onKeyUp="ti()"  id="atical_t" name="atical_title" placeholder="Article Title" size="98"> <samp id="t"></samp><br>
	
	
    <textarea class="form-control" id="article" onBlur="ma()" onKeyUp="ma()" name="article" cols="100" rows="10" placeholder="Main Articl" style=" border-color:#000099; font-family:Verdana, Arial, Helvetica, sans-serif; "></textarea><samp id="m"></samp>
    <input type="submit" class=" btn btn-sm btn-outline-primary" name="submit" value="POST">
    
</form>

</div>
</div>


<div class="row">
	<div class="col-lg-10 m-auto">	<br>
<?php 
$id = $_SESSION['user']['id'];
include_once('database.php');
$con =  DB();
$uid = $id;
$sql = " SELECT * FROM `article` WHERE user_id = ? " ;
$q = mysqli_prepare($con,$sql);
	if($q)
	{
		mysqli_stmt_bind_param($q,'i',$uid);
		mysqli_stmt_bind_result($q,$id,$title,$article);
		$st = mysqli_stmt_execute($q);
		while(mysqli_stmt_fetch($q)){
		?>
		<div class="card" >
					<div class="card-header card-title">
						<?php echo $title ;?>
						
					</div>
					<div class="card-body">
						
						<?php echo $article ;?>
					</div>
			
					<div class="card-footer">
					
					
					</div>
		</div>
<br>
 
		<?php 
	}
	mysqli_close($con);
	}
  ?>
  
	</div>
</div>
<script src="script.js"></script>
</body>
</html>
