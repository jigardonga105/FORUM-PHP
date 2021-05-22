<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "forum";

$conn = MySQLi_connect($servername,$username,$password,$database);

// if (!$conn)
// {
//     echo "Connection was not Successful. Because of this error --> " . mysqli_connect_error($conn);  
// }

if (!$conn)
{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Error!</strong> We are a facing some issues. Please try again after some time.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
}
?>