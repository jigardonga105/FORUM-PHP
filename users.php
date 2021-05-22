<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <title>FORUM - let's discuss</title>

    <style>
        .user-grid{
            margin-top: 5em;
            margin-bottom: 5em;
            margin-left: 40%;
            margin-right: 40%;
        }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>

    <?php echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php">
                <p class="text-warning my-0">FORUM</p>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php" tabindex="-1">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>'; ?>

    <!-- user container starts here -->
    <div class="container my-3" style="min-height: 380px;">
        <div align="center" class="user-grid">
            <div class="alert alert-info text-dark bg-warning" role="alert">
                <span style="font-size:40px"><strong>Our Users</strong><br></span>
            </div>
        </div>
        <div class="row">

            <!-- Fetch all the users -->
            <?php 
        
            $sql = "SELECT * FROM `users`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {

                $userid = $row['user_id'];
                $username = $row['user_name'];
                $useremail = $row['user_email'];
                $userdate = $row['Date & Time'];

                echo '<!-- use a for loop to itrate through the users -->
                        <div class="col-md-4 my-4">
                            <div class="card" style="width: 18rem;">
                                <img src="img/user.jpg" height="210" width="500" class="card-img-top" alt="image of '.$username.'">
                                <div class="card-body">
                                    <h4 class="card-title text-warning" style="margin-left: 33%"><strong>'.$username.'</strong></h4>
                                    <p class="card-text">Name: '.$username.'<br>Email-id : '.$useremail.'<br>DOJ : '.$userdate.'</p>
                                </div>
                            </div>
                        </div>';
            }
        
        ?>
        </div>
    </div>

    <?php include 'partials/_footer.php'; ?>
</body>

</html>