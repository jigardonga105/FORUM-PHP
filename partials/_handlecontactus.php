<?php

$showError = false;
$showAlert = false;
    
    if($_SERVER["REQUEST_METHOD"] == 'POST')
    {
        include '_dbconnect.php';

        $first_name = $_POST['firstname'];
        $last_name = $_POST['lastname'];
        $contact_number = $_POST['contactnumber'];
        $email = $_POST['email'];
        $concern = $_POST['concern'];

        $sql ="INSERT INTO `contact_us` (`first_name`, `last_name`, `contact_number`, `email`, `concern`, `Date & Time`) VALUES ('$first_name', '$last_name', '$contact_number', '$email', '$concern', current_timestamp());";
        $result = mysqli_query($conn, $sql);

        if ($result)
        {
            $showAlert = true;
            if($showAlert)
            {
                header("Location:/forum/home.php?contactsuccess=true");
                exit();
            }
        }
    }
    else
    {
        header("Location:/forum/home.php?contactunsuccess=true");
        echo 'unsuccess';
    }
    header("Location:/forum/home.php?contactunsuccess=true");
    
?>