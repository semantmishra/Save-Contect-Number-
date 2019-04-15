
<?php session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Home</title>
</head>

<body>

<?php include('menu.php');  ?>


<div> 
<h2 align="center"> Welcome To  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp>  </h2>
</div>
</body>
</html>
