<?php session_start(); ?>
<!DOCTYPE html>
<html>
   <head>
   <link rel="shortcut icon" type="image/png" class="img-fluid" href="img/plane.png">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>PaperTrail</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
      <script src="scripts/main.js"></script>
      <script src="scripts/js/lib/arbor.js"></script>
      <script src="scripts/js/lib/arbor-tween.js"></script>
      <script src="scripts/js/lib/graphics.js"></script>
      <script src="scripts/js/lib/renderer.1.js"></script>
      <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
   </head>
   <body>
      <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
         <div class="d-flex flex-grow-1">
            <span class="w-100 d-lg-none d-block">
               <!-- hidden spacer to center brand on mobile -->
            </span>
            <a class="navbar-brand d-none d-lg-inline-block" href="index.php"><img src="img/plane.png" height="30px"> PaperTrail</a>
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
                  <a href="#about" class="nav-link m-2 menu-item">About</a>
               </li>
               <li class="nav-item">
                  <a href="#subjects" class="nav-link m-2 menu-item">Subjects</a>
               </li>
            </ul>
            <?php 
               if (isset($_SESSION['userUid'])) {  
                   echo '<form action="regSystem/logout.php" method="post"><button type="submit" name="logout-submit" class="btn navBtn">Logout</button></form>';
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
      <a href="#" class="scrollUp"><i class="fas fa-arrow-up"></i></a>
      <div id="carouselExampleFade " class="carousel slide carousel-fade" data-ride="carousel" data-interval="3000">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container" id="about">
                  <div class="row">
                     <div class="col-sm-6">
                        <h3 class="tutHeader">How Does It Work?</h3>
                        <div class="tutText">
                           <p>Using PaperTrail is very easy,</p>
                           <p>After selecting your subject you will be taken to the <i>Subject Canvas.</i> Here you will find the core of PaperTrail, a network of study notes and all of your peers interactions.
                           <li>Uploaded material is represtented as circle <i>Nodes,</i></li>
                           <li>Users that have interacted with a file are respresented by a <i style="color:#ffcc00">Block,</i></li>
                           <li>Comments can be viewed when you hover over an <i style="color:#38bd34">Edge</i> denoted as a link.</li>
                           </p>
                           <p>PaperTrail uses visualization to make it easier for you to decide what notes you want to downloand and use<br>There are 3 ratings you can give an uploaded material:
                           <ol class="tutRate" style="color:#38bd34"><b >Perfect:</b> represented by a Green Edge,</ol>
                           <ol class="tutRate" style="color:#00b9e4"><b >Relevant:</b> represented by a Blue Edge,</ol>
                           <ol class="tutRate" style="color:#f12c2c"><b >Irrelevant:</b> represented by a Red Edge.</ol>
                           </p>
                        </div>
                     </div>
                     <div class="col-sm-6">
                        <canvas id="sitemap" height="400" width="400"></canvas>
                     </div>
                  </div>
               </div>
            </div>
            <div class="carousel-item">
               <div class="container" id="about">
                  <div class="row">
                     <div class="col-sm-12 text-center">
                        <h1>What is PaperTrail?</h1>
                        <h4>Share your notes ✓</h4>
                        <h4>View your peers' notes ✓</h4>
                        <h4>Rate uploaded material ✓</h4>
                        <h4>Quickly discover the best notes for you ✓</h4>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>  
      <?php 
         if (isset($_SESSION['userUid'])) {
             echo'      <div class="container" id="subjects">
         <div class="row" style="font-size: 130px; padding-bottom: 60px;">
            <div class="col-sm-4 text-center">
               <a href="Dashboard/index.php"><i class="fab fa-php"></i><h1>PHP</h1></a>
            </div>
            <div class="col-sm-4 text-center">
               <a href="Dashboard/index.php"><i class="fab fa-java"></i><h1>Java</h1></a>
            </div>
            <div class="col-sm-4 text-center">
               <a href="Dashboard/index.php"><i class="fab fa-js"></i><h1>JavaScript</h1></a>
            </div>
         </div>
      </div>';
         }
         
         else {
            echo'<div class="container-fluid footer" id="subjects">
                  <img class="signInNoticeImg img-fluid" id="plane-footer" src="img/plane.png">
                  <div class="row"> 
                     <h1 id="center-footer-text"> Sign in or create a free PaperTrail account <br>to view our range of subjects and materials</h1> 
                  </div>
               </div>';
         }
         ?>  
   </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
   <script type="text/javascript">
<?php 
               if (isset($_SESSION['userUid'])) {  
                  echo "toastr.success('Welcome to papertrail ".$_SESSION['userUid'].", scroll down to see subjects!')";
               }
               else { 
                  echo "toastr.success('Welcome to papertrail, login to access notes!')";
               }
               ?>

      var sys = arbor.ParticleSystem(4000, 500, 0.5, 55);
      sys.parameters({
             gravity: false
      });
      
      sys.renderer = Renderer("#sitemap");
      var data = {
             nodes: {
                    node1: {
                           "color": "#ffcc00",
                           "shape": "box",
                           "label": "User_1"
                    },
                    node2: {
                           "color": "#ffcc00",
                           "shape": "box",
                           "label": "User_2"
                    },
                    node3: {
                           "color": "#ffcc00",
                           "shape": "box",
                           "label": "User_3"
                    },
                    node4: {
                           "color": "#00b9e4",
                           "shape": "dot",
                           "label": "SIGN ME UP",
                           "link": "signUpPage.php"
                    }
             },
              edges: {
                  node4: {
                      node1: {"color": "#38bd34", weight: 2},
                      node3: {"color": "#00b9e4", weight: 2},
                      node2: {"color": "#f12c2c", weight: 2}
                  }
              }
      };
      sys.graft(data);
   </script>
</html>