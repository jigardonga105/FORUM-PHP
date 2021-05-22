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

    <!-- Category container starts here -->
    <div class="container my-3" style="min-height: 380px;">
        <h2 class="text-center my-3"> Forum - Browse Your categories here</h2>
        <div class="row">

            <!-- Fetch all the categories -->
        <?php 
        
            $sql = "SELECT * FROM `categories`"; 
            $result = mysqli_query($conn, $sql);
            while($row = mysqli_fetch_array($result))
            {
            // echo $row['category_id'];
            // echo $row['category_name'];
            // echo $row['category_description'];

            $catid = $row['category_id'];
            $catname = $row['category_name'];
            $catdesc = $row['category_description'];

            echo '<!-- use a for loop to itrate through the categories -->
                    <div class="col-md-4 my-2">
                        <div class="card" style="width: 18rem;">
                            <img src="img/cat'.$catid.'.jpg" height="200" width="500" class="card-img-top" alt="image of category">
                            <div class="card-body">
                                <h5 class="card-title"><a class="text-dark" href="threadlist.php?catid='.$catid.'">'.$catname.'</a></h5>
                                <p class="card-text">'.substr($catdesc, 0, 62).'...</p>
                                <a href="threadlist.php?catid='.$catid.'" class="btn btn-primary">View Threads</a>
                            </div>
                        </div>
                    </div>';
            }
        
        ?>
        </div>
    </div>

    <!-- Add a new categories here. -->
    <?php

        $showAlert = false;
        $method = $_SERVER['REQUEST_METHOD'];
        if($method == 'POST')
        {
            //insert thread into database
            $cat_title = $_POST['cat_title'];
            $cat_desc = $_POST['cat_desc'];
            // $userid = $_POST['user_id'];

            $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `Date & Time`) VALUES ('$cat_title', '$cat_desc', current_timestamp());";
            $result = mysqli_query($conn, $sql);
            $showAlert = true;
            
        }

        ?>

        <div class="container my-4">

            <?php

                if ($showAlert)
                {
                    echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> Your Response has been successfully submitted.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }

            ?>

        </div>

        <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
            {
                echo '<div class="alert alert-success mx-5" role="alert">
                        <h1 class="alert-heading py-2"><i>Add new category:</i></h1>
                        <form action="'.$_SERVER['REQUEST_URI'].'" method="post">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Category Title</label>
                                <input type="text" class="form-control" id="cat_title" name="cat_title" aria-describedby="title">
                                <div id="emailHelp" class="form-text">Keep your title as short and crisp as possible.</div>
                            </div>
                            <input type="hidden" name="user_id" value="'.$_SESSION["user_id"].'">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Category Description</label>
                                <textarea class="form-control" id="cat_desc" name="cat_desc" rows="3"></textarea>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
                        <hr>
                    </div>';
                }
                else 
                {
                    echo '<div class="container alert alert-info" role="alert">
                            <h1 class="text-dark">Add new category:</h1><br>
                            You are not Logged in. You need to login first to be able to Add new category.
                        </div>';
                }
        ?>


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