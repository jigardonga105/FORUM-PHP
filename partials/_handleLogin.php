<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    include '_dbconnect.php';

    $uname = $_POST['loginEmail'];
    $pass = $_POST['loginPass'];

    $sql = "SELECT * FROM users WHERE user_name = '$uname'";
    $result = mysqli_query($conn,$sql);
    $numRow = mysqli_num_rows($result);
    if($numRow == 1)
    {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($pass,$row['user_password']))
        {
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['useremail'] = $email;

            $sql2 = "SELECT * FROM users WHERE user_email = '$email'";
            $result2 = mysqli_query($conn,$sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $username = $row['user_name'];
            $_SESSION['username'] = $username;

            echo "loggedin " . $email;
            header("Location:/forum/home.php?loginsuccess=true");
            exit();
        }
        else
        {
            header("Location:/forum/home.php?loginunsuccess=true");
        }
    }
    header("Location:/forum/home.php?loginunsuccess=true");
}

?>