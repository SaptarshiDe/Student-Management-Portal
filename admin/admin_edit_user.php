<?php 
session_start();
 include '../connection/connection.php';
if($_SESSION["user"]==="admin"){
	if(isset($_POST["edit_button"])){
		$user=search($_POST["key"]);
		$user[6]=$_POST["key"];
		if($user[0]!=-1){
?>
<html>
	<head>
		<title>Edit User Details</title>
		<link rel="stylesheet" type="text/css" href="../assets/styles.css">
	</head>
	<body id="user_home">
		<h1 id="user_home_h1">Your Details</h1>
		<form action="admin_update.php" method="post">
			<h4 id="user_home_name">Name:</h4><input id="name" type="text" name="name_edit" value="<?php echo $user[4];?>"><br>
			<h4 id="user_home_college">College:</h4><input id="college" type="text" name="college_edit" value="<?php echo $user[2];?>"><br>
			<h4 id="user_home_email">Email:</h4><input id="email"  type="text" name="email_edit" value="<?php echo $user[6];?>" readonly></h4><br>
			<h4 id="user_home_year">Year:</h4><input id="year"  type="text" name="year_edit" value="<?php echo $user[5];?>"><br>
			<h4 id="user_home_age">Age:</h4><input id="age" type="text" name="age_edit" value="<?php echo $user[0];?>"><br>
			<h4 id="user_home_attend">Attend:</h4><input id="attendance"  type="text" name="attendance_edit" value="<?php echo $user[1];?>"><br>
			<h4 id="user_home_marks">Marks:</h4><input id="marks"  type="text" name="marks_edit" value="<?php echo $user[3];?>"><br>
			<input id="user_home_edit_button" type="submit" name="Edit" value="Edit">
			</form>
<?php
		}
	}
}
else
header('Location: '.'/helloworld/index.html');
?>
	</body>
</html>