<?php
$alert = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "include/_database.php";
  $username = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];


  $sql = "INSERT INTO `contact` (`name`, `email`, `message`, `date`) VALUES ('$username', '$email', '$message', current_timestamp());";

  if (mysqli_query($conn, $sql)) {
    $alert = true;
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}
?>
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
  <?php
  include "include/_nav.php";
  ?>

  <div class="container my-4 d-flex justify-content-center" style="min-height: 670px;">
    <form class="col-lg-5" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name" required="require" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" required="require" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">example@example.com</div>
      </div>
      <div class="mb-3">
        <label class="form-label">Message</label>
        <textarea class="form-control" id="message" name="message"></textarea>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
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