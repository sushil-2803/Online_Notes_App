<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <title>Home Page</title>
    <style>
    .myheader
    {
      background-color:#3282b8;
    }
    .mynavbar
    {
      background-color:#0f4c75;
    }
    </style>
  </head>
  <body>
    <?php
    session_start();
    if(!isset($_SESSION['username']))
    {
      header('location:logout.php');
    }
    $username=$_SESSION['username'];
    ?>
    <nav class="navbar navbar sticky-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="home.php">Welcome, <?php echo $username ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="changepwd.php"> Change Password <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="profile.php">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active " >
      <a href="logout.php"><button class=" btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<!-- Nav End -->
<!-- Fetching Notes -->
    <div class="container-fluid" >
    <div class="row " style="margin: 2rem;">
           <a href="new.php"><button class="btn btn-primary "> New Note</button></a>
    </div>
    <div class="row row-cols-1 row-cols-md-3" style="margin: 2rem;">
    <?php
    include 'db.php';
    $query_select_note="SELECT * FROM `note` WHERE `username`='$username' ORDER BY `timestamp` DESC";
    $res_select_note=mysqli_query($conn,$query_select_note);
    if(mysqli_num_rows($res_select_note)>0)
    {

    
      while($row=mysqli_fetch_assoc($res_select_note))
    {
    ?>
    <!-- Card To display Note  -->
<form method="post" action="">
  <div class="col mb-4 ">
    <div class="card">
    
        <h5 class="card-title card-header <?php echo ($row['imp']==1)?'bg-danger':'myheader'?> text-white"><?php echo $row['tittle'] ?></h5>
        
      <div class="card-body col-md-12 col-sm-12">
        <p class="card-text"><?php echo substr($row['note_body'],0,100) ?></p>
        <input type="text" name="note_id" id="note_id" value='<?php echo $row["note_id"] ?>' hidden>
        
        <div class="d-flex justify-content-between">
        <div class="card-link"><button class="btn btn-primary" type="submit" formaction="edit.php"> View/Edit</button></div>
    <div class="card-link"> <button class="btn btn-danger " type="submit" formaction="delete.php"><i class="fas fa-trash"></i></button></div>
    </div>
    </div>
    </div>
  </div>
  <!-- Card To display End --</form>
 <?php

    }
  }
  else
  {
    ?>


    <?php
  }
 ?>
</div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>