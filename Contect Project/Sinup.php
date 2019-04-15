<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>SinUp</title>
<link rel="stylesheet" href="css/bootstrap.min.css">

</head>

<body>
<div style="color:#FF0000; text-align:center; "><?php 
include("function.php");
	if(isset($_GET['E'])){
	echo $_GET['E'];
	}
	?></div>
<div >
<form name="Sinup" onSubmit="return sin_validate()" method="post" action="submit.php">
<table width="661" height="144" border="0" align="center">
  <tr>
    <td width="193"><strong>Name</strong></td>
    <td width="227"><input type="text" onBlur="FName()" class="form-control" name="name" id="name" maxlength="30" placeholder=" Name">
	<samp id="txtname">  </samp>
	</td>
    <td width="227">	
	</td>
  </tr>
  <tr>
    <td><strong>Email</strong></td>
    <td><input type="text" name="txtemail" id="email" class="form-control" onBlur="Email()" maxlength="30" placeholder=" Email">
	<samp id="txtemail">  </samp>
	</td>
    <td>	
	</td>
  </tr>
  <tr>
    <td><strong>Select Gender </strong></td>
    <td><label><input type="radio" name="gender" value="MALE">MALE</label>
	<label><input type="radio" name="gender" value="FEMALE">FEMALE</label><samp id="txtgender">  </samp></td>
    <td>

	
	</td>
  </tr>
  <tr>
    <td><strong>Password</strong></td>
    <td><input type="password" name="txtPassword" class="form-control" onBlur="Password(),machtpwd()" id="password" maxlength="30" placeholder="Create New Password">
	<samp id="txtpassword">  </samp>
	</td>
    <td>      
      
        <input type="button" style="border:none; text-decoration:none; width:40px; font-weight:700; height:22px; font-size:12px;" class="btn-link" value="Show" id="s" onClick="pwdShow()">
          
	  </td>
  </tr>
  <tr>
    <td><strong>Confirm Password</strong></td>
    <td><input type="password" name="txtConfirmPassword" class="form-control" id="ConfirmPassword" onBlur="CPassword(),machtpwd()" maxlength="30" placeholder="Confirm Password">
		<samp id="TxtConfirmPassword">  </samp><br>
	</td>
    <td>

	</td>
  </tr>
  <tr>
    <td></td>
    <td><div align="center">
      <input type="submit" class="btn-sm btn-primary btn" name="submit" value="Submit"> 
            <input type="reset" name="reset" class="btn-danger btn-sm btn" value="Reset">
            
        </div></td>
    <td></td>
  </tr>
</table>

</form>
<a href="Log.php">LogIn</a>
</div>
<script src="script.js"></script>
</body>
</html>
