<?php 
session_start();
?>
<?php
include 'connection.php';

	if(isset($_POST["submit_button"])){
		if( $_POST["type"]==="user"){
			if(verify_user(array($_POST["email"],$_POST["password"],"user"))===1){
				
				$_SESSION["user"]="signedin";
				$_SESSION["student"]=$_POST["email"];
				header('Location: '.'/helloworld/main.php');
			}
			else{
				echo '<script type="text/javascript">
				alert("Wrong Username or Password");
				location="index.html";
				</script>';
			}
		}
		else if($_POST["type"]==="admin"){
			if(verify_user(array($_POST["email"],$_POST["password"],"admin"))===1){
				session_start();
				$_SESSION["user"]="admin";
				header('Location: '.'/helloworld/admin.php');
			}
			else
				echo '<script type="text/javascript">
				alert("Wrong Username or Password");
				location="index.html";
				</script>';
		}
			
	}
?>
		