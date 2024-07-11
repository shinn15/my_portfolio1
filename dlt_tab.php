<?php


$mysqli = require __DIR__ . "/database.php"; 


if(isset($_POST['btn_dlt'])){

	$id=$_POST['dltid'];

	$sql="DELETE FROM user_table WHERE id_user='$id'";

	$result=mysqli_query($mysqli,$sql);

	if($result){
		die("<script>window.location.href='landing_page.php'</script>");

		//echo $id;

	}

	else{

		echo "<script>alert('erorr found check your query!'); window.location.href='landing_page.php'</script>";

	}
}











?>