<?php
//parsing the username and msg as recieved into php variables
session_start();
$uname = $_SESSION['username'];
$msg = $_REQUEST['msg'];

date_default_timezone_set("Africa/Lagos");
$time = date("H:i:s");

//creating a connection to the mysql database, name: chatbox00
$dbconn = mysqli_connect("localhost","root","","chatbox00");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

//sending username and message typed in by the user into the Logs database
$sql = mysqli_query($dbconn, "INSERT INTO `logs` (`username`,`msg`,`time`) 
	VALUES ('$uname','$msg','$time')");
//retrieving all(*) stored data from 'logs' database using the ID unique key in ascending order(ASC)
$result1 = mysqli_query($dbconn, "SELECT * FROM `logs` ORDER BY `id` ASC ");
//accessing the retrieved results as an array i.e 'username : mesage' 
while($extract = mysqli_fetch_array($result1)){
	if($extract['username'] === $uname){
		echo "<div id='msgCont1' style='background:#ff751a;' >
				<p id='message1'>".$extract['msg']. "</p>
				<span id='time00'>". $extract['time'] ."</span>
			 </div><br/>";
	}else{
		echo "<div id='msgCont'>
				<span id='user'>".$extract['username'] ." </span><br>". 
				"<p id='message'>".$extract['msg']. "</p>
				<span id='time01'>". $extract['time'] ."</span>
			 </div>";
	}
	
}


/*

//That above variables are VERY unsafe. Here is how to clean it to protect from hackers looking to exploit -Anixt.
//$uname = strip_tags(stripslashes(mysql_real_escape_string($uname)));
//$msg = strip_tags(stripslashes(mysql_real_escape_string($msg)));
*/




?>