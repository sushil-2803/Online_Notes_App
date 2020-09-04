<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Home Page</title>
  </head>
  <body>
  <nav class="navbar navbar sticky-top navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#"> HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active " >
      <button class="btn btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
      </li>
    </ul>
  </div>
</nav>
    <div class="container-fluid" >
    <div class="row " style="margin: 2rem;">
           <a href=""><button class="btn btn-primary "> New Note</button></a>
    </div>
    <div class="row row-cols-1 row-cols-md-3" style="margin: 2rem;">
    <?php
    $numer=5;
    while($numer >0)
    {

    

    ?>
    <!-- Card To display Note  -->
<form method="post" action="">
  <div class="col mb-4 ">
    <div class="card">
      <div class="card-body col-md-12 col-sm-12">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <input type="text" name="" id="" hidden>
        <div class="d-flex justify-content-between">
        <div class="card-link"><button class="btn btn-primary" type="submit" formaction="edit.php"> Edit</button></div>
    <div class="card-link"> <button class="btn btn-danger" type="submit" formaction="delete.php"> Delete</button></div>
    </div>
    </div>
    </div>
  </div>
  <!-- Card To display End -->
</form>
 <?php
 $numer=$numer-1;
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