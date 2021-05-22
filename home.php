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
        min-height: 800px;
        /* 575px */
    }

    .font-size {
        font-size: 100px;
    }

    .font-size:hover {
        font-size: 200px;
    }

    .second-size {
        font-size: 35px;
    }

    .second-size:hover {
        font-size: 70px;
    }

    /* .devlp {
        margin-left: 25%;
        margin-right: 25%;
        box-shadow: 5px 5px 8px 5px rgb(163, 157, 157);
    } */

    .grid {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }
    .grid:hover {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }

    .grid-1 {
        margin-left: 17%;
        margin-right: 51%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }
    .grid-1:hover {
        margin-left: 17%;
        margin-right: 51%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }

    .grid-2 {
        margin-left: 51%;
        margin-right: 17%;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }
    .grid-2:hover {
        margin-left: 51%;
        margin-right: 17%;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }

    .grid-3 {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 10em;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }
    .grid-3:hover {
        margin-left: 30%;
        margin-right: 30%;
        margin-top: 10em;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }
    .grid-3_img{
        margin-left:50%;
        margin-right:50%;
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>

    <!-- Slider starts here -->
    <div id="carouselExampleIndicators" class="carousel slide mb-5" data-bs-ride="carousel">
        <ol class="carousel-indicators">
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
            <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://source.unsplash.com/2400x844/?coding,google" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x844/?programmers,Microsoft" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="https://source.unsplash.com/2400x844/?coding,android" class="d-block w-100" alt="...">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
    <!-- Slider ends here -->

    <!-- <div class="bg-clr"> -->
    <!-- <div class="page-height"> -->
    <div class="sld-text">
        <h3 class="text-danger">Welcome to</h3>
        <div class="text-secondary">
            <span class="font-size mt-0">FORUM</span><br>
            <span class="second-size">Let's Discuss</span>
        </div>
    </div>
    <!-- </div> -->

    <div class="alert alert-info text-dark mb-5 grid" role="alert">
        <h2 align="center" class="">For developers, by developers</h2>
        <p align="center">FORUM - Let's Discuss' is an open community for anyone that codes. We help you get answers
            to your toughest coding questions, share knowledge with your coworkers in private, and find your next
            dream job.</p>
    </div>

    <div>
        <div class="grid-1">
            <div class="alert alert-info text-dark" role="alert">
                <img align="right" class="mt-4" src="img/about2.jpg" width="155">
                <span style="font-size:30px">Our Public Platform<br></span>
                <span style="font-size:18px">Where developers and<br>technologists go to gain and
                    share<br>knowledge.</span>
                <div>
                    <a href="/forum/allquestion.php"><button class="btn btn-outline-warning mt-3 bg-info text-dark">Check Out</button></a>
                </div>
            </div>
        </div>
        <div class="grid-2">
            <div class="alert alert-info text-dark" role="alert">
                <img align="right" class="mt-2" src="img/user.jpg" width="155">
                <span style="font-size:30px">Our Users<br></span>
                <span style="font-size:18px">Where developers and<br>technologists contact<br>personally.</span>
                <div>
                    <a href="/forum/users.php"><button class="btn btn-outline-warning mt-3 bg-info text-dark">Our
                            Users</button></a>
                </div>
            </div>
        </div>
    </div>

    <div align="center" class="grid-3">
        <div class="alert alert-info text-dark bg-warning" role="alert">
            <span style="font-size:40px">Join Our Community<br></span>
            <img class="mt-2" src="img/about3.jpg" width="500" height="200">
            <div>
                <button class="btn btn-outline-warning mt-3 bg-secondary text-warning" data-bs-toggle="modal" data-bs-target="#signupmodal">Create an Account</button>
            </div>
        </div>
    </div>

    <!-- </div> -->
    <!-- <a href="/forum/allquestion.php"><button class="btn btn-warning sld-text" type="submit">All Questions</button></a> -->
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