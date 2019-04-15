<?php 
function DB(){
$conn = mysqli_connect('localhost','root','','contect');
return $conn;
}

/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			sinup function start
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function Email_status($data){
$conn = DB();
$email = $data['email'];
$sql = "SELECT * FROM `user` WHERE email = '$email'  ";
$n = mysqli_query($conn,$sql);
$num = mysqli_num_rows($n);
	if($num == 0){
	return true;
	}
	return "Email Exists Enter Other Email";
}

function DataBsae($arg){
$conn = DB();
$sql = "INSERT INTO `user`(`name`, `email`, `gender`, `password`) VALUES (?,?,?,?)";
$query = mysqli_prepare($conn,$sql);
	if($query){
			mysqli_stmt_bind_param($query,'ssss',$arg["name"],$arg["email"],$arg["gender"],$arg["password"]);
			$status = mysqli_stmt_execute($query);
			if($status){
				mysqli_stmt_close($query);
				mysqli_close($conn);
				return true;
				}
				mysqli_stmt_close($query);
				mysqli_close($conn);
				return "Email Exit ";
		}

}
/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			sinup function end
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////




/*///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//			login function start
//
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function database($arg){
$conn = DB();
$email = $arg["Email"];
$pass =  $arg["Password"];
$sql = " SELECT * FROM `user` WHERE email = ? ";
$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'s',$email);
				mysqli_stmt_bind_result($query,$id,$name,$email,$gender,$password); 
				mysqli_stmt_execute($query);
				mysqli_stmt_fetch($query);
						if(!empty($name)){
									if(password_verify($pass,$password)){
									return array("id"=>$id,"name"=>$name,"email"=>$email,"gender"=>$gender);
									}
									else{
									return "Incorect_pass";
									}
						}
				}
return "Incorect_pass";

}


//// change password function
function pass_mach($arg){
$conn = DB();
$old_pass = $arg['old_pass'];
$new_pass = $arg['new_pass'];
$id = $_SESSION['user']['id'];
$e = $_SESSION['user']['email'];
$sql = "SELECT  `password` FROM `user` WHERE id = ? AND email = ?";
$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'is',$id,$e);
				mysqli_stmt_bind_result($query,$DB_password); 
				mysqli_stmt_execute($query);
				mysqli_stmt_fetch($query);
							if(!empty($DB_password)){
											if(password_verify($old_pass,$DB_password))	{
											return array("email"=>$e,"id"=>$id,"newpass"=>$new_pass);
												}
												else{
												mysqli_stmt_close($query);
												mysqli_close($conn);
												return "Incorect_Password";
												}	
								
								}
								mysqli_stmt_close($query);
								mysqli_close($conn);
								return "Incorect_Olld_Password";
								
								
						
				}


}


////////////////////change passssssssssss
function pass_chang($arg){
$conn = DB();
$email = $arg['email'];
$pass = password_hash($arg['newpass'],PASSWORD_DEFAULT);

$sql = " UPDATE `user` SET password=? WHERE email = ? ";
		$query = mysqli_prepare($conn,$sql);
		if($query){
				mysqli_stmt_bind_param($query,'ss',$pass,$email);
				$st = mysqli_stmt_execute($query);
						if($st){
						return true;
						}else{
						return "Not_Chnge";
						}

					}
					
}



///// contect data iinsert
function Check_numbe_exist($arg)
{
		$conn 		= DB();
		$id 		= $arg['id'];
		$name 		= $arg['name'];
		$contect 	= $arg['contect'];
		
		$sql = "SELECT * FROM `contec` WHERE mobile = '$contect' AND name = '$name' AND id = '$id' ";
		$n = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($n);
			if($num == 0){
			return array( "id"=>$id,"name"=>$name,"contect"=>$contect );
			}
			else{
			return "contect_exist";
		}


}


/// data inser 
function data_insert($arg)
{
$conn = DB();
$sql = " INSERT INTO `contec`(`id`, `name`, `mobile`) VALUES (?,?,?)";
$q = mysqli_prepare($conn,$sql);
		if($q){
				mysqli_stmt_bind_param($q,'iss',$arg['id'],$arg['name'],$arg['contect']);
				$st = mysqli_stmt_execute($q);
				
					if($st){
					mysqli_stmt_close($q);
					mysqli_close($conn);
					 return true;
					}
					else {
					mysqli_stmt_close($q);
					mysqli_close($conn);
					return "Save_Unsucces";
					}
				
			}
			else
			{
			mysqli_stmt_close($q);
			mysqli_close($conn);
			return "Insert_Error";
			}
}


/// exist artical
function Check_article_exist($arg)
{
		$conn 		= DB();
		$id 		= $arg['id'];
		$title 		= $arg['title'];
		$article 	= $arg['article'];
		
		$sql = "SELECT * FROM article WHERE  title = '$title' ";
		$num = mysqli_query($conn,$sql);
		$num = mysqli_num_rows($num);
			if($num == 0){
			mysqli_close($conn);
			return array( "id"=>$id,"title"=>$title,"article"=>$article );
			}
			else{
			mysqli_close($conn);
			return "Article Exist";
		}

}

///data insert
function Aricle_insert($arg)
{
$conn = DB();
$id = $arg['id'];
$title = $arg['title'];
$article = $arg['article'];

$sql= " INSERT INTO `article`(`user_id`, `title`, `article`) VALUES (?,?,?) " ;
$stmt = mysqli_prepare($conn,$sql);
		if($stmt)
		{
			mysqli_stmt_bind_param($stmt,'iss',$id,$title,$article);
			$st = mysqli_stmt_execute($stmt);
				if($st)
				{
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
					 return true;
				}
				else
				
				{
					mysqli_stmt_close($stmt);
					mysqli_close($conn);
					return "Post Faild";
				}
		}
		else
		{
			mysqli_stmt_close($stmt);
			mysqli_close($conn);
			return "Insert Error";
		}


}


?>