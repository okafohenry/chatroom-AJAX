<?php
//creating a connection to the mysql database, name: chatbox00
$dbconn = mysqli_connect("localhost","root","","chatbox00");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

//retrieving all(*) stored data from 'logs' database using the ID unique key in descending order(DESC)
$result1 = mysqli_query($dbconn, "SELECT * FROM logs ");
//accessing the retrieved results as an array i.e 'username : mesage'
$num_rows = mysqli_num_rows($result1);

echo "$num_rows";

?>