
<?php
$mysqli = require __DIR__ . "/database.php";

/*login
if(isset($_POST['submit_L'])){
	//die("Log In Sucessful!");
	session_start();

	//protect 
	session_regenerate_id();

	//tranfer to next page
	header("Location: landing_page.php");
	exit;



}
*/
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
 
</head>

<body>


<div class="container">

	<h1>Login</h1>
	<form action="index_process.php" method="post">
		    <label for="text">User Id:</label>
            <input type="text"  id="email_l" name="email_l" 
            required>
            <label for="password">Password:</label>
            <input type="password" id="pass_l" name="pass_l"
            required>

            <input type="submit" id="submit_L" name="submit_L"value="Login">
	</form>
	 <!--redirerect to register-->
        <div class="register-link">
            <br>
            <p>Don't have an account?</p>
            <a href="register.php">Register now</a>
        </div>
	
</div>

	<?php

		if(!isset($_GET['error_m'])){
            exit();
        }
        else{
        	$check_error=$_GET['error_m'];

        	if($check_error=="null_account"){
        		echo("<div class='popuperr'>Account Not Found!<br>
                <a href='index.php'><button>Ok</button></a></div>");
                exit();

        	}
        	elseif($check_error=="pass_inc"){
        		echo("<div class='popuperr'>Account password is wrong!<br>
                <a href='index.php'><button>Ok</button></a></div>");
                exit();

        	}
        	elseif($check_error=="welcome"){
                exit();

        	}

        }






	?>

</body>
</html>