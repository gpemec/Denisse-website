<?php
include_once 'dbConnection.php';
ob_start();

$email = $_POST['email'];
$company = $_POST['company'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password);
$password = addslashes($password);
$password = md5($password);

$q3=mysqli_query($con,"INSERT INTO user VALUES  ('$company','$email', '$password')");
if($q3)
{
    session_start();
    $_SESSION["email"] = $email;
    header("location:account.php?q=1");
}
else {
    header("location:index.php?q7=correo ya registrado!!!");
}
ob_end_flush();
?>