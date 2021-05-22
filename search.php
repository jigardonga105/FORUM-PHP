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
    .clr {
        background-color: rgba(236, 245, 242);
    }

    .margin {
        min-height: 87vh;
    }
    </style>

</head>

<body class="clr">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <!-- Search Results -->

    <div class="container margin mt-3">
        <div class="alert alert-info text-dark mb-4" role="alert">
            <h1>Search Results for <em>"<?php echo $_GET['search'] ?>"</em></h1>
        </div>
        <div class="container ml-2">

            <?php

                $noresults = true;
                $query = $_GET['search'];
                // $sql = "select * from threads where match (thread_title, thread_desc) against ('$query')";
                $sql = "SELECT * FROM `threads` WHERE thread_title LIKE '%$query%'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_array($result))
                {
                    $threadid = $row['thread_id'];
                    $threadtitle = $row['thread_title'];
                    $threaddesc = $row['thread_desc'];
                    $thread_user_id = $row['thread_user_id'];
                    $url = "thread.php?threadid=".$threadid;

                    $noresults = false;
                    
                    echo '<div class="result mb-5">
                            <h3><a href="'.$url.'" class="text-dark">'.$threadtitle.'</a></h3>
                            <p>'.$threaddesc.'</p>
                        </div>';


                }

                if($noresults)
                {
                    echo '<div class="alert alert-secondary text-dark" role="alert">
                            <p class="display-4">No Results Found</p>
                            <p class="lead"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords. </li></ul>
                            </p>
                        </div>';
                }

            ?>

        </div>
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