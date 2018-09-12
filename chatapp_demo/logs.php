<?php
session_start();
$uname = $_SESSION['username'];
//creating a connection to the mysql database, name: chatbox00
$dbconn = mysqli_connect("localhost","root","","chatbox00");
if(!$dbconn){
	die("connection failed: ". mysqli_connect_error($dbconn));
}

//retrieving all(*) stored data from 'logs' database using the ID unique key in descending order(DESC)
$result1 = mysqli_query($dbconn, "SELECT * FROM `logs` ORDER BY `id` ASC ");
//accessing the retrieved results as an array i.e 'username : mesage'
while($extract = mysqli_fetch_array($result1)){
	if($extract['username'] === $uname){
		echo "<div id='msgCont1' style='background:#ff751a;' >
				<p id='message1'>".$extract['msg']. "</p>
				<span id='time00'>". $extract['time'] ."</span>
			 </div>";
	}else{
		echo "<div id='msgCont'>
				<span id='user'>".$extract['username'] ." </span><br>". 
				"<p id='message'>".$extract['msg']. "</p>
				<span id='time01'>". $extract['time'] ."</span>
			 </div>";
	}
}
