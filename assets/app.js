//For filling data in the home page of an user(user_home.php)
function setdata(data){
	var a=document.getElementById("age");
	var at=document.getElementById("attendance");
	var c=document.getElementById("college");
	var e=document.getElementById("email");
	var m=document.getElementById("marks");
	var n=document.getElementById("name");
	var t=document.getElementById("year");
	a.value=data[0];
	at.value=data[1];
	c.value=data[2];
	e.value=data[6];
	m.value=data[3];
	n.value=data[4];
	t.value=data[5];
}