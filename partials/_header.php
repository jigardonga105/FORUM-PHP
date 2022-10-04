<?php

session_start();

//navbar start here
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
      <a href="home.php"><img src="img/favicon_io/Logo.png" alt="logo" width="55 px" height="50 px" style="margin-right:1px;"></img></a>
        <a class="navbar-brand" href="home.php"><p class="text-warning my-0">ORUM</p></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>'.
            // first dropdown menu starts here
            '<li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                More Options
              </a>
              <ul class="dropdown-menu bg-warning" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="categories.php">All Categories</a></li>
                <li><a class="dropdown-item" href="allquestion.php">Questions</a></li>
                <li><a class="dropdown-item" href="users.php">Users</a></li>
              </ul>
            </li>'.
            // first dropdown menu ends here
            // second dropdown menu starts here
            '<li class="nav-item dropdown">
              <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Top Categories
              </a>
              <ul class="dropdown-menu bg-warning" aria-labelledby="navbarDropdown">';

              $sql = "SELECT category_name, category_id FROM `categories` LIMIT 5";
              $result = mysqli_query($conn, $sql);
              while ($row = mysqli_fetch_array($result))
              {
                echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
              }
              echo '</ul>
            </li>'.
            // first dropdown menu ends here
            '<li class="nav-item">
              <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php" tabindex="-1">Contact Us</a>
            </li>
          </ul>';

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
{
  echo '<form class="d-flex" action="search.php" method="get">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-warning" type="submit">Search</button>
      </form>
      <p class="text-light my-2 mx-2">Welcome '. $_SESSION['username'].'</p>
      <a href="/forum/partials/_handleLogout.php" role="button" class="btn btn-outline-warning">Logout</a>';
}
else
{
  echo '<div class="mx-2">
          <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#loginmodal">Login</button>
          <button class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#signupmodal">SignUp</button>
        </div>';
}
          
echo '</div>
      </div>
      </nav>';
//navbar end here


include 'partials/_loginmodal.php';
include 'partials/_signupmodal.php';
// include '/contact.php';


//This Message shown for signup section
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == 'true')
{
  // this is for the success
  echo '<div id="alert-msg" class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You can now login.
        </div>';
}
      
if(isset($_GET['signupunsuccess']) && $_GET['signupunsuccess'] == 'true')
{
  // this is for the un success
  echo '<div id="alert-msg" class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Your Response has not been submitted successfully. Please check your details. then try again.
        </div>';
}


//This Message shown for login section
if(isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == 'true')
{
  echo '<div id="alert-msg" class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You are logged in successfully.
        </div>';
      }
      
if(isset($_GET['loginunsuccess']) && $_GET['loginunsuccess'] == 'true')
{
  echo '<div id="alert-msg" class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> You are not logged in successfully. Please check your details. then try again.
        </div>';
}


//This Message shown for contact section
if(isset($_GET['contactsuccess']) && $_GET['contactsuccess'] == 'true')
{
  echo '<div id="alert-msg" class="alert alert-success alert-dismissible fade show my-0" role="alert">
      <strong>Success!</strong> Your response has been submitted successfully. We are contact you as soon as possible.
    </div>';
}

if(isset($_GET['contactunsuccess']) && $_GET['contactunsuccess'] == 'true')
{
  echo '<div id="alert-msg" class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Your response has not been submitted successfully. Please check your details and try again.
        </div>';
}

?>