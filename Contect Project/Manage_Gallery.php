<?php 
 session_start(); 
if (!isset($_SESSION['user'])){
header("location:Log.php");
} ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Manage Gallery</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-grid.min.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css">
<style>
.a{
width:300px;
height:200px;
float:left;
padding:10px;

}
div> img{
width:100%;
height:100%;
float:left;
}

</style>
</head>

<body>
<?php include("menu.php"); ?>
<div><h2 align="center"> Welcome To  <samp style="color:#3399FF; font-size:24px; "><?php echo $_SESSION['user']['name'] ;?></samp></h2></div>

<div class="row container">
	<div class="col-md-6">
			<fieldset>
			<legend>Uploade Photo</legend>
					<form action="img_upload.php" method="post" enctype="multipart/form-data">
					<input type="hidden" name="uid" value="<?php echo $_SESSION['user']['id'] ;?>">
					<input type="file" name="image">
					<input type="submit" name="submit" value="Upload" class="btn btn-sm btn-primary">
					</form>
			</fieldset>
			<samp style="color:#FF0000;" ><?php if(isset($_GET['Error'])){echo $_GET['Error'];} ?>  </samp>
			<samp style="color:#3333FF; font-family:'Times New Roman', Times, serif;"><?php if(isset($_GET['Succes'])){echo $_GET['Succes'];} ?></samp>
	</div>
</div>

<?php 
$conn = mysqli_connect('localhost','root','','contect');
$id = $_SESSION['user']['id'];
$q = "SELECT  `img_lacation` FROM `gallry` WHERE user_id = $id";
$save = mysqli_query($conn,$q);


echo '<div id="img">';
while($data = mysqli_fetch_assoc($save)){
?>
<div class="a">
<img src=" <?php echo $data["img_lacation"]; ?> "><br>

</div>
<?php
}
echo '</div>';

?>
</body>
</html>
