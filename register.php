<?php
session_start();
include 'db.php';
$firstname= $_POST['Firstname'];
$lastname= $_POST['Lastname'];
$userid= $_POST['Email'];
$emailid= $_POST['Userid'];
$password= $_POST['pass'];
$_SESSION["firsntname"]=$firstname;
$_SESSION["lastname"]=$lastname;
$_SESSION["password"]=$password;
echo $firstname,$lastname,$userid,$emailid,$password;
$query="INSERT INTO `users`(`First_Name`, `Last_Name`, `Email`, `Username`, `Password`) VALUES ('$firstname','$lastname','$emailid','$userid','$password')";
$res=mysqli_query($conn,$query);
if($res)
{
    echo "SUCCESS";
}
else
{
    echo "FAIL";
}
echo print_r($_SESSION);
?>
