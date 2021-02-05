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
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `category` WHERE `category_id` = $id";
  $result = mysqli_query($conn, $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $cattitle = $row['category_title'];
    $categorydesc = $row['category_desc'];
  }
  ?>

  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['tit'];
    $title = str_replace('<', '&lt;', $title);
    $title = str_replace('>', '&gt;', $title);
    $comm = $_POST['co'];
    $comm = str_replace('<', '&lt;', $comm);
    $comm = str_replace('>', '&gt;', $comm);
    $sno = $_POST['sno'];
    $sql = "INSERT INTO `thread` (`thread_title`, `thread_desc`, `thread_catid`, `thread_user`, `date`) VALUES (' $title', '$comm', '$id', '$sno', current_timestamp())";
    $result = mysqli_query($conn, $sql);
  }
  ?>

  <div class="container">
    <div>
      <div class="d-block bg-primary text-white my-4 p-5 rounded">
        <h1><?php echo $cattitle; ?></h1>
        <p class="lead"><?php echo $categorydesc; ?></p>
      </div>
    </div>
  </div>

  <?php
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '<div class="container">
    <form action="' . $_SERVER["REQUEST_URI"] . '" method="post">
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="tit">
         <input type="hidden" id="sno" name="sno" value="' . $_SESSION["sno"] . '">
      </div>
      <div class="form-group mb-2">
        <label for="exampleFormControlTextarea1">Comments</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="co"></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
';
  } else {
    echo '<div class="container my-5">
    <h4>You are not loggedin! First Loggedin and Post your Querys</h4>
  </div>';
  }

  ?>

  <div class="container">
    <h3>Show All Querys</h3>
  </div>


  <?php
  $id = $_GET['catid'];
  $sql = "SELECT * FROM `thread` WHERE thread_catid = $id";
  $result = mysqli_query($conn, $sql);
  $noresult = true;
  while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
    $thread_id = $row['thread_id'];
    $thread_title = $row['thread_title'];
    $thread_desc = $row['thread_desc'];
    $thread_user = $row['thread_user'];
    $dt = $row['date'];
    $sql2 = "SELECT username FROM `user` WHERE sno=$thread_user";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $user = $row2['username'];


    echo '
      <div class="container">
      <div class="container my-2">
      <div class="row g-0 bg-light position-relative">
      <div class="col-md-1 mb-md-0 p-md-4">
        <img src="image/user.png" width="50px" height="50px" class="img-fluid img-thumbnail" alt="...">
      </div>
      <div class="col-md-10 p-4 ps-md-0">
        <a href="threadlist.php?threadid=' . $thread_id . '" style="text-decoration:none">
          <p>' . $thread_title . '</p>
        </a>
        <footer class="blockquote-footer">Posted By : <cite title="Source Title">' . $user . '</cite><p>at-' . $dt . '</p></footer>
      </div>
    </div>
    </div>
  </div>';
  }
  if ($noresult) {
    echo '<div class="jumbotron jumbotron-fluid bg-light mb-5 my-5">
  <div class="container">
    <h1 class="display-4">No result found</h1>
    <p class="lead">Be the first person to post a comment.</p>
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