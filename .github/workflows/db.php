<?php
    $conn = mysqli_connect("localhost", "root", "form", "register") or die(myslq_error());
    
?>
<?php
error_reporting(0);
$servername="localhost";
$username="root";
$password=""; 
$dbname="register";
$check-mysqli_connect($servername, $username, $password, $dbname);

if($check){
// echo
}else{
	//taking value
}	

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$celnum = $_POST['celnum'];
$address = $_POST['address'];


$send="INSERT INTO form VALUES('', '$firstname','$Iastname','$username','$password','$email','$celnum','$address')";
$data=mysqli_query($check, $send);

if($data){
	echo "data send";
}
else{
	echo "data not send";
}
?>

