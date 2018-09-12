<?php 
	session_start();
	if(!isset($_SESSION['username'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			margin:0;
		}
		.body-ptn{
			height:300px;  font-family:'Montserrat'; background:#e6e6e6; 
		}
		.login-form{
			width:19.9%;
			position:relative; 
			top:150px;  

			box-shadow:0px 7px 10px #a6a6a6; 

			padding-top:35px; padding-bottom:35px; 
			background: #fff;
		}
		.fa-user-circle-o{
			font-size:50px; 
			color:#337ab7; 
			margin-top: 5px; 
			margin-bottom: 5px;
		}
		.login-txt{
			color:#777; 
			font-size: 15px;
		}
		.login-uname{
			width:70%; 
			padding: 5px; 
			margin-top: 15px;
			border-top:none;
			border-right:none;
			border-left:none;
		}
		.login-psd{
			width:70%; 
			padding: 5px; 
			margin-top:15px;
			border-top:none;
			border-right:none;
			border-left:none;
		}
		.login-submit{
			width:77%; 
			padding:5.5px 7.5px;  
			margin-top: 23px; 
			background:#337ab7; 
			border:none; 
			color:#fff;
		}
		.login-uname::placeholder,.login-psd::placeholder{
			font-family:'Montserrat';
			font-size: 12px;
		}

	</style>
</head>
<body>
	<div class="body-ptn">
	<center>	
		<div class="login-form"  >
			<form name="form2" action="login.php" method="POST">
				<span class="fa fa-user-circle-o"></span><br>
				<span class="login-txt" >Login</span><br>		
				<input type="text" name="username" placeholder="Username..." class="login-uname" >
				<br>
				<input type="password" name="password" placeholder="Password..." class="login-psd">
				<br>
				<input type="submit" name="submit" class="login-submit" >
				<br><br>
					<a href="register.php" style="color:#337ab7; text-decoration:none;  font-size:13px;  ">Register here to get an account</a>
			</form>
		</div>
	</center>

</div>	
</body>
</html>


<?php
	exit();
	}

 ?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>chat room</title>
	<!--JS CDN's-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<!--bootstrap-->
	<script src="dist/js/bootstrap.min.js"></script>
	<!--external js-->
	<script type="text/javascript" src="chatAjax.js"></script>
	<!---->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="samplechat.css">	
	
</head>
<body onload="loadCount()" class="main-page-content">
	<div>
		<!--Navigation & logo-->
		<div>
			<nav class="navbar navbar-fixed ">
				<div class="container">
					<div class="navbar-header">
						<div class="navbar-brand">
							<a  id="navbar-brand-title" href="#">聊天室 </a><br>
							<center><span id="navbar-brand-sub-title">chat room</span></center>
						</div>
						<button  type="button" class="navbar-toggle collapsed" data-toggle="collapse"        data-target="#navbar-collapse-link" aria-expanded="false">
							<span class="sr-only">toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
					<div class="collapse navbar-collapse" id="navbar-collapse-link">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php"><span class="fa fa-power-off"></span> Logout </a></li>
							<li>
								<a href="#" 
								id="popover1" 
								data-toggle="popover" 
								data-placement="bottom" 
								data-trigger="focus" data-content="The Chat room Application, v1.0, is a test project designed for learning purpose. It is a real-time chat that supports group-ish chat only.">About</a>
							</li>
							
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<!--Main content-->
		<div class="container">
			<div class="grid-container">
				<!--dashboard-->
				<div class="grid-item1">
					<center><span id="db-text"><h5>ACTIVITY</h5></span></center><br>
					<div class="box1">
						<center>
							<span class="fa fa-users" id="fa-users"></span><br>
							<h5>Registered Users</h5> <br>
							<span id="reg-u-count"></span>
						</center>
					</div><br><br>
					<div class="box2">
						<center>
							<span class="fa fa-envelope" id="fa-env"></span><br>
							<h5>Messages</h5> <br>
							<span id="msgs-count"></span>
						</center>
					</div><br><br>
					<div class="blinker" id="blinker">
						<a href="#" id="popover2" data-toggle ="popover" title="Todays Date"  data-placement="right" data-trigger="click" data-style="primary">
							<center>
								<span class="fa fa-calendar"></span>
							</center>
						</a>
					</div>
				</div>
				<!--chat main-->
				<div class="grid-item2">
					<center>
						<div class="user"><h5><?php echo $_SESSION['username'] ?></h5></div>
					</center>
					<hr>
					<center>
						<div class="msg-display" id="chatlogs" >
							<span id="loading-txt">loading chatlogs, please wait...<img src="spinner.gif" id="image-gif" height="40px" width="40px" /></span>
						</div>
						<form name="form1">
							<textarea placeholder="Type a message..." name="msg" rows="1" id="txtInput"></textarea>
							<a href="#" class="btn btn-default" id="btn1"><span class="fa fa-smile-o"></span></a>
							<a href="#" class="btn btn-default" id="btn2"><span class="fa fa-paperclip"></span></a>
							<!--after trying out the input tag button method, the button tag and the anchor tag, the achor tag was the most effective for calling the 'submit chat(AJAX)' funxtion -->
							<a href="#" class="btn btn-default" id="btn3" onclick="submitchat()"><span class="fa fa-paper-plane-o"></span></a>
						</form>
					</center>
				</div>
			</div>			
		</div>
		
		<footer>
			<div class="footer"><span class="footer-txt">&copy;2018 | 聊天室 chat room</span>
			<div class="social-links">
				<a href="https://www.facebook.com/okafor.henry.501" target="_blank"><span class="fa fa-facebook-square fb"></span></a>
				<a href="https://twitter.com/okafohenrie" target="_blank"><span class="fa fa-twitter-square twt"></span></a> 
				<a href="#"><span class="fa fa-linkedin-square lnkd" target="_blank"></span></a>
				<a href="https://github.com/okafohenry/" target="_blank"><span class="fa fa-git-square gthb" ></span></a>
			</div>
			</div>
		</footer>		
	</div>

	



	
<script>
	$(document).ready(function(){

	/*
	(function blink(){
		$("#blinker").fadeOut(750).fadeIn(750, blink);
	})(); 


	$('#blinker').on('click', function(){
		$('#blinker').finish();
	});
	*/

	//always keep msg display scrollbar at the bottom
	$("msg-display").animate({ scrollTop: $(this).height()}, "slow");
   // Contain the popover within the body NOT the element it was called in.
	$('#popover1').popover({
	    container: 'body'
	});

	$("#popover2").popover({
		html : true,
		content : '<div id="myDate"></div>'
	}).on('shown.bs.popover', function(){
		
		$("#myDate").datepicker({
			inline:true,
			firstDay:1,
			showOtherMonths:true,
			dayNamesMin: ['Sun','Mon','Tue','Wed','Thur','Fri','Sat']
		});
		

	}); 

});
</script>

</body>
</html>