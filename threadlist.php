<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

  <title>iDiscuss</title>
</head>

<body>
  <!-- header -->
  <?php include "include/_nav.php"; ?>
  <?php include "include/_database.php"; ?>
  <?php
  $id = $_GET['threadid'];
  $sql = "SELECT * FROM `thread` WHERE thread_id = $id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $thread_id = $row['thread_id'];
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];
    $thread_user = $row['thread_user'];
    $dt = $row['date'];


    $sql2 = "SELECT username FROM `user` WHERE sno=$thread_user";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $user1 = $row2['username'];
  }

  ?>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $com = $_POST['comme'];
    $com = str_replace('<', '&lt;', $com);
    $com = str_replace('>', '&gt;', $com);
    $sno = $_POST['sno'];
    $sql = "INSERT INTO `comments` (`comment_desc`, `thread_id`, `comment_by` , `date`) VALUES ('$com', '$id', '$sno',current_timestamp())";
    $result = mysqli_query($conn, $sql);
  }
  ?>

  <div class="container">
    <div>
      <div class="d-block bg-primary text-white my-4 p-5 rounded">
        <h3><?php echo $thread_title;  ?></h3>
        <p class="lead"><?php echo $thread_desc;  ?></p>
        <footer class="blockquote-footer text-white">Posted By : <cite title="Source Title"><?php echo $user1; ?></cite></footer>
      </div>
    </div>
  </div>
  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo ' <div class="container">
    <h3>Start Discussion</h3>
    <form action="' . $_SERVER['REQUEST_URI'] . '" method="post">
      <div class="mb-3">
        <label class="form-label">Comments</label>
        <textarea class="form-control" id="comme" name="comme"></textarea>
        <input type="hidden" id="sno" name="sno" value="' . $_SESSION["sno"] . '">
      </div>
      <button type="submit" class="btn btn-primary my-3">Submit</button>
    </form>
  </div>';
  } else {
    echo '<div class="container my-5">
    <h4>You are not loggedin! First Loggedin and Start Discussion</h4>
  </div>';
  }
  ?>


  <div class="container">
    <h3>Show All Comments</h3>
  </div>

  <?php
  $id = $_GET['threadid'];
  $sql = "SELECT * FROM `comments` WHERE thread_id = $id";
  $result = mysqli_query($conn, $sql);
  $noresult = true;
  while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
    $comment_desc = $row['comment_desc'];
    $comment_by = $row['comment_by'];
    $dt = $row['date'];
    $sql2 = "SELECT username FROM `user` WHERE sno=$comment_by";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $user = $row2['username'];


    echo '<div class="container my-2">
    <div class="row g-0 bg-light position-relative">
      <div class="col-md-1 mb-md-0 p-md-4">
        <img src="image/user.png" width="50px" height="50px" class="img-fluid img-thumbnail" alt="...">
      </div>
      <div class="col-md-10 p-4 ps-md-0">
        <p>' . $comment_desc . '</p>
        <footer class="blockquote-footer">Posted By : <cite title="Source Title">' . $user . '</cite><p> at-' . $dt . '</p></footer>
      </div>
    </div>
  </div>';
  }
  if ($noresult) {
    echo '<div class="jumbotron jumbotron-fluid bg-light mb-5 my-5">
  <div class="container">
    <h1 class="display-4">No result found</h1>
    <p class="lead">Be the first person to start a Discussion.</p>
  </div>
</div>';
  }
  ?>


  <!-- footer -->
  <?php
  include "include/_footer.php"
  ?>

  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>