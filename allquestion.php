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
    .sld-text {
        text-align: center;
        color: red;
    }

    .sld-img {
        text-align: center;
        position: absolute;
    }

    .bimg {
        /* image-align: center; */
        background-image: url("https://source.unsplash.com/2400x700/?programmer, coding");
        width: 1536px;
        height: 631px;
    }

    .bg-clr {
        background-color: rgba(236, 245, 242);
    }

    .page-height {
        min-height: 516px;
        /* 575px */
    }
    </style>
</head>

<body class="bg-clr">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <div class="page-height">
        <div class="container mt-3 mb-5">
            <div class="mx-4">
                <h3 class="text-warning">
                    <i style="background-color: black; padding: 5px; border-radius: 5px; padding-top: 0px;">
                        All Questions:
                    </i>
                </h3>
            </div>
        </div>

        <?php
        
        $sql = "SELECT `thread_id` FROM `threads`"; 
        $result = mysqli_query($conn, $sql);
        $numRow = mysqli_num_rows($result);
        echo '<div class="container mt-3">
                <div class="mx-5">
                    <h5>Total Questions: '.$numRow.'</h5>
                </div>
            </div>';
        
    ?>

        <div class="allQuesDiv" style="border: 1px solid black;margin: 2% 14%; border-bottom: 0px solid white;">

            <?php
    
            // $id = $_GET['catid'];
            $sql = "SELECT `thread_id`, `thread_title`, `thread_desc`,`thread_user_id`, `Date & Time` FROM `threads`"; 
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

                echo '<div class="container my-2" style="border-bottom: 1px solid black; padding-bottom: 5px;">
                        <div class="container">
                            <h5><a class="text-dark" href="thread.php?threadid='.$threadid.'">'.$threadtitle.'</a>
                            </h5>
                            <span class="mx-5">'.$threaddesc.'</span>
                        </div>
                        <div class="container" align="right">
                            <span mr-5>'.$threadtime.'</span>
                            <span><img class="mx-1 my-0" src="img/user.jpg" width="25px" class="mx-1" style="border-radius: 15px;"></span>
                            <span class="font-weight-bold my-0"><b>'. $row2['user_name'] .'</b></span><br>
                        </div>
                    </div>';
            }

            
            // echo var_dump($noresults);

            if ($noresults)
            {
                echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                        <h4><strong>No Questions Found!</strong></h4> <br> 
                        <strong>Heyy!</strong> You should be the first person to ask a question.
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