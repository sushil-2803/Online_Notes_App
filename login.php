<?php
$username=$_POST['user_name'];
$password=$_POST['password_log'];
include 'db.php';
$query_login="SELECT * FROM `user_details` WHERE `username`='$username'";
$res_login=mysqli_query($conn,$query_login);
if(mysqli_num_rows($res_login)==1)
{
    $row_data=mysqli_fetch_assoc($res_login);
    $pass_fetch=$row_data['password'];
    if($pass_fetch==$password)
    {
        session_start();
        $_SESSION['username']=$username;
        header("location:home.php");
    }
    else
    {
        echo "<script>alert('Invalid UserId or Password')</script>";
        header("refresh:0,index.html");
    }
}
?>