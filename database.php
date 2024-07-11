<?php

/*connect to main database name*/
$host="localhost";
$dbname="project1";//project1
$username="root";//root
$password="";

$mysqli= new mysqli($host,$username,$password,$dbname);


/*check error*/
if ($mysqli -> connect_errno){

	die("connection error: " .$mysqli -> connect_errno);
}

return $mysqli;




?>