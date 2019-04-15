<?php 
function validate($arg){
foreach( $arg as  $input ){
	if ($input=="" && $input==null){
		
		return "missing_input";
		}
		if($_POST['gender']==""){
		return "missing_input";
		}
		
}
return true;
/*
$name = $_POST['txtname'];
$email = $_POST['txtemail'];
$gender = $_POST['gender'];
$password = $_POST['txtPassword'];
$con_password= $_POST['txtConfirmPassword'];
*/
}

function Dislpay_Error($index_name){
 $Error =  array(
"missing_input"  		=> "Enter All Fileds",
"Enter_password"		=>	"Enter Your PAssword",
"Enter_Email"			=>	"Enter Your Email",
"InCorrect_Email"		=>	"Enter Correct Email Address",
"Incorect_pass"			=>	"Wrogn Email Or Password",

///change pass 
"blank_oll_pass"		=>	"Enter Old PAssword",
"blank_new_pass"		=>	"Enter New Passorw",
"blank_confirm_pass"	=>	"Confirm Password ",
"Not_Mach"				=>	"Not Mach Your New Password And Confirm Passwod ",
"Incorect_Password"		=>	"Incorect Old Password Please Enter Correct Password",
"Not_Chnge"				=>	"password not change Try Again" ,

/// contect error
"Eid"					=>	"Enter Id " ,
"Ename"					=>	"Enter Name",
"Econtect"				=>	"Enter Contect",
"Incoter_ID"			=>	"Incorect ID",
"contect_exist"			=>	"Contect Exist",
"Insert_Error"			=>	"Insert Error",
"Save_Unsucces"			=>	"Save UnSucces",
"Data_save"				=>	"Contect Save Succes Full",

/// articla 
"Incorect_id"			=>	"Incorect ID"
);
 echo "<div class='error'> ". $Error[$index_name] ." </div> ";
}

function Dislpay_Succes($index_name){
 $Succes =  array(
 "Password_Change" => "Password Change Succes",
 "Data_save"		=> 	"Save Contect Succes"
 );
 echo "<div class='Succes'> ". $Succes[$index_name] ." </div> ";
 }
///Filter data ///

function data_filter($arg){

$name = filter_var($arg['name'],FILTER_SANITIZE_STRING);
$gender = filter_var($arg['gender'],FILTER_SANITIZE_STRING);
$password = password_hash($arg['txtPassword'],PASSWORD_DEFAULT);
$email = filter_var($arg['txtemail'],FILTER_VALIDATE_EMAIL);
	if(!$email){
		return "Enter Correct Email";
		}
		$len = strlen($name);
		if($len > 30){
		return "Enter Name Lessthen 30";
		}
		if(strlen($email) > 30){
		return " Enter Email Lessthen 30 ";
		}
return array( "name"=>$name, "email"=>$email, "gender"=>$gender, "password"=>$password);
}


///password maich funtion
function mach_pass($arg){
$password = $arg['txtPassword'];
$con_password= $arg['txtConfirmPassword'];
if ( $password != $con_password){
return "Not_mach_password";
	}
	return true;
}

/////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////

function login($arg){
			if (empty($arg['email'])){
			return "Enter_Email";
			}
			if (empty($arg['password'])){
			return "Enter_password";
			}
			return true;
}


function validate_data($arg){
$email = filter_var($arg['email'],FILTER_SANITIZE_EMAIL);
$email = filter_var($arg['email'],FILTER_VALIDATE_EMAIL);
$pas = $arg['password'];
	if (!$email){
		return "InCorrect_Email";
	}


return array("Email"=>$email,"Password"=>$pas);
}


function check_filde($arg){

		if (empty($arg['ol_pass'])){
		return "blank_oll_pass";
		}
		elseif (empty($arg['new_pass'])){
		return "blank_new_pass";
		}
		elseif (empty($arg['confirm_pass'])){
		return "blank_confirm_pass";
		}
		elseif ( $arg['new_pass'] != $arg['confirm_pass']){
		return "Not_Mach";
		}

return array("old_pass"=>$arg['ol_pass'],"new_pass"=>$arg['new_pass']);

}

////////////// contect validat

function Check_Empty($data){
			if (empty($data['id'])){
			return"Eid";
				}
				
			if (empty($data['name'])){
		return"Ename";
			}
			
			if (empty($data['contect'])){
		return"Econtect";
			}
			return true;
	
	}


function filter_data($arg){
	$id  = filter_var($arg['id'],FILTER_SANITIZE_NUMBER_INT);
	$name = filter_var($arg['name'],FILTER_SANITIZE_STRING);
	$contect = filter_var($arg['contect'],FILTER_SANITIZE_STRING);
	
	$id  = filter_var($arg['id'],FILTER_VALIDATE_INT);
	if (!$id){
	return "Incoter_ID" ;
	}
	
	 return array( "id"=>$id,"name"=>$name,"contect"=>$contect );
}



//////// articl validats 
function data_empyt($arg)
{
	if(empty($arg['atical_title']))
	{
	return " Enter Articl Title ";
	//exit;
	}
	else if(empty($arg['article']))
	{
	return " Enter Articl ";
	//exit;
	}
return true;

}



function data_validate($arg)
{
$id = filter_var($arg['id'],FILTER_SANITIZE_NUMBER_INT); 

$title = filter_var($arg['atical_title'],FILTER_SANITIZE_STRING);
$article = htmlspecialchars($arg['article']);						//filter_var($arg['article'],FILTER_SANITIZE_STRING); 
$id = filter_var($arg['id'],FILTER_VALIDATE_INT); 
	if(!$id)
	{
	return "Incorect id" ;
	}
	return array( "id"=>$id,"title"=>$title,"article"=>$article);
}











?>