<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>FORUM - let's discuss</title>

    <style>
    .clr {
        background-color: rgba(236, 245, 242);
    }
    </style>

</head>

<body class="clr">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
    
    $id = $_GET['catid'];

    $sql = "SELECT * FROM `categories` WHERE category_id = $id"; 
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $idTrue = true;# code...
        while($row = mysqli_fetch_assoc($result))
        {
            $catid = $row['category_id'];
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];
        }
    }

    ?>

    <?php

    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST')
    {
        //insert thread into database
        $th_title = $_POST['title'];
        $th_desc = $_POST['desc'];
        $userid = $_POST['user_id'];

        $th_title = str_replace("<", "&lt;", $th_title);
        $th_title = str_replace(">", "&gt;", $th_title);

        $th_desc = str_replace("<", "&lt;", $th_desc);
        $th_desc = str_replace(">", "&gt;", $th_desc);

        $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `Date & Time`) VALUES ('$th_title', '$th_desc', '$id', '$userid', current_timestamp());"; 
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        
    }
    
    ?>

    <div class="container my-4">

        <?php

            if ($showAlert)
            {
                echo '<div id="alert-msg" class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your Response has been successfully submitted. Please wait for community to respond.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }

        ?>

    </div>

    <?php
        if ($idTrue === true) {
            echo '<div class="container my-4" style="width: 55%;">
                    <div class="alert alert-info text-dark" role="alert" style="background-color: #95ffc2;">
                        <h1 class="display-4 text-dark">Welcome to the '.$catname.' forum</h1>
                        <p class="lead"> '.$catdesc.' </p>
            
                        <a class="btn btn-warning btn-lg" href="https://en.wikipedia.org/wiki/'.$catname.'_(programming_language)" target=" " role="button">Learn more!</a>
            
                        <hr class="my-4">
            
                        <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not
                            post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post
                            questions. Remain respectful of other members at all times.</p>
                        <p class="text-dark" align="right"><b>-By Admin</b></p>
                    </div>
                </div>';# code...
        }
    ?>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<div class="container bg-warning p-5" style="width: 45%; border-radius: 5px;">
                <h1 class="py-2"><i>Start a Discussion:</i></h1>
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Problem Title</label>
                        <input type="text" class="form-control" id="title" name="title" aria-describedby="title">
                        <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                    </div>
                    <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ellaborate Your Concern</label>
                        <textarea class="form-control" id="desc" name="desc" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success" style="margin-left: 85%;">Submit</button>
                </form>
            </div>';
        }
        else 
        {
            echo '<div class="container alert alert-info" role="alert" style="width: 38%;">
                    <h1 class="text-dark">Start a Discussion:</h1><br>
                    You are not Logged in. You need to login first to be able to Start Discussion.
                </div>';
        }

    ?>


    <div class="container my-3" style="min-height: 380px; border: 1px solid black; border-radius: 5px; width: 75%;">

        <h1 class="py-2 mx-4 text-warning">
            <i style="background-color: black; padding: 5px; border-radius: 5px; padding-top: 0px;">
                Browse Questions:
            </i>
        </h1>

        <?php
    
            $id = $_GET['catid'];
            $sql = "SELECT * FROM `threads` WHERE thread_cat_id = $id"; 
            $result = mysqli_query($conn, $sql);
            $noresults = True;
            while($row = mysqli_fetch_array($result))
            {
                $noresults = False;
                $threadid = $row['thread_id'];
                $threadtitle = $row['thread_title'];
                $threaddesc = $row['thread_desc'];
                $threaduserid = $row['thread_user_id'];
                $threadtime = $row['Date & Time'];

                $sql2 = "SELECT * FROM `users` WHERE user_id='$threaduserid'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);

                echo '<div class="container mt-2">
                        <hr>
                        <div class="container">
                            <h5><a class="text-dark" href="thread.php?threadid='.$threadid.'">'.$threadtitle.'</a>
                            </h5>
                            <span class="mx-5">'.$threaddesc.'</span>
                        </div>
                        <div class="container" align="right">
                            <span mr-5>'.$threadtime.'</span>
                            <span><img class="mx-1 my-1" src="img/user.jpg" width="25px" class="mx-1" style="border-radius: 15px;"></span>
                            <span class="font-weight-bold my-0"><b>'. $row2['user_name'] .'</b></span><br>
                        </div>
                    </div>';
            }

            // echo var_dump($noresults);

            if ($noresults)
            {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert" style="width: 50%; margin-left: 15%;">
                        <h4><strong>No Threads Found!</strong></h4> <br> 
                        <strong>Heyy!</strong> You should be the first person to ask a question.
                        </div>';
            }

        ?>

    </div>

    <?php include 'partials/_footer.php'; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    -->
</body>

</html>