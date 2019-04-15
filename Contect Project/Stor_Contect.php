
<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");

}

if (isset($_POST['submit'])){
include('function.php');
	$validate = Check_Empty($_POST);
		if($validate===true){
				$data = filter_data($_POST);
				if(is_array($data)){
					//data base
					include('database.php');
					$exist = Check_numbe_exist($data);
						if(is_array($exist)){
								$dataInset = data_insert($exist);
									if($dataInset===true){
									Dislpay_Succes("Data_save");
									}
									else {
									Dislpay_Error($dataInset);
									}
								
						}
						else{
						Dislpay_Error($exist);
						}
					
					
				
				}
				else{
				Dislpay_Error($data);
				}
				
		}
		else {
		Dislpay_Error($validate);
		}

}




?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>My Contect</title>
<style>
.Error{
color:#FF0000;
text-align:center;
}

.Succes{
color:#0066FF;
text-align:center;
}

.table-insett{
height:auto;
width:250px;
border:1px solid red;
float:left;
margin-left:10px;
}
.show-contect{
margin-left:400px;
}
</style>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
</head>

<body>


<?php include('menu.php'); include("BootStrap.php"); ?>

<div> 
<h2 align="center"> Welcome To  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h2>
 </div>
 <div class="container">
 <div class="row">
<div class="col-md-3">
<form method="post" action="">
<input type="hidden" name="id" value="<?php echo $_SESSION['user']['id'] ;?>">
<input type="text"  class="form-control mb-2" name="name" value="" maxlength="30" placeholder="Enter Name">
<input type="text" class="form-control mb-3" name="contect" value=""  maxlength="20" placeholder="Enter Number">
<input type="submit" class="btn-outline-primary btn btn-sm" name="submit" value="Save Contect" >
 </form>

</div>
<div class="col-md-9 text-center">
<table width="200" border="0" class="table-hover table table-striped ">
  <tr>
    <th>Name</th>
    <th>Mobile</th>
  </tr>
  
  <?php 
  $id = $_SESSION['user']['id'];
include_once('database.php');
$con =  DB();
$uid = $id;
$sql = " SELECT `name`,`mobile` FROM `contec` WHERE id = ? " ;
$q = mysqli_prepare($con,$sql);
	if($q)
	{
		mysqli_stmt_bind_param($q,'i',$uid);
		mysqli_stmt_bind_result($q,$name,$number);
		$st = mysqli_stmt_execute($q);
		while(mysqli_stmt_fetch($q)){
		
		?>
		<tr>
    <td><?php echo $name ;?></td>
    <td><?php echo $number ;?></td>
  </tr>
	<?php 
	}
	mysqli_close($con);
	}
  ?>
  
</table>
</div>
</div>
</div>







 
</body>
</html>
