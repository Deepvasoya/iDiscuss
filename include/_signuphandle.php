<?php
$showAlert = false;
$showError = "false";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "_database.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $existSql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        // $exists = true;
        $showError = "Username Already Exists";
    } else {
        if ($password == $cpassword) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = " INSERT INTO `user`(`username`, `password`, `date`) VALUES ('$username', '$hash', current_timestamp())";

            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
                header("location:/iDiscuss/home.php?signupsuccess=true");
                exit();
            }
        } else {
            $showError = "Passwords do not match";
        }
    }
    header("location:/iDiscuss/home.php?signupsuccess=false&error=$showError");
}
