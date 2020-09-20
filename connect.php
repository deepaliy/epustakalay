<?php
session_start();
header('location:index.html');
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$password = $_POST['password'];

//database connection
$conn=new mysqli('localhost','root','','epustakalay');
if($conn->connect_error){
	die('Connection Failed:'.$conn->connect_error);
}else{
    
	$stmt = $conn->prepare("insert into registration(firstName,lastName,email,password) values(?,?,?,?)");
	$stmt->bind_param("ssss",$firstName,$lastName,$email,$password);
	$stmt->execute();
	echo"registration successful";
	$stmt->close();
	$conn->close();
}
?>