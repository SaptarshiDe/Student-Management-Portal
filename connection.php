<script  src="http://code.jquery.com/jquery-1.9.1.min.js" ></script>    
<?php
function connection(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "user_details";
	// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";

return $conn;
}
?>
<?php
function display(){
	$conn=connection();
	$sql = "SELECT age,college,email,name,year,attendance,marks FROM user_list";
$result = mysqli_query($conn, $sql);
?>
<style>
table,th,td{
    padding: 5px;
    border: 1px solid black;
    border-collapse: collapse;
}
td{
    cursor: pointer;
}
</style> 
    <div id="result"> </div>
<table style="text-align: center;vertical-align: middle;" id="thetable">
<tr>
<th>Name</th>
<th>College</th>
<th>Email</th>
<th>Year</th>
<th>Age</th>
<th>Attendance</th>
<th>Marks</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<?php
if (mysqli_num_rows($result) > 0) {
    // output data of each row

    while($row = mysqli_fetch_assoc($result)) {
            ?>
           <tr>
            <td><?php echo $row['name']; ?></td> 
            <td><?php echo $row['college']; ?></td> 
            <td><?php echo $row['email']; ?></td> 
            <td><?php echo $row['year']; ?></td> 
            <td><?php echo $row['age']; ?></td>
            <td><?php echo $row['attendance']; ?></td>
            <td><?php echo $row['marks']; ?></td><!-- 
            <td><img src="img/edit.png" style="width:20px"></td>
            <td><img src="img/delete.png" style="width: 20px;"></td> -->
            <form id="myForm" action="execute_admin.php" method="post">
            <td><input src="img/edit.png" name="edit_button" type="submit" style="width:20px;"></td>
            <input type="hidden" id="l" name="key"></input>
             </form>
             <script>
$("#myForm").submit(function(){    
        var column_num = parseInt( $(this).index() ) + 1;
        var row_num = parseInt( $(this).parent().index() )+1;
         var email=$('td:eq(2)').text(); 
         document.getElementById("l").value=column_num;
        if(column_num%8===0){
            document.getElementById("l").value=email;
        }
      
});
</script>
             <form id="myForm1" action="delete_admin.php" method="post">
             <td><input src="img/edit.png" name="delete_button" type="submit" style="width:20px;"></td>
             <input type="hidden" id="k" name="key1"></input>
            </form>
        </tr>
        <script>
$("#myForm1").submit(function(){    
        var column_num = parseInt( $(this).index() ) + 1;
        var row_num = parseInt( $(this).parent().index() )+1;
         var email=$('td:eq(2)').text();
        if(column_num===9){
            document.getElementById("k").value=email;
     
        var txt;
var r = confirm("Are you sure you want to delete?");
if (r === true) {
} else {
    return false;
}
   }   
});
</script>
        <?php
    }
    ?>
    </table>
    <?php
} else {
    echo "0 results";
}

mysqli_close($conn);
}
?>
<?php
function verify_user($user){
    $conn=connection();
    $sql = "SELECT email,password,type FROM users";
$result = mysqli_query($conn, $sql);
if($user[2]==="admin" && user[0]==="saptarshide1998@gmail.com" && user[1]==="1234"){
    return 1;
}
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        if($row["email"]===$user[0] && $row["password"]===$user[1] && $row["type"]===$user[2])
          return 1;
    
}
}
return 0;

mysqli_close($conn);
}
?>
<?php
function insert($user){

 $conn=connection();
$sql = "INSERT INTO users (email,password,type)
VALUES ('$user[0]','$user[1]','$user[2]')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();	
}

?>
<?php
function update($user){
$conn=connection();
$sql = "UPDATE users SET email='$user[0]',type='$user[2]' WHERE password='$user[1]'";

if ($conn->query($sql) === TRUE) {
   // echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
<?php
function delete($key){
$conn=connection();
// sql to delete a record
$sql = "DELETE FROM users WHERE email='$key'";

if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
<?php
function insert_user($user){

 $conn=connection();
$sql = "INSERT INTO user_list (email,name)
VALUES ('$user[0]','$user[1]')";

if ($conn->query($sql) === TRUE) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close(); 
}

?>
<?php
function update_user($user){
$conn=connection();
$sql = "UPDATE user_list SET age=$user[0],college='$user[1]',name='$user[3]',year=$user[4] WHERE email='$user[2]'";
if ($conn->query($sql) === TRUE) {
   return 1;
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
<?php
function delete_user($key){
$conn=connection();
// sql to delete a record
$sql = "DELETE FROM user_list WHERE email='$key'";

if ($conn->query($sql) === TRUE) {
    //echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
}
?>
<?php
function search($user){
    $conn=connection();
    $sql="SELECT age,attendance,college,email,marks,name,year FROM user_list WHERE email='$user'";
    $result=mysqli_query($conn,$sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $data=array($row["age"],$row["attendance"],$row["college"],$row["marks"],$row["name"],$row["year"]);
    }
}
else{
    $data[0]=-1;
}
return $data;
mysqli_close($conn);

}
?>

