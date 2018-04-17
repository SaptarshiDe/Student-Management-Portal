<?php include '../connection/connection.php';
	if(isset($_POST["signin_button"])){
		if(empty($_POST["name"]) || empty($_POST["email"]) || empty($_POST["password"])){
			echo '<script>alert("Fields empty");
			location="signup.html";</script>';
		}
		else if(!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])){
			echo '<script>alert("Only letters and white spaces allowed in the name field");
				location="signup.html";</script>';
			}
		else if(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
			echo '<script>alert("Not a vlid email address");
				location="signup.html";</script>';
		}
		else if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/",$_POST["password"])){
			echo '<script>alert("Passwords should be of length 8 to 15 and must contain a digit");
				location="signup.html";</script>';
		}
		else if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,15}$/",$_POST["confirm_password"])){
			echo '<script>alert("Passwords should be of length 8 to 15 and must contain a digit");
				location="signup.html";</script>';
		}
		else{
			if($_POST["password"]===$_POST["confirm_password"]){
				$user=array($_POST["email"],$_POST["password"],"user");
				insert($user);
				$user=array($_POST["email"],$_POST["name"]);
				insert_user($user);
				echo '<script type="text/javascript">
				alert("Now kindly login to your account");
				location="../index.html";
				</script>';
			}	
			else{
				echo '<script>alert("Passwords not matching");
				location="signup.html";
				</script>';
			}
		}

	}
			
	
?>