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
    <?php
    include "include/_database.php";
    ?>


    <!-- search -->
    <div class="container my-5" style="min-height: 630px">
        <h2>Search result for -<em><?php echo $_GET['search']; ?></em></h2>
        <?php
        $noresult = true;
        $search = $_GET['search'];
        $sql = "SELECT * FROM thread WHERE MATCH (thread_title,thread_desc) against ('$search')";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $thread_title = $row['thread_title'];
            $thread_desc = $row['thread_desc'];
            $thread_id = $row['thread_id'];
            $noresult = false;

            echo '<div class=" result my-5">
                    <a href=" threadlist.php?threadid=' . $thread_id . '" style="text-decoration:none">
                        <h3>' . $thread_title . '</h3>
                    </a>
                    <p>' . $thread_desc . '</p>
                </div>';
        }
        if ($noresult) {
            echo '<div class="jumbotron jumbotron-fluid bg-light my-5 pb-4">
  <div class="container">
    <h1 class="display-4">No results found</h1>
    <p class="lead">Please! Make sure Enter Valid Search</p>
  </div>
</div>';
        }
        ?>

    </div>
    <!-- footer -->
    <?php
    include "include/_footer.php";
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