<?php
include 'db.php';
 $firstname= $_POST['Firstname'];
 $lastname= $_POST['Lastname'];
 $userid= $_POST['Username'];
 $emailid= $_POST['Email'];
 $password= $_POST['pass'];
 $hpassword=md5($password);

$query="INSERT INTO `user_details`(`first_name`, `last_name`, `email_id`, `username`, `password`) VALUES ('$firstname','$lastname','$emailid','$userid','$hpassword')";
$res=mysqli_query($conn,$query);
if($res)
{
   ?>
   <script>
       alert("SUCCESS");
      // window.location.href = "index.html";
       </script>
   <?php
}
else
{
    ?>
    <!-- <script>window.location.href = "index.html";</script> -->
    <?php
}
?>
