<?php
$login = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include "_database.php";
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `user` where username='$username'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num == 1) {
        while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['sno'] = $row['sno'];
                // echo "login " . $username;
                header("location:http://localhost/iDiscuss/home.php");
                exit();
            } else {
                $showError = "Invalid Credentials";
            }
        }
    } else {
        $showError = "Invalid Credentials";
    }
}
