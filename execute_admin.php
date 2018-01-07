<?php 
session_start();

		echo "l".$_POST["key"];
?>
<html>
<script type="text/javascript" src="app.js"></script>
<style>
body {
 height: 200px;

    position: fixed;
    top: 50%;
    left: 50%;
    margin-top: -150px;
    margin-left: -200px;
    background-color: orange;
}
</style>
<body>
<h1 >Edit Student Details</h1>
<form action="admin_update.php" method="post">
			<h4 style="height:30px;float:left;margin:5px;margin-right: 17px">Name:</h4><input id="n" style="width:200px; height:30px;margin:5px;" type="text" name="name_edit"><br>
			<h4 style="height:30px;float:left;margin:5px">College:</h4><input id="c" style="width:200px;height:30px;margin:5px;" type="text" name="college_edit"><br>
			<h4 style="height:30px;float:left;margin:5px;margin-right: 15px;">Email:</h4><input id="e" style="width:200px;height:30px;margin:5px;" type="text" name="email_edit" readonly></h4><br>
			<h4 style="height:30px;float:left;margin:5px;margin-right: 25px">Year:</h4><input id="y" style="width:200px;height:30px;margin:5px;" type="text" name="year_edit"><br>
			<h4 style="height:30px;float:left;margin:5px;margin-right:30px">Age:</h4><input id="a" style="width:200px; height:30px;margin:5px;" type="text" name="age_edit"><br>
			<h4 style="height:30px;float:left;margin:5px;margin-right: 10px;">Attend:</h4><input id="at" style="width:200px;height:30px;margin:5px;" type="text" name="attendance_edit" ><br>
			<h4 style="height:30px;float:left;margin:5px;margin-right: 10px">Marks:</h4><input id="m" style="width:200px;height:30px;margin:5px;" type="text" name="marks_edit" ><br>
			<input style="width:300px;height:30px;" type="submit" name="Edit" value="Edit">
		</form>
<?php include 'connection.php';
if($_SESSION["user"]==="admin"){
	if(isset($_POST["edit_button"])){
		$user=search($_POST["key"]);
		$user[6]=$_POST["key"];
		if($user[0]!=-1){
		echo '<script>setdata('.json_encode($user).')</script>';
		}
	}
}
else
header('Location: '.'/helloworld/index.html');
?>
</body>
</html>