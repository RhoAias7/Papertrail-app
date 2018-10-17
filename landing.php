<!DOCTYPE html>
<html>
   
   <head>
      <link rel="shortcut icon" type="image/png" class="img-fluid" href="../../img/plane.png"/>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>      
      <meta name="viewport" content="width=device-width, inital-scale=1" charset="utf-8">
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
     
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="arbor-v0.92/lib/arbor.js"></script>
      <script src="arbor-v0.92/lib/graphics.js"></script>
      <script src="arbor-v0.92/lib/renderer.js"></script>
     
      <link rel="stylesheet" href="../../css/indexStyle.css"/>
   
   </head>
   
   <body>
<!--NAVIGATION-->
      <nav class="navbar navbar-expand-md navbar bg-primary">
         <a class="navbar-brand" href="landing.php">
            <img src="../../img/plane.png" height="50px">
         </a> 
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav ml-auto">
               <!--<li class="nav-item active">-->
               <!--   <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Home</a>-->
               <!--</li>-->
               <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#SignInModal" data-whatever="@getbootstrap">Sign In</a>
               </li>
               
            </ul>
         </div>
      </nav>
<!--LANDING CTA-->
      <header class="masthead text-center head jumbotron">
         <div class="container">
            <div class="row">
               <div class="col-md-1">
               </div>
               <div class="col-md-10">
                  <h1 class="landing">JOIN YOUR PEERS TODAY TO SHARE AND EXPLORE OUR VAST LIBRARIES OF YOUR STUDY MATERIAL!</h1>
                  <button type="button" class="btn signIn" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Sign Up Today</button>
               </div>
               <div class="col-md-1">
               </div>
            </div>
         </div>
      </header>
<!--SIGN UP MODAL-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         
         <!--ADDED ACTION ON FORM TAG & GAVE INPUTS NAMES-->
         <form action="../regSystem/signUp.php" method="POST">
            <div class="container">
               <div class="row">
                  <div class="col">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h3>Sign Up</h3>
                     <p class="formDesc">It's free and only takes a minute.</p>
                  </div>
                </div>
            <div class="row">
               <div class="col"> <label>Email Address</label><input type="text" type="email" name="email" class="form-control" placeholder="Email Address..."></div>
            </div>
            <div class="form-group row">
               <div class="col"><label>Username</label><input type="text" type="username" name="username" class="form-control" placeholder="Username..."></div>
            </div>
            <div class="form-group row">
               <div class="col"><label>Password</label><input type="password" type="password" name="user_pwd" class="form-control" placeholder="Password..."></div>
            </div>
            <div class="form-group row">
               <div class="col"><label>Confirm Password</label><input type="text" type="password" name"confirm_pwd" class="form-control" placeholder="Password..."></div>
            </div>
            <div class="form-group row">
               <div class="col"> <button type="submit" name"submit" class="btn btn-block">Sign Up</button></div>
            </div>
            <div class="row">
               <div class="col"><span>Already have an account? <a href="#" class="signIn" data-toggle="modal" data-target="#SignInModal" data-dismiss="exampleModal">Sign In</a></span></div>
            </div>
            </div>
         </form>
         
         <!--ADDED LOGOUT TEST BUTTON-->
         <form action="includes/logout.php" method="post">
            <button type="submit" name="logout">Logout</button>
         </form>
      </div>
    </div>
  </div>
</div>

<!--SIGN IN MODAL-->
<div class="modal fade" id="SignInModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
         
         <!--ADDED ACTION ON FORM TAG & GAVE INPUTS NAMES-->
         <form action="../regSystem/login.php" method="post">
            <div class="container">
               <div class="row">
                  <div class="col">
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h3>Sign In</h3>
                     <p class="formDesc">Sign into your PaperTrail Account!</p>
                  </div>
                </div>
               <br>
               <br>
               <br>
               <br>
               <br>
            <div class="form-group row">
               <div class="col"><label>Username</label><input type="text" type="username" name="username" class="form-control" placeholder="Username..."></div>
            </div>
            <div class="form-group row">
               <div class="col"><label>Password</label><input type="password" type="password" name="user_pwd" class="form-control" placeholder="Password..."></div>
            </div>
            <br>
            <div class="row">
               <div class="col"> <button type="submit" name="login" class="btn btn-block formSignIn" data-dismiss="SignInModal">Sign In</button></div>
            </div>
            </div>
         </form>
      </div>
    </div>
  </div>
