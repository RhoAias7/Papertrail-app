<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PaperTrail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="d-flex flex-grow-1">
        <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
        <a class="navbar-brand d-none d-lg-inline-block" href="index.php"><img src="img/plane.png" height="30px">PaperTrail</a>

        <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="index.php">
            <img src="img/plane.png" height="30px" alt="logo">
        </a>
        <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item">
                <a href="#" class="nav-link m-2 menu-item nav-active">Home</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link m-2 menu-item">About</a>

            </li>
            <li class="nav-item">
                <a href="#" class="nav-link m-2 menu-item">How It Works</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link m-2 menu-item">Subjects</a>
            </li>
        </ul>
                 <?php 
            if (isset($_SESSION['userUid'])) {  
                echo 'form action = "regSystem/logout.php" method="post"><button type="submit" name="logout-submit" class="btn navBtn">Logout</button></form>';
            }
            else { 
                echo '<a href="signInPage.php" class="btn btn-primary">Sign In</a>';     
            }
         ?>
    </div>
</nav>
<div class="jumbotron">
  <h1 class="display-4">Explore Our Library of Study Material</h1>
  <hr class="my-4">
  <p>Share Your Notes With Your Class Today</p>
  <p class="lead">
    <a class="btn btn-primary btn-lg" href="signUpPage.php" role="button">Join Today</a>
  </p>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-12" id="particles-js">
      What is PaperTrail?
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      One of three columns
    </div>
    <div class="col-sm">
      One of three columns
    </div>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-sm">
      One of three columns
    </div>
  </div>
</div>
<script src="particles.js"></script>
<script src="js/app.js"></script>
</body>
</html>