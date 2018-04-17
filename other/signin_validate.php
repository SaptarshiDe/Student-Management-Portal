<?php 
session_start();
include '../connection/connection.php';
if(isset($_POST["submit_button"])){
	if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["type"])){
		echo '<script>alert("Fields should not be empty");
		location = "../index.html";</script>';
	}
	else if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/", $_POST["password"])){
		echo '<script>alert("Passwords should be of length 8 to 15 and must contain a digit");
				location="../index.html";</script>';
	}
	else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
		echo '<script>alert("Not a valid email address");
				location="../index.html";</script>';
	}
	else{
		if( $_POST["type"]==="user"){
			if(verify_user(array($_POST["email"],$_POST["password"],"user"))===1){
				$_SESSION["user"]="signedin";
				$_SESSION["student"]=$_POST["email"];
				header('Location: '.'/helloworld/user/user_home.php');
			}
			else{
				echo '<script type="text/javascript">
				alert("Wrong Username or Password");
				location="../index.html";
				</script>';
			}
		}
		else if($_POST["type"]==="admin"){
			if(verify_user(array($_POST["email"],$_POST["password"],"admin"))===1){
				session_start();
				$_SESSION["user"]="admin";
				header('Location: '.'/helloworld/admin/admin_home.php');
			}
			else{
				echo '<script type="text/javascript">
				alert("Wrong Username or Password");
				location="../index.html";
				</script>';
			}
		}
		else{
			echo '<script type="text/javascript">
			alert("Choose User or Faculty");
			location="../index.html";
			</script>';
				
		}
	}
}
?>
		