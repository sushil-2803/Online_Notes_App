<?php
include 'db.php';
$username=$_POST['username'];
$query="SELECT * FROM `user_details` WHERE username ='$username'";
$res=mysqli_query($conn,$query);
if(@mysqli_num_rows($res) >0)
{
    echo "User Name Already Exsits";
}
else
{
    echo "User Name Valid";
}
?>