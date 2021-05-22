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
    .clr{
        background-color:rgba(236,245,242);
    }
    </style>

</head>

<body class="clr">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <?php
    
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` WHERE thread_id = $id"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result))
    {
        $threadid = $row['thread_id'];
        $threadtitle = $row['thread_title'];
        $threaddesc = $row['thread_desc'];
        $thread_user_id = $row['thread_user_id'];

        $sql2 = "SELECT * FROM `users` WHERE user_id='$thread_user_id'";
        $result2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_array($result2);

        $posted_by = $row2['user_name'];
    }

    ?>

    <?php

    $showAlert = false;
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == 'POST')
    {
        //insert comment into database
        $comment = $_POST['comment'];
        $userid = $_POST['user_id'];

        $comment = str_replace("<", "&lt;", $comment);
        $comment = str_replace(">", "&gt;", $comment);

        $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `Date & Time`) VALUES ('$comment', '$id', '$userid', current_timestamp());"; 
        $result = mysqli_query($conn, $sql);
        $showAlert = true;
        
    }

    ?>

    <div class="container my-4">

        <?php

            if ($showAlert)
            {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your comment has been submitted.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }

        ?>

    </div>

    <div class="container my-4">
        <div class="alert alert-info text-dark" role="alert">
            <h3 class="display-4"> <?php echo $threadtitle; ?> </h3>
            <p class="lead"> <?php echo $threaddesc; ?> </p>

            <p class="text-warning"><strong>Posted by :-</strong> <b><i class="text-dark"><?php echo $posted_by ?></i></b></p>

            <hr class="my-4">

            <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross post questions. Remain respectful of other members at all times.</p>
            <p align="right"><b>-By Admin</b></p>
        </div>
    </div>

    <?php
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<div class="container">
                <h1 class="py-2"><i>Post a Comment:</i></h1>
                <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Type your Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                        <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-warning">Post Comment</button>
                </form>
                <hr>
            </div>';
    }
    else 
    {
        echo '<div class="container alert alert-info" role="alert">
                <h1 class="text-dark">Post a Comment:</h1><br>
                You are not Logged in. You need to login first to be able to Start Discussion.
            </div>';
    }

    ?>


    <div class="container" style="min-height: 380px;">

        <h1 class="py-2"><i>Discussions:</i></h1>

        <?php
    
            $id = $_GET['threadid'];
            $sql = "SELECT * FROM `comments` WHERE thread_id = $id"; 
            $result = mysqli_query($conn, $sql);
            $noresults = true;
            while($row = mysqli_fetch_array($result))
            {
                $noresults = false;
                $comid = $row['comment_id'];
                $comcontent = $row['comment_content'];
                $comtime = $row['Date & Time'];
                $commentuserid = $row['comment_by'];


                $sql2 = "SELECT * FROM `users` WHERE user_id='$commentuserid'";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_array($result2);

                echo '<div class="container mb-5">
                        <div class="container mt-3">
                            <p style="float: left;"><img class="mx-3 my-0" src="img/userdefault.jpg" width="54px" class="mx-1"></p>
                            <p class="font-weight-bold my-0"><b>'. $row2['user_name'] .' at '.$comtime.'</b><br>
                            <b>'. $row2['user_email'] .'</b></p>
                        </div>
                        <div class="container mt-2">
                            <h5 class="mt-0 mx-3"><p class="mx-5">'.$comcontent.'</p></h5>
                        </div>
                    </div>';

            }

            if ($noresults)
            {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h4><strong>No Comments Found!</strong></h4> <br> 
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