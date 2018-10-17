<?php
   session_start();
   ?>
<!doctype node2>
<node2 lang="en">
   <head>
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="arbor-v0.92/lib/arbor.js"></script>
      <script src="arbor-v0.92/lib/graphics.js"></script>
      <script src="arbor-v0.92/lib/renderer.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
   </head>
   <body>
      <?php 
         if(isset($_SESSION['u_id'])){
             echo "You're in ";
             echo $_SESSION['u_name'];
         }
         ?>
      <?php 
         if(isset($_SESSION['u_id'])){
             echo '<form action="includes/logout.inc.php" method="POST">
         <button type="submit" name="submit" class="btn btn-primary">logout</button>
         </form>';
         }else{
             echo '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#signupModal1">Signup</button></br><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#loginModal1">Login</button>';
         }
         ?>
         <?php
         if(isset($_POST['submit'])){
         
            echo "You now have an account";
         }
         ?>
<!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Sign Up Today</button>-->

<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog" role="document">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-body">-->
<!--         <form>-->
<!--            <div class="container">-->
<!--           <div class="row">-->
<!--               <div class="col">-->
<!--                   <button type="button" class="close" id="closeForm" onClick="close()"><span>&times;</span></button>-->
<!--                   <h3>Sign Up</h3>-->
<!--               </div>-->
<!--           </div>-->
<!--           <div class="row">-->
<!--               <div class="col"> <label>Email Address</label><input type="text" type="email" class="form-control" placeholder="Email Address..."></div>-->
<!--           </div>-->
<!--           <div class="form-group row">-->
<!--               <div class="col"><label>Username</label><input type="text" type="username" class="form-control" placeholder="Username..."></div>-->
<!--           </div>-->
<!--           <div class="form-group row">-->
<!--               <div class="col"><label>Password</label><input type="password" type="password" class="form-control" placeholder="Password..."></div>-->
<!--           </div>-->
<!--           <div class="form-group row">-->
<!--               <div class="col"><label>Confirm Password</label><input type="text" type="password" class="form-control" placeholder="Password..."></div>-->
<!--           </div>-->
<!--           <div class="form-group row">-->
<!--               <div class="col"> <button type=" submit" class="btn btn-primary btn-block">Sign Up</button></div>-->
<!--           </div>-->
<!--           <div class="row">-->
<!--               <div class="col"><span>Already have an account? <a href="#">Sing In</a></span></div>-->
<!--           </div>-->
<!--           </div>-->
<!--       </form>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->

      <div class="modal fade" tabindex="-1" id="signupModal1" data-keyboard="false" data-backdrop="static">
         <div class="modal-dialog modal-sm">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <form action="includes/signup.inc.php" method="POST">
                     <div class="form-group">
                        <label for="inputUserName">Username</label>
                        <input type="text" name="name" class="form-control" placeholder="Username" />
                     </div>
                     <div class="form-group">
                        <label for="inputUserName">Email</label>
                        <input type="text" name="email" class="form-control" placeholder="Email"/>
                     </div>
                     <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Password"/>
                     </div>
                     <button type="submit" name="submit" class="btn btn-primary">Sign up</button>
                  </form>
               </div>
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
      
      <div class="modal fade" tabindex="-1" id="loginModal1" data-keyboard="false" data-backdrop="static">
         <div class="modal-dialog modal-sm">
            <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               
               <div class="modal-body">
                  <form action="includes/login.inc.php" method="POST">
                     <div class="form-group">
                        <label for="inputUserName">Username</label>
                        <input type="text" name="name" class="form-control" placeholder="Username" />
                     </div>
                     <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input type="password" name="pwd" class="form-control" placeholder="Password"/>
                     </div>
                     <button type="submit" name="submit" class="btn btn-primary">Login</button>
                  </form>
               </div>
               
               <div class="modal-footer">
               </div>
            </div>
         </div>
      </div>
      <div>
         <a href="landing.php">Home Test</a>
      </div>
      <canvas id="viewport"></canvas>
      <script type="text/javascript">
         // var sys = arbor.ParticleSystem(1000, 400, 1);
         // sys.parameters({
         //     gravity: true
         // });
         
         // sys.renderer = Renderer("#viewport");
         // var data = {
         //     nodes: {
         //        node1: {
         //             "color": "#6108a7",
         //             "shape": "dot",
         //             "label": "Rob"
         //        },
         //        node2: {
         //             "color": "#8a2f0d",
         //             "shape": "dot",
         //             "label": "Lorcan"
         //        },
         //        node3: {
         //             "color": "#f8d159",
         //             "shape": "dot",
         //             "label": "Ayo"
         //        },
         //        node4: {
         //             "color": "#8a2f0d",
         //             "shape": "dot",
         //             "label": "enter"
         //        },
         //        node5: {
         //             "color": "#8a2f0d",
         //             "shape": "dot",
         //             "label": "some"
         //        },
         //     },
         //     edges: {
         //        node2: {
         //             node1: {},
         //             node3: {},
         //             node4: {},
         //             node5: {}
         //        },
         //        node1: {
         //             node2: {},
         //             node3: {}
         //        },
         //        node2: {
         //             node1: {},
         //             node3: {}
         //        },
         //        node4: {
         //             node2: {}
         //        },
         //        node5: {
         //             node2: {}
         //        }
         //     }
         // };
         // sys.graft(data);
      </script>
   </body>
</node2>