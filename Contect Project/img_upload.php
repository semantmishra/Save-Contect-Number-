<?php
if(isset($_POST['submit'])){
	$user_id  = filter_var($_POST['uid'],FILTER_SANITIZE_NUMBER_INT);
$user_id=filter_var($_POST['uid'],FILTER_VALIDATE_INT);
if($user_id)
{
$id = $user_id;
$name = $_FILES['image']['name'];
$tmp_name = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];
$upload_dir = "Gallry_image/".$name;
$ext = pathinfo($name,PATHINFO_EXTENSION);

$real_ext = strtolower($ext) ;
if ($real_ext == "jpg" OR $real_ext == "jpeg" OR $real_ext == "png"){
							if (!file_exists($upload_dir))
								{
							
										$uplod = move_uploaded_file($tmp_name,$upload_dir);
										//data base part
										if($uplod)
										{
										$conn = mysqli_connect('localhost','root','','contect_');
										$sql = " INSERT INTO `gallry`(`user_id`,`img_lacation`) VALUES (?,?)";
										$query = mysqli_prepare($conn,$sql);
												if($query){
													mysqli_stmt_bind_param($query,'is',$id,$upload_dir);
													$save = mysqli_stmt_execute($query);
															if($save){
														header('location:Manage_Gallery.php?Succes=Data Isert Succes');
																	}
																	else{
																	if (file_exists($upload_dir)){
																	unlink($upload_dir);
															header('location:Manage_Gallery.php?Error=Data Insert Error');
															mysqli_stmt_close($query);
															mysqli_close($conn);
																								}
																		}
														}
										
										}
										else
										{
										header('location:Manage_Gallery.php?Error=Falls ');
										}
								}
								else 
								{
								header('location:Manage_Gallery.php?Error=File Exists ');
								}			
				}		
			else {
				header('location:Manage_Gallery.php?Error=Plase Choice Only  Image');
				}
		}
		else{
	 header('location:Manage_Gallery.php?Error=InCorrect id');
			}
}
else 
{
header('location:Manage_Gallery.php?Error=Plase Choice File');
}
/*
											*/
?>