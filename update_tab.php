<?php

$mysqli = require __DIR__ . "/database.php"; 



if(isset($_POST['btn_edt'])){

	$id=$_POST['usredtid'];

	$username=$_POST['uname'];
	$usrid=$_POST['edtid'];
	$usrsts=$_POST['ustat'];
	$itmnm=$_POST['itname'];
	$srn=$_POST['snum'];
	$cmn=$_POST['Cname'];

	$updtm=date("Y-m-d");


	$sql="UPDATE user_table SET user_name='$username', id_user='$usrid', user_status='$usrsts',item_name='$itmnm',serial_num='$srn',date_updated='$updtm',comment='$cmn' WHERE id_user='$usrid' ";

	$result=mysqli_query($mysqli,$sql);

	if($result){
		echo "<script>alert('Data Edited succesfully!'); window.location.href='landing_page.php'</script>";
		//echo ("$username");
	}
	else{
		echo "<script>alert('erorr found check your query'); window.location.href='landing_page.php'</script>";
	}


}



//echo "hello";



















?>