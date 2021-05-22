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
    .bimg {
        /* image-align: center; */
        background-image: url("https://source.unsplash.com/2400x700/?programmer, coding");
        width: 1536px;
        height: 631px;
    }

    .clr {
        background-color: rgba(255,255,255);
    }

    .nav {
        min-height: 575px;
    }

    .mission-div {
        margin-top: 5em;
        margin-left: 20%;
        margin-right: 20%;
    }

    .mission2-div {
        margin-top: 5em;
        margin-left: 13%;
        margin-right: 13%;
    }

    .grid-1 {
        margin-left: 12%;
        margin-right: 51%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }

    .grid-1:hover {
        margin-left: 12%;
        margin-right: 51%;
        margin-top: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }

    .grid-2 {
        margin-left: 51%;
        margin-right: 15%;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }

    .grid-2:hover {
        margin-left: 51%;
        margin-right: 15%;
        margin-bottom: 10em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }
    </style>
</head>

<body>
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <div class="nav clr">
        <div class="container my-4">
            <div class="alert alert-info text-dark mission-div" role="alert">
                <h1 align="center">Our Mission</h1>
                <h4 align="center">Helping developers and technologists write the script of the future.</h4>
                <p align="center">Our public platform serves 100 million people every month, making it one of the 50
                    most popular<br>websites in the world.
                </p>
            </div>


            <div class="alert alert-info text-dark mission2-div" role="alert">
                <h1 align="center">Our Goal</h1>
                <p align="center">Founded in 2020, <strong>FORUM's</strong> public platform is used by nearly everyone
                    who codes to
                    learn, share their knowledge, collaborate, and build their careers.Our products and tools help
                    developers and technologists in life and at work. These products also include FORUM Advertising. our
                    FORUM will help to address business continuity challenges, and undergo digital transformation.
                    Whether it’s on FORUM community is at the center of all that we do.</p>
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
                            <a href="/forum/users.php"><button class="btn btn-outline-warning mt-3 bg-info text-dark">Our Users</button></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="alert alert-info text-dark" role="alert">
                <h1 align="center">Some strict Instructions</h1>
                <p>This is a peer to peer forum. No Spam / Advertising / Self-promote in the forums is not allowed. Do
                    not post copyright-infringing material. Do not post “offensive” posts, links or images. Do not cross
                    post questions. Remain respectful of other members at all times.</p>
                <p class="text-dark" align="right"><b>-By Admin</b></p>
            </div>
        </div>
        <!-- <div class="">
            <svg width="600" height="400">
                <image href="img/about.jpg" x="90" y="137" width="180" height="300" />
            </svg>
        </div> -->
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