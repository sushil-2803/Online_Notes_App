<?php
include 'db.php';
 $firstname= $_POST['Firstname'];
 $lastname= $_POST['Lastname'];
 $userid= $_POST['Username'];
 $emailid= $_POST['Email'];
 $password= $_POST['pass'];

$query="INSERT INTO `users`(`First_Name`, `Last_Name`, `Email`, `Username`, `Password`) VALUES ('$firstname','$lastname','$emailid','$userid','$password')";
$res=mysqli_query($conn,$query);
if($res)
{
    echo "<script type='text/javascript'>window.alert('Regestration Successfull')<script>";
}
else
{
    echo "FAIL";
    echo $firstname,$password,$emailid,$lastname;
    echo $password;
    echo "\n User id is:".$userid;
}
?>
