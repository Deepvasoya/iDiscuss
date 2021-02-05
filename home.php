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
  <!-- carousal slider -->

  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <ol class="carousel-indicators">
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="image/1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Programming</h5>
          <p>Programming is the process of creating a set of instructions that tell a computer how to perform a task.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Computer</h5>
          <p>A computer is a machine that can be instructed to carry out sequences of arithmetic or logical operations automatically via computer programming.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="image/3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Touch typing</h5>
          <p>Touch typing is a style of typing.</p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </a>
  </div>

  <!-- middle  -->
  <div class="col-lg-6 col-md-8 mx-auto text-center my-5">
    <h1 class="fw-light">Solve problems</h1>
    <p class="lead text-muted">Group problem solving is the process of bringing together stakeholders who through their analytical decision making abilities can influence the outcome of the problem.</p>
  </div>


  <!-- middle-2 -->


  <div class="album py-5">
    <div class="container">
      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php
        include "include/_database.php";
        $sql = "SELECT * FROM `category`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
          $catid = $row['category_id'];
          $cattitle = $row['category_title'];
          $categorydesc = $row['category_desc'];
          echo '<div class="col">
                <div class="card" style="width: 18rem;">
                <img src="image/cat' . $catid . '.jpg" class="card-img-top" alt=' . $cattitle . '>
                <div class="card-body">
                  <h5 class="card-title"><a href="thread.php?catid=' . $catid . '">' . $cattitle . '</a></h5>
                  <p class="card-text">' . substr($categorydesc, 0, 50) . '.....</p>
                  <a href="thread.php?catid=' . $catid . '" class="btn btn-primary">View Threads</a>
                </div>
              </div>
            </div>';
        }
        ?>
      </div>
    </div>
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