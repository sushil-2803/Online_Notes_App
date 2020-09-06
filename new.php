<?php
ob_start();
?>
<!doctype html>
<html lang="en">

<?php
session_start();
$username=$_SESSION['username'];
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <title>New Note</title>
</head>

<body>
<nav class="navbar navbar sticky-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="home.php">Make A New Note</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"> HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Profile <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active " >
      <a href="logout.php"><button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>

    <div class="container-fluid mx-auto" style="margin-top:10rem"> 
        <div class="row align-items-center">
            <!-- <div class="offset-lg-1 offset-md-1 col-6"> -->
            <div class="col-md-6 offset-lg-1">
            <form method="POST" action="">
                <div class="form-group">
                    <input type="text" maxlength="90" class="form-control" id="note_tittle" name="note_tittle" placeholder="Tittle of the note" required>
                </div>
                <div class="form-group">
                   <textarea maxlength="5000" class="form-control " rows="5"  id ="note_body" name= "note_body" placeholder="Description"required></textarea>
                </div>
                <input type="checkbox" name="imp" value=1> Mark as Important
                <p id="word_count"><small>0/5000</small></p>
                <input type="submit" class="btn btn-primary" name="submit">
            </form>
            </div>
            <div class="col-md-4">
            <!-- <div class="col-md-2 col-lg-2 col-xl-2 col-2 justify-content-end"> -->
          <!-- <div class="row align-items-center "> -->
            <img src="assets/newnote.svg"  style="width:100%; margin-left:2rem" id="homeimg">
        </div>
      <!-- </div> -->
        </div>
    </div>






<script>
     // screen size

     $(document).ready(function(){
                if($(window).width() <  1000)
                {
                  $("#homeimg").css("width","20rem");
                  $("#homeimg").css("margin-top","2rem");
                }
            });

            $(window).resize(function(){

              var x=$(window).width();
              window.console.log(x);
              
              if(x<320)
              {
                $("#homeimg").css("width","10rem");
                $("#homeimg").css("margin-top","2rem");
              }
              else if(x<650)
              {
                $("#homeimg").css("width","20rem");
                $("#homeimg").css("margin-top","2rem");
              }
            });
// counting words in textarea
$('#note_body').on('keyup keypress keydown',function(){
    var note = $('#note_body').val();
    var len=note.length
    window.console.log(len);
    var display_count = len+"/5000"
    $("#word_count").html(display_count);

});

</script>


    <!-- Optional JavaScript -->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <!-- <script type="text/javascript" src="home.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>


<?php
//INSERT new note
if(@$_POST['submit'])
{
  if(@$_POST['imp'])
  {
    $imp=1;
  }
  else
  {
    $imp=0;
  }
  include 'db.php';
  $tittle=$_POST['note_tittle'];
  $note_body=$_POST['note_body'];
  $query_insert="INSERT INTO `note`(`username`,`tittle`,`note_body`,`imp`) VALUES('$username','$tittle','$note_body','$imp')";
  $res_insert=mysqli_query($conn,$query_insert);
  if($res_insert)
  {
    echo "<script>alert('Note Saved Successfully')</script>";
    header('refresh:0,home.php');
  }
}
?>
</html>