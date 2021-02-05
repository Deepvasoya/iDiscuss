 <?php

  session_start();

  echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

   <div class="container-fluid">
     <a class="navbar-brand" href="/iDiscuss">iDiscuss</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarSupportedContent">
       <ul class="navbar-nav me-auto mb-2 mb-lg-0">
         <li class="nav-item">
           <a class="nav-link active" aria-current="page" href="/iDiscuss">Home</a>
         </li>
         <li class="nav-item dropdown">
           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
             Subject
           </a>
           <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
             <li><a class="dropdown-item">PHP</a></li>
             <li><a class="dropdown-item">Python</a></li>
             <li><a class="dropdown-item">C++</a></li>
             <li><a class="dropdown-item">Java</a></li>
             <li><a class="dropdown-item">.NET</a></li>
             <li><a class="dropdown-item">C programming</a></li>
           </ul>
         </li>
         <li class="nav-item">
           <a class="nav-link" aria-current="page" href="contact.php">Contact us</a>
         </li>
       </ul>';
  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo '
    <form class="d-flex flex-row" method="get" action="/iDiscuss/search.php" >
      <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0 mx-2" type="submit">Search</button>
    </form>
    <p class="text-light my-2 mx-3"> Welcome - ' . $_SESSION['username'] . '</p>
    <a href="/iDiscuss/include/_logout.php" class="btn btn-primary mx-2">Logout</a>';
  } else {
    echo ' <form class="d-flex my-2">
         <a href="" class="btn btn-primary ml-2" data-bs-toggle="modal" data-bs-target="#loginmodel">Login</a>
         <a href="" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#signupmodel">Sign up</a>   
       </form>';
  }


  echo '
     </div>
   </div>
 </nav>';
  include "include/_login.php";
  include "include/_signup.php";

  if (isset($_GET['signupsuccess']) && ($signupsuccess = "true")) {
    echo '<div class="my-0 alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can now login.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
  }
  ?>
 