</div>
<!--DESCRIPTION-->
      <div class="container">
         <div class="row">
            <div class="col-md-6 info text-center">
               <h3 class="what">What is PaperTrail?</h3>
               <div class="leftAlign">
                  <h5>Share your notes ✓</h5>
                  <h5>View your peers' notes ✓</h5>
                  <h5>Rate uploaded material ✓</h5>
                  <h5>Quickly discover notes tailored for you ✓</h5>
               </div>
            </div>
            <div class="col-md-6 info-image">
               <img src="../../img/nodes.png" width="100%" height="100%">
            </div>
         </div>
      </div>
      <br>
      <br>
<!--TUTORIAL-->
      <div class="container">
         <br>
         <div class="row">
         <div class="col-md-6">
            <h3 class="tutorial" style="color:#00b9e4">How Does It Work?</h3>
            <div class="tutText">
               <p>Using PaperTrail is very easy. After selecting your subject, you will be taken to the <i>Subject Canvas.</i> 
               Here you will find the core of PaperTrail, A network of study notes and all of your peers interactions.
               <li>Uploaded material is represtented as circle <i>Nodes,</i></li>
               <li>Users that have interacted with a file are respresented by a <i>Square</i></li>
               <li>Comments can be read whn you hover over and <i>Edge</i> connected users to Files</li></p>
            </div>
         </div>
         
         <div class="col-md-6">
            <h3 style="color:#00b9e4">Why is PaperTrail Easier?</h3>
               <p>PaperTrail uses visualization to make it easier for you to decide what notes you want to downloand and use.<br>
               There are 3 ratings you can give an uploaded material:
               <ol class="tutRate" style="color:#38bd34"><b >Perfect:</b> represented by a Green <i>Edge</i></ol>
               <ol class="tutRate" style="color:#00b9e4"><b >Relevant:</b> represented by a Blue <i>Edge</i></ol>
               <ol class="tutRate" style="color:#f12c2c"><b >Irrelevant:</b> represented by a Red <i>Edge</i></ol>
               </p>
            </div>
         </div>
         <br>
         <br>
         <div class="row">
            <div class="col-md-3"></div>
            
            <div class="col-md-6">
               <div style="background-color:black">
                  <canvas id="tutorialExample" width="600px" height="600px"></canvas>
               </div>
            </div>
            
            <div class="col-md-3"></div>
            
         </div>
           
      </div>
      <br>
      
<!--SUBJECT SELECITON-->
<div class="container">
   <div class="row col-md-3"></div>
   
   <div id="carousel" class="row col-md- carousel slide" data-ride="carousel">
     
     <ol class="carousel-indicators">
       <li data-target=".carousel" data-slide-to="0" class="active"></li>
       <li data-target=".carousel" data-slide-to="1"></li>
       <li data-target=".carousel" data-slide-to="2"></li>
     </ol>
     
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img class="d-block w-10" src="img/html-5.png" alt="First slide">
       </div>
       <div class="carousel-item">
         <img class="d-block w-10" src="img/java.png" alt="Second slide">
       </div>
       <div class="carousel-item">
         <img class="d-block w-100" src="img/mysql.png" alt="Third slide">
       </div>
     </div>
     
     <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="sr-only">Previous</span>
     </a>
     <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="sr-only">Next</span>
     </a>
   </div>
</div>


   </body>
   
   <script type="text/javascript">
         var sys = arbor.ParticleSystem(1000, 400, 1);
         sys.parameters({
             gravity: true
         });
         
         sys.renderer = Renderer("#tutorialExample");
         var data = {
             nodes: {
                 node1: {
                     "color": "#FFC6D0",
                     "shape": "dot",
                     "label": "Obj Prog"
                 },
                 node2: {
                     "color": "#8a2f0d",
                     "shape": "dot",
                     "label": "Lorcan"
                 },
                 node3: {
                     "color": "#f8d159",
                     "shape": "dot",
                     "label": "Ayo"
                 },
                 node4: {
                     "color": "#8a2f0d",
                     "shape": "dot",
                     "label": "enter"
                 },
                 node5: {
                     "color": "#8a2f0d",
                     "shape": "dot",
                     "label": "some"
                 },
             },
             edges: {
                 node2: {
                     node1: {},
                     node3: {},
                     node4: {},
                     node5: {}
                 },
                 node1: {
                     node2: {},
                     node3: {}
                 },
                 node2: {
                     node1: {},
                     node3: {}
                 },
                 node4: {
                     node2: {}
                 },
                 node5: {
                     node2: {}
                 }
             }
         };
         sys.graft(data);
      </script>
</html>