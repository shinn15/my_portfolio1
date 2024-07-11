<?php


$mysqli = require __DIR__ . "/database.php"; 

if(isset($_POST['addbtn'])){

	$usrnam=$_POST['addN'];
	$usrid=$_POST['usrid'];
	$usrsts=$_POST['usrsts'];
	$usritm=$_POST['additm'];
	$itmsr=$_POST['addsrnm'];
	$cm=$_POST['addcm'];

	$dtcrt=date("Y-m-d");

	//check if ther already id
	$chkidquery="SELECT * FROM user_table WHERE id_user='$usrid'";
	$chkresult=mysqli_query($mysqli,$chkidquery);
	$rowchk=mysqli_fetch_assoc($chkresult);
	$chkem=$rowchk['id_user'];
	if($chkem==$usrid){
		$alert="<script>alert('User Id already in record!'); window.location.href='landing_page.php'</script>";
		die($alert);

	}


	$sql="INSERT INTO user_table(user_name,id_user,user_status,item_name,serial_num,date_created,comment) VALUES('$usrnam','$usrid','$usrsts','$usritm','$itmsr','$dtcrt','$cm')";

	$result=mysqli_query($mysqli,$sql);

	if($result){
		die("<script>window.location.href='landing_page.php'</script>");
			
		}

	else{
		echo "<script>alert('erorr found check your query!'); window.location.href='landing_page.php'</script>";

			}




			
	}

?>

