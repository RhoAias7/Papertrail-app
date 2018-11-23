<?php 
session_start();
?>
<!DOCTYPE html>
<html>
   
   <head>
    <title>PaperTrail</title>
           <link rel="shortcut icon" type="image/png" class="img-fluid" href="../../img/plane.png"/>
           <meta name="viewport" content="width=device-width, inital-scale=1" charset="utf-8">
           <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>      
           <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
           <script src="stuff/js/jquery-1.6.1.min.js"></script>
           <script src="stuff/js/jquery.address-1.4.min.js"></script>
           <script src="stuff/js/lib/arbor.js"></script>
           <script src="stuff/js/lib/arbor-tween.js"></script>
           <script src="stuff/js/lib/graphics.js"></script>
           <script src="stuff/js/lib/renderer.js"></script>
           <link rel="stylesheet" href="css/indexStyle.css"/>
   </head>
   
   <body>
<!--NAVIGATION-->
      <nav class="navbar navbar-expand-md navbar bg-primary">
         <a class="navbar-brand" href="landing.php">
            <img src="img/plane.png" height="30px">
         </a> 
         
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
         </button>
         <?php 
            if (isset($_SESSION['userUid'])) {
                
                echo '<div class="navbar-collapse collapse" id="collapsingNavbar">
                    <form action="regSystem/logout.php" method="post">
                            <button type="submit" name="logout-submit" class="btn">Logout</button>
                    </div>';
            }
            
            else {
                   
                   echo '<div class="navbar-collapse collapse" id="collapsingNavbar">
                    <a href="signInPage.php" class="btn navBtn">Sign In</a>
                    </div>';
                   
            }
         ?>
      </nav>
        <!--LANDING CTA-->
          <div class="container-fluid zero">
             <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10 landing">
                   <h1 class="cta">Join your peers today to share and explore our vast libraries of your study material.</h1><br>
           		    <a href="signUpPage.php" class="btn signIn">Sign Up Today</a>
                </div>
                <div class="col-md-1"></div>
             </div>
          </div>
        
        <!--DESCRIPTION-->
          <div class="container-fluids one">
             <div class="row">
        		 <div class="col-1"></div>
                <div class="col-md-6 info text-center">
                   <h3 class="what">What is PaperTrail?</h3>
                   <div class="leftAlign">
                      <h4>Share your notes ✓</h4>
                      <h4>View your peers' notes ✓</h4>
                      <h4>Rate uploaded material ✓</h4>
                      <h4>Quickly discover the best notes for you ✓</h4>
                   </div>
                </div>
                <div class="col-md-5 info-image">
                   <img src="img/nodes.png" width="100%" height="100%">
                </div>
             </div>
          </div>
        <!--TUTORIAL-->
          <div class="container-fluid two">
             <div class="row">
        		 <div class="col-1"></div>
        		 <div class="col-5 tutSection">
        			<h3 class="tutHeader">How Does It Work?</h3>
        			<div class="tutText">
        				<p>Using PaperTrail is very easy</p>
        				<p>After selecting your subject, you will be taken to the <i>Subject Canvas.</i> 
        				   Here you will find the core of PaperTrail, a network of study notes and all of your peers interactions.
        				   <li>Uploaded material is represtented as circle <i>Nodes</i></li>
        				   <li>Users that have interacted with a file are respresented by a <i style="color:#ffcc00">Block</i></li>
        				   <li>Comments can be viewed when you hover over an <i style="color:#38bd34">Edge</i> denoted as a link</li>
        				</p>
        				<p>PaperTrail uses visualization to make it easier for you to decide what notes you want to downloand and use<br>
        				   There are 3 ratings you can give an uploaded material:
        				   <ol class="tutRate" style="color:#38bd34"><b >Perfect:</b> represented by a Green Edge</ol>
        				   <ol class="tutRate" style="color:#00b9e4"><b >Relevant:</b> represented by a Blue Edge</ol>
        				   <ol class="tutRate" style="color:#f12c2c"><b >Irrelevant:</b> represented by a Red Edge</ol>
        				</p>
        			</div> 
        		 </div>
        	  
        		 <div class="col-6 graph">
        			<div>
                  <canvas id="sitemap" width="400" height="400"></canvas>
        			</div>
        		  </div>
             </div>
           </div>
        <br>

<!--SUBJECT SELECITON-->
<div class="container-fluid three">
   <div class="row subHeader"><h3 class="selectSub">Choose your subject <?php if (isset($_SESSION['userUid'])) { echo $_SESSION['userUid']; }?></h3></div> 
   <div class="row">
      
      <div class="col-2"></div>
      
      <div class="card-deck col-8">
        <div class="card">
          <img class="card-img-top" src="img/java.png" alt="Card image cap" >
          <div class="card-body">
            <h3 class="card-title">Java</h3>
            <a href="#" class="card-link">→</a>
          </div>
        </div>
        
        <div class="card">
          <img class="card-img-top" src="img/csharp.png" alt="Card image cap" >
          <div class="card-body">
            <h3 class="card-title">C#</h3>
            <a href="#" class="card-link">→</a>
          </div>
        </div>
        
        <div class="card">
          <img class="card-img-top" src="img/python.png" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">Python</h3>
            <a href="#" class="card-link">→</a>
           </div>
         </div>
      </div>
      
      <div class="col-2"></div>
   </div>

   <div class="row">
      <div class="col-2"></div>
      <div class="card-deck col-8">
        <div class="card">
          <img class="card-img-top" src="img/mysql.png" alt="Card image cap" >
          <div class="card-body">
            <h3 class="card-title">MySQL</h3>
            <a href="Dashboard/index.php" class="card-link">→</a>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="img/plane.png" alt="Card image cap" >
          <div class="card-body">
            <h3 class="card-title">SubjectX</h3>
            <a href="#" class="card-link">→</a>
          </div>
        </div>
        <div class="card">
          <img class="card-img-top" src="img/plane.png" alt="Card image cap">
          <div class="card-body">
            <h3 class="card-title">SubjectY</h3>
            <a href="#" class="card-link">→</a>
           </div>
         </div>
      </div>
      <div class="col-2"></div>
   </div>
</div>
	
<br>
   </body>
   
 <script type="text/javascript">
              var sys = arbor.ParticleSystem(1000, 200, .5);
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
                              node1: {"color": "#38bd34",},
                              node3: {"color": "#00b9e4",},
                              node2: {"color": "#f12c2c",}
                          }
                         
                      }
              };
              sys.graft(data);
       </script>
</html>