<?php
if (isset($_POST['submit'])) {

		$dbconn = mysqli_connect("localhost","root","","chatbox00");
	if(!$dbconn){
		die("Connection failed:". mysqli_connect_error($dbconn));
	}

	if(empty($_POST['username']) || empty($_POST['password']) || empty( $_POST['password2'])){
		echo "<center><span style='color:red;'>Please, ensure that no field is empty!</span></center>";
		return;
	}else{
		$username = mysqli_real_escape_string($dbconn, $_POST['username']);
		$password = sha1(mysqli_real_escape_string($dbconn, $_POST['password'])) ;
		$password2 = sha1(mysqli_real_escape_string($dbconn, $_POST['password2']));
	}


	//checks if both passwords correspond
	if ($password == $password2) {
		//if passwords match, check if username exists
		$checkexist = mysqli_query($dbconn,"SELECT * FROM users WHERE username ='$username' ");
		if(mysqli_num_rows($checkexist)){
			echo "<center>";
			echo "<div style='position:relative; color:red; margin-bottom:-55px;'>username is taken, select a unique username!</div> <br>";
			echo "</center>";
		}else{ //if passwords match and username dont exist, add user to database
			$result1 = mysqli_query($dbconn,"INSERT INTO users(`username`,`password`) VALUES ('$username','$password') ");
			if ($result1) {
				echo "<center>";
				echo "<div style='position:absolute; margin-bottom:-55px;'><span  style='color:Green;' >User added successfully!. click</span><a href='index.php'> here </a><div> <span style='color:Green;'>to login</span></div> <br>";
				echo "</center>";
			}
		}
	}else{
		echo "<center>";
		echo "<div style='position:relative; color:red; margin-bottom:-55px;'>passwords do not match, retry! </div> <br>";
		echo "</center>";
	}


}




 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			margin:0;
		}
		.body-ptn{
			height:290px;
			font-family:'Montserrat';
			background:#e6e6e6; 
		}
		/*.overlay-div{
			position: fixed;
			top: 0;
			left:0;
			right:0;
			bottom: 0;

			height:100%;
			width:100%;
			background:rgb(255, 255, 255,0.3);
			opacity:0.3;
		}*/
		.reg-form{
			width:20.9%;
			position:relative; top:150px; 
			padding-top:35px; padding-bottom:35px;  

			box-shadow:0px 7px 10px #a6a6a6;
			background: #fff;
		}
		.fa-user-circle-o{
			font-size:50px; color:#ff6600; margin-top: 5px; margin-bottom: 5px;
		}
		.reg-txt{
			color:#777; font-size: 15px;
		}
		.reg-uname{
			width:70%; 
			padding: 5px; 
			margin-top: 15px; 
			border-left: none; border-top: none; border-right: none;
		}
		.reg-psd{
			width:70%; 
			padding: 5px; 
			margin-top:15px; 
			border-left: none; border-top: none; border-right: none;
		}
		.reg-conf-psd{
			width:70%; 
			padding: 5px; 
			margin-top:15px; 
			border-left: none; border-top: none; border-right: none;
		}
		.reg-submit{
			width:77%; 
			padding:5.5px 7.5px;  
			margin-top: 23px; 
			background:#ff6600; 
			border:none; 
			color:#fff;
		}

		.reg-uname::placeholder,.reg-psd::placeholder,.reg-conf-psd::placeholder{
			font-family:'Montserrat';
			font-size: 12px;
		}
	</style>
</head>
<body>
	<div  class="body-ptn" >
		<!--<div class="overlay-div">-->
		<center>	
			<div class="reg-form"  >
				<form name="form3" action="register.php" method="POST">
					<span class="fa fa-user-circle-o" style=""></span><br>
					<span class="reg-txt" >Register</span><br>

					<input type="text" name="username" placeholder="Username..."  class="reg-uname" >
					<br>
					<input type="password" name="password" placeholder="Password..." class="reg-psd" >
					<br>
					<input type="password" name="password2" placeholder="Confirm Password..." class="reg-conf-psd" >
					<br>
					<input type="submit" name="submit" value="Register" class="reg-submit">
					<br><br>
							
					<span style="color:#777; font-size: 13px;">Already have an account?</span> <a href="index.php" style="color:#ff6600; text-decoration:none; font-size: 13px;">login</a>
							
				</form>	
			</div>
		</center>
		<!--</div>-->
	</div>
</body>
</html>
