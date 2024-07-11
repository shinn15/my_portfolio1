<?php


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register page</title>
    <link rel="stylesheet" type="text/css" href="css/style1.css">
 
</head>
<body>


<div class="container">

	<h1>Register</h1>
	<form action="reg_process.php" method="post">
        <?php

            if(isset($_GET['usrm'])){
                $usrm=$_GET['usrm'];
                echo '<label for="text">User Id:</label>
                <input type="text"  id="email_l" name="email_l" value="'.$usrm.'">';
            }
            else{
                echo '<label for="text">User Id:</label>
            <input type="text"  id="email_l" name="email_l">';
        }

        ?>
            <label for="password">password:</label>
            <input type="password"  id="pass_l" name="pass_l">

            <label for="password">Confirm password:</label>
            <input type="password" id="pass_c" name="pass_c"
            >

            <input type="submit" id="submit_c" name="submit_c"value="Login">

	</form>

	

	 <!--redirerect to register-->
        <div class="register-link">
            <br>
            <p>Already have an account?</p>
            <a href="index.php">Login now</a>
        </div>

</div>


        <!--error popup-->
    <?php
        if(!isset($_GET['error_m'])){
            exit();
        }
        else{
            //popupmsg
            $check_error=$_GET['error_m'];
            $usrm=$_GET['usrm'];
         

            if($check_error=="char"){
                echo("<div class='popuperr'>username must be 5 character more!<br>
                <a href='register.php?usrm=$usrm'><button>Ok</button></a></div>");
                exit();

            }
            elseif($check_error=="eight"){
                echo("<div class='popuperr'>password must be 8 character more!<br>
                <a href='register.php?usrm=$usrm'><button>Ok</button></a></div>");
                exit();

            }
            elseif($check_error=="symbol"){
                echo("<div class='popuperr'>password must contain letter<br>
                <a href='register.php?usrm=$usrm'><button>Ok</button></a></div>");
                exit();

            }
            elseif($check_error=="number"){
                echo("<div class='popuperr'>password must contain number<br>
                <a href='register.php?usrm=$usrm'><button>Ok</button></a></div>");
                exit();

            }
            elseif($check_error=="notsame"){
                 echo("<div class='popuperr'>password must match<br>
                <a href='register.php?usrm=$usrm'><button>Ok</button></a></div>");
                exit();

            }
            elseif($check_error=="success"){
                echo("<div class='popuperr'>Account Created Succesfully<br>
                <a href='register.php'><button>Ok</button></a></div>");
                exit();

            }
        }

    ?>


</body>
</html>