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
    .nav {
        min-height: 575px;
    }

    .clr {
        background-color: rgba(236, 245, 242);
    }

    .grid {
        margin-left: 35%;
        margin-right: 35%;
        margin-top: 5em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(95%);
    }

    .grid:hover {
        margin-left: 35%;
        margin-right: 35%;
        margin-top: 5em;
        box-shadow: 5px 5px 8px 10px rgb(163, 157, 157);
        filter: brightness(100%);
    }

    .contactUsDiv {
        border: 1px solid black;
        border-radius: 8px;
        margin: 5% 30%;
    }

    .head {
        background-color: orange;
        margin-left: 30%;
        font-size: 45px;
        border-radius: 5px;
        padding: 0px 5px;
        padding-bottom: 5px;
    }
    </style>
</head>

<body class="clr">
    <?php include 'partials/_dbconnect.php'; ?>
    <?php include 'partials/_header.php'; ?>
    <div class="nav">

        <?php
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
    {
        echo '<div class="container contactUsDiv">
                    <span class="head">Contact Us:</span>
                    <form action="/forum/partials/_handlecontactus.php" method="post">
                        <div class="mb-3 mt-5">
                            <label for="exampleInputPassword1" class="form-label">First Name</label>
                            <input type="text" maxlength="30" class="form-control" id="firstname" name="firstname">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Last Name</label>
                            <input type="text" maxlength="30" class="form-control" id="lastname" name="lastname">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contact Number</label>
                            <input type="text" minlength="10" maxlength="10" class="form-control" id="contactnumber"
                                name="contactnumber">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
                        </div>
                        <label for="floatingTextarea">Discribe your Concern</label>
                        <div class="form-floating mb-3">
                            <textarea type="text" class="form-control" id="concern" placeholder="Your message"
                                name="concern"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning mb-3" style="margin-left: 45%;">Submit</button>
                    </form>
            </div>';
    }
    else 
    {
        echo '<div class="alert alert-info text-dark mb-5 grid" role="alert">
                <h1 align="center" class="text-dark">Contact Us:</h1>
                <div align="center"><img align="center" class="mt-4" src="img/contact.jpg" width="300" height="150"></div><br><br>
                <p align="center" style="font-size:25px">You are not Logged in.<br>You need to login first to be able to Contact with us.</P>
                <div>
                    <p align="center"><button class="btn btn-outline-warning mt-3 mx-3 bg-secondary text-warning" data-bs-toggle="modal" data-bs-target="#signupmodal">Create an Account</button><button class="btn btn-outline-warning ml-3 mt-3 bg-secondary text-warning" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button></p>
                </div>
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