<?php
$mysqli = require __DIR__ . "/database.php";

$usrm=$_POST['email_l'];


//username
if (strlen($usrm) < 5 ){
   //display the error and redirect
	
	header("Location: register.php?error_m=char&usrm=$usrm");
	exit();
}
//password
elseif(strlen($passw) < 7){
	header("Location: register.php?error_m=eight&usrm=$usrm");
  	exit();

}

elseif(!preg_match("/[a-z]/i", $passw)){
	header("Location: register.php?error_m=symbol&usrm=$usrm");
  	exit();

}

elseif (!preg_match("/[0-9]/", $passw)) {
	header("Location: register.php?error_m=number&usrm=$usrm");
  	exit();
}

elseif ($passw !== $_POST['pass_c']) {
	header("Location: register.php?error_m=notsame&usrm=$usrm");
  	exit();
}
else{

	$usrname=$_POST['email_l'];

	$passhash=password_hash($_POST['pass_l'], PASSWORD_DEFAULT);

	$sql= "INSERT INTO db_login(usr_name,passwordhash) VALUES('$usrname','$passhash')";

	$result=mysqli_query($mysqli,$sql);

	if($result){
		header("Location: register.php?error_m=success");
  		exit();
	}else{
      die($mysqli -> error . " " . $mysqli -> errno);
   	}  

}



?>