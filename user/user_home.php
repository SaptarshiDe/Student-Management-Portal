<?php
session_start();
include '../connection/connection.php';
if($_SESSION["user"]==="signedin"){
	$user=search($_SESSION["student"]);
	$user[6]=$_SESSION["student"];
	if($user[0]!=-1){
?>
	<html>
		<head>
			<title>Home Page</title>
			<link rel="stylesheet" type="text/css" href="../assets/styles.css">
			<script type="text/javascript" src="../assets/app.js"></script>
		</head>
		<body id="user_home">
			<h1 id="user_home_h1">Your Details</h1>
			<form action="user_edit.php" method="post">
				<div name="user_home_picture">
					<img src="../img/profile.png" alt="Profile" id="user_home_image"><br>
				 	<input type="file" name="fileToUpload" id="fileToUpload">
				 	<script>
				 		$("#fileToUpload").change(function(e){
				 			var URL =  window.URL;
    						var url = URL.createObjectURL(e.target.files[0]);
    						var img = document.getElementById("user_home_image");
    						img.src = url;
    					});
    				</script>
				</div>
				<div>
					<h4 id="user_home_name">Name:</h4><input id="name" type="text" name="name_edit" value="<?php echo $user[4];?>"><br>
					<h4 id="user_home_college">College:</h4><input id="college" type="text" name="college_edit" value="<?php echo $user[2];?>"><br>
					<h4 id="user_home_email">Email:</h4><input id="email"  type="text" name="email_edit" value="<?php echo $user[6];?>" disabled></h4><br>
					<h4 id="user_home_year">Year:</h4><input id="year"  type="text" name="year_edit" value="<?php echo $user[5];?>"><br>
					<h4 id="user_home_age">Age:</h4><input id="age" type="text" name="age_edit" value="<?php echo $user[0];?>"><br>
					<h4 id="user_home_attend">Attend:</h4><input id="attendance"  type="text" name="attendance_edit" value="<?php echo $user[1];?>" disabled><br>
					<h4 id="user_home_marks">Marks:</h4><input id="marks"  type="text" name="marks_edit" value="<?php echo $user[3];?>" disabled><br>
					<input id="user_home_edit_button" type="submit" name="Edit" value="Edit">
				</div>
			</form>
<?php
	//echo '<script>setdata('.json_encode($user).')</script>';
			}
}
else
header('Location: '.'/helloworld/index.html');
?>
			<form action=../other/signout.php method="post">
				<input id="user_home_signout_button" type="submit" value="Signout" name="signout_button" style="">
			<form>
		</body>
	</html>