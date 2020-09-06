<?php
ob_start();
session_start();
if(!isset($_SESSION['username']))
{
    header('location:logout.php');
}
include 'db.php';
$username=$_SESSION['username'];
$query_select_detail= "SELECT * FROM `user_details` WHERE `username`='$username'";
$res=mysqli_query($conn,$query_select_detail);
$row=mysqli_fetch_assoc($res);
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    <title>View Profile</title>

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
  <a class="navbar-brand" href="">View Proflie</a>
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
  <i class="fa fa-user fa-2x" aria-hidden="true"></i>
  Profile Details<br>
  </div>
  <div class="card-body">
   <form method="POST" action="" class="form-group">
       <input type="text" class="form-control" value="<?php echo $row['first_name']; ?>"  disabled><br>
       <input type="text" class="form-control" value="<?php echo $row['last_name']; ?>"  disabled><br> 
       <input type="text" class="form-control" value="<?php echo $row['email_id']; ?>"  disabled><br>
      


  </div>
  <div class="card-footer">
<a href="home.php" class="btn btn-primary">Home</a>
  </div>
</div>
</form>
    </div>
</div>

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
</html>