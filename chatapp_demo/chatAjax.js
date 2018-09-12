		
		function loadCount(){

			loadRequest('count.php', activity1());
			loadRequest('msgCount.php',activity2());

			function loadRequest(url, requestResponse){
				var xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
						requestResponse();
					}
				}
				xmlhttp.open("GET",url,true);
				xmlhttp.send();

			}

			function activity1(){
				document.getElementById("reg-u-count").innerHTML = xmlhttp.responseText;
			}
			function activity2(){
				document.getElementById("msgs-count").innerHTML = xmlhttp.responseText;
			}
		}



		function submitchat(){ 	//called when the submit button is hit

			if( form1.msg.value === ""){
				alert("Enter a message!!");
				return;
			}	

				$('image-gif').show();
				var msg = form1.msg.value;

				var xmlhttp = new XMLHttpRequest();

				xmlhttp.onreadystatechange = function(){
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						document.getElementById("chatlogs").innerHTML = xmlhttp.responseText;
						$('image-gif').hide();

					}
					
				}
			//shows msg  in url box as it is sent over to the insert page for further processing
				xmlhttp.open("GET","insert.php?&msg=" + msg,true);
				xmlhttp.send();

		}

		
				
		

		$(document).ready(function(e){	//jquery

			//disables the cache of a browser so it does not load old data
			$.ajaxSetup({cache:false}); 
				//loads logs.php into the div with chatlog id after 3000 milliseconds (2 seconds)
						setInterval(function(){
							$("#chatlogs").load('logs.php');
						}, 3000);
				//loads count.php into the div with reg-u-count id after 3000 milliseconds (3 seconds)
						setInterval(function(){
							$("#reg-u-count").load('count.php');
						}, 3000);
				//loads count.php into the div with reg-u-count id after 3000 milliseconds (3 seconds)
						setInterval(function(){
							$("#msgs-count").load('msgCount.php');
						}, 3000);
		});