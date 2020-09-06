<?php
ob_start();
session_start();
if(!isset($_SESSION['username']))
{
    header('location:logout.php');
}
$username=$_SESSION['username'];
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <title>Change Password</title>

    <style>
    .myshadow
    {
      -webkit-box-shadow: 0px 0px 51px -16px rgba(171,171,171,1);
-moz-box-shadow: 0px 0px 51px -16px rgba(171,171,171,1);
box-shadow: 0px 0px 51px -16px rgba(171,171,171,1);
    }
    </style>
</head>

<body>
<!-- Nav Start -->
<nav class="navbar navbar sticky-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="home.php">Change Password</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active " >
      <a href="home.php"><button class="btn btn-info my-2 my-sm-0" type="submit" >Home</button></a>
      </li>
    </ul>
  </div>
</nav>
<!-- Nav End -->
<div class="row justify-content-center " style="margin:8rem 2rem">
    <div class="col-lg-5 align-middle">
    <div class="card myshadow text-center">
  <div class="card-header">
  Change Password
  </div>
  <div class="card-body">
   <form method="POST" action="" class="form-group">
       <input type="text" name="old_pass" id="old_pass" class="form-control" placeholder="Old Password" required><br>
       <input type="text" name="new_pass" id="Password" class="form-control" placeholder="New Password" required><br>
       <div class="alert alert-danger" role="alert" id="msg1" hidden>
        Minimum Length 8 Characters
        </div>
       <input type="password" name="confrim_pass" id="Repassword"  class="form-control" placeholder="Confrim Password" required><br>
       <div class="alert alert-danger" role="alert"  id="msg2" hidden>
        Password Mismatch
        </div>


  </div>
  <div class="card-footer">
  <button type="submit" value="Change" id="Change" name="submit" class=" btn btn-primary" disabled>Update</button>
  </div>
</div>
</form>
    </div>
</div>


<script>
    // First Password Check
    $("#Password").on('keyup keypress keydown', function(){
              var name= $("#Password").val();
              if(name.length < 8)
              {
                $("#msg1").prop("hidden",false);
                $( "#Change" ).prop( "disabled", true );
                $("#msg1").show();
                $("#Password").css("Border-color","RED");
              }
              else
              {
                $("#msg1").hide();
              }
            });
// Second Password Check

            $("#Repassword,#Password").on('keyup keypress keydown', function(){
              var password=$("#Password").val();
              var repassword=$("#Repassword").val();
              var name= $("#Password").val();
              if(password != repassword || name.length < 8 )
              {
                $("#msg2").prop("hidden",false);
                $( "#Change" ).prop( "disabled", true );
                $("#msg2").show()
              }
              else
              {
                $("#msg2").hide();
                $( "#Change" ).prop( "disabled", false );
              }
            });
</script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>

</body>
<?php
if(@isset($_POST['submit']))
{
    include 'db.php';
    $old=$_POST['old_pass'];
    $new=$_POST['new_pass'];
    $confrim=$_POST['confrim_pass'];
    if($confrim==$new)
    {
        $query_select="SELECT * FROM `user_details` WHERE `username`='$username'";
        $res=mysqli_query($conn,$query_select);
        $row=mysqli_fetch_array($res);
        if($row['password']==$old)
        {
            $query_update="UPDATE `user_details` SET `password`='$new' WHERE `username`='$username'";
            $res_update=mysqli_query($conn,$query_update);
            if($res_update)
            {
                echo "<script>alert('Password Update')</script>";
                header("refresh:0,home.php");
            }
        }
        else
        {
            echo "<script>alert('Wrong Password')</script>";
        }
    }
    else
    {
        echo "<script>alert('Password Mismatch')</script>";
    }
}
?>
</html>