<?php

$showError = false;
$showAlert = false;

if($_SERVER["REQUEST_METHOD"] == 'POST')
{
    include '_dbconnect.php';

    $user_name = $_POST['signupUsername'];
    $user_email = $_POST['signupEmail'];
    $user_password = $_POST['signupPassword'];
    $user_cpassword = $_POST['signupcPassword'];

    //check whether email is exist
    $existSql = "SELECT * FROM `users` WHERE user_email = '$user_email'";
    $result = mysqli_query($conn, $existSql);
    $numRow = mysqli_num_rows($result);
    // echo var_dump($numRow);
    if($numRow > 0)
    {
        $showError = true;
        if($showError = true)
        {
            $showError = "Email already exists";
        }
    }
    else
    {
        if($user_password == $user_cpassword)
        {
            $hash = password_hash($user_password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`,`user_email`, `user_password`, `Date & Time`) VALUES ('$user_name','$user_email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            // echo $result;

            if($result)
            {
                $showAlert = true;
                header("Location:/forum/home.php?signupsuccess=true");
                exit();
            }
        }
        else
        {
            $showError = true;
            if($showError = true)
            {
                $showError = "Please Enter same password.";
            }
        }
    }
    header("Location:/forum/home.php?signupunsuccess=true&error=$showError");
}

?>