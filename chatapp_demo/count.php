<?php
//creating a connection to the mysql database, name: chatbox00
$dbconn = mysqli_connect("localhost","root","","chatbox00");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

//retrieving all(*) stored data from 'logs' database ,result stored in a var
$result1 = mysqli_query($dbconn, "SELECT * FROM users ");
//getting the number of rows in the users table
$num_rows = mysqli_num_rows($result1);

echo "$num_rows";

?>