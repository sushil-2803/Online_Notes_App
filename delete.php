<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('logout.php');
}

$username=$_SESSION['username'];
include 'db.php';
$note_id=$_POST['note_id'];
$query_delete="DELETE FROM `note` WHERE `note_id`='$note_id' AND `username`='$username'";
$res_delete=mysqli_query($conn,$query_delete);
if($res_delete)
{
    echo "<script>alert('Note Deleted Successfully')</script>";
    header('refresh:0,home.php');
}
?>