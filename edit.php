<?php
ob_start();
?>
<!doctype html>
<html lang="en">

<?php
session_start();
$username=$_SESSION['username'];
include 'db.php';
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script> -->
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>

    <title>Edit</title>
</head>

<body>
    <!-- Nav Start -->
<nav class="navbar navbar sticky-top navbar-expand-lg navbar-dark bg-info">
  <a class="navbar-brand" href="home.php">View Your Note</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse flex-row-reverse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="home.php"> HOME <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active " >
      <a href="logout.php"><button class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
      </li>
    </ul>
  </div>
</nav>
<!-- Nav End -->


<?php 
$note_id=$_POST['note_id'];
$query_select_note="SELECT * FROM `note` WHERE `note_id`='$note_id' AND `username`='$username'";
$res_select_note=mysqli_query($conn,$query_select_note);
$row=mysqli_fetch_assoc($res_select_note);
?>
<!-- Edit Form start -->
    <div class="container-fluid mx-auto" style="margin-top:10rem"> 
        <div class="row align-items-center ">
            <div class="offset-lg-1 offset-md-1 col-6">
            <form method="POST" action="">
                <input type="text" name="note_id" value="<?php echo $row['note_id'] ?>"  hidden >
                <div class="form-group">
                    <input type="text" maxlength="90" class="form-control" id="note_tittle" name="note_tittle" placeholder="Tittle of the note" required value="<?php echo $row['tittle'] ?>">
                </div>
                <div class="form-group">
                   <textarea maxlength="5000" class="form-control " rows="5"  id ="note_body" name= "note_body" placeholder="Description"required><?php echo$row['note_body'];?></textarea>
                </div>
                <input type="checkbox" name="imp" value=1 <?php echo ($row['imp']==1)?'checked':''?> > Mark as Important
                <p id="word_count"><small>0/5000</small></p>
                <input type="submit" class="btn btn-primary" name="save" value="Save">
            </form>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 col-2 justify-content-end">
          <div class="row align-items-center ">
            <img src="assets/newnote.svg"  style="width:25rem; margin-left:2rem" id="homeimg">
        </div>
      </div>
        </div>
</div>

<!-- Edit Form end -->

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

// preconuting the words

$(document).ready(function(){

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
if(@$_POST['save'])
{
  if(@$_POST['imp'])
  {
    $imp=1;
  }
  else
  {
    $imp=0;
  }
  $tittle=$_POST['note_tittle'];
  $note_body=$_POST['note_body'];
  $query_update="UPDATE `note` SET `tittle`='$tittle', `note_body`='$note_body', `imp`='$imp' WHERE `note_id`='$note_id' AND `username`='$username'";
  $res_update=mysqli_query($conn,$query_update);
  if($res_update)
  {
    echo "<script>alert('Note Update Successfully')</script>";
    header('refresh:0,home.php');
  }
}
?>
</html>