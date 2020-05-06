<?php
session_start();
if(isset($_SESSION["email"])){
    session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$email = $_POST['email'];
$password = $_POST['password'];

$email = stripslashes($email);
$email = addslashes($email);
$password = stripslashes($password); 
$password = addslashes($password);
$password=md5($password); 
$result = mysqli_query($con,"SELECT email FROM user WHERE email = '$email' and password = '$password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
    while($row = mysqli_fetch_array($result)) {
        $email = $row['email'];
    }
//    $_SESSION["name"] = $name;
    $_SESSION["email"] = $email;
    $q12=mysqli_query($con,"SELECT * FROM quiz WHERE email = '$email'")or die('Error98');
    while($row = mysqli_fetch_array($q12)) {
        $eid = $row['eid'];
    }
    if (mysqli_num_rows($q12) > 0 ) {
      header("location:account.php?q=quiz&step=1&eid=$eid&page=1");  
    }
        

}
else
//echo "$result"; echo "$result";

header("location:$ref?w=Usuario o contraseña erróneos");

?>
