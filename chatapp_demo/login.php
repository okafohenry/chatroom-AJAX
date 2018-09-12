<?php
session_start();

$dbconn = mysqli_connect("localhost","root","","chatbox00");
if(!$dbconn){
	die("Connection failed:". mysqli_connect_error($dbconn));
}

if(empty($_POST['username']) || empty($_POST['password'])){
	echo "<center><span style='color:red;'>please, ensure that no field is empty!</span></center>";
	return;
}else{


$username = mysqli_real_escape_string($dbconn, $_POST['username']);
$password = sha1(mysqli_real_escape_string($dbconn, $_POST['password']));



	$result1 = mysqli_query($dbconn,"SELECT * FROM users WHERE username = '$username' AND password = '$password' ");
	if(mysqli_num_rows($result1)){
		$res = mysqli_fetch_array($result1);

		$_SESSION['username'] = $res['username'];

		echo "<center>";
		echo "you have now logged in. click <a href='index.php'>here</a> to go back to chat window ";
		echo "</center>";
	}
	else{
		echo "<center>";
		echo "No user found.please enter correct <a href='index.php'>Login</a> details or <a href='register.php'>Register</a>";
		echo "</center>";
	}

}




?>