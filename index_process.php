<?php

$mysqli = require __DIR__ . "/database.php";

$usrm=$_POST["email_l"];
$passw=$_POST["pass_l"];


if($_SERVER['REQUEST_METHOD']==="POST"){

	$mysqli = require __DIR__ . "/database.php";

		//verify student number as login
	$sql=sprintf("SELECT * FROM db_login WHERE usr_name = '%s'",
		$mysqli->real_escape_string($usrm);

	$result = $mysqli -> query($sql);
	$row =  mysqli_fetch_array($result);




	if(password_verify($passw, $row['passwordhash'])){
		session_start();
		session_regenerate_id();

		//user id identity
		$_SESSION['usrId']=$row['usr_name'];

		$usr=$_SESSION['usrId'];

		header("Location: landing_page.php");
		exit();
	}
	//if pass is wrong
	elseif(!password_verify($passw, $row['passwordhash'])){
		header("Location: index.php?error_m=pass_inc");
		exit();
	}

	//catch if the account is null
	else if($row['usr_name'] == null){

		header("Location: index.php?error_m=null_account");
		exit();
	}














}













?>