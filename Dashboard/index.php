<?php
//     include 'dbh.inc.php';

//     if(session_status() == PHP_SESSION_NONE){
        session_start();

//         header("Location: ../index.php");
//     }else if(session_status() != PHP_SESSION_NONE){
//         header("Location: index.php");
//    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Welcome | Dashboard</title>
    <link rel="shortcut icon" type="image/png" class="img-fluid" href="../../img/plane.png"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="../scripts/js/lib/arbor.js"></script>
    <script src="../scripts/js/lib/graphics.js"></script>
    <script src="../scripts/js/lib/renderer.js"></script>
    <script src="../scripts/rate.js"></script>
    <script src="dash.js"></script>
    <!-- <script src="ajax.js"></script> -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/indexStyle.css">
    <meta charset="UTF-8">
</head>

<body class="dashboard-body">
    <nav class="navbar navbar-expand-md dashNav">
        <a class="navbar-brand" href="../index.php">
            <img src="../img/plane.png" width="30px" height="30px" alt="">
        </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
<div class="dashboard-content"> 
<!--  Control panel-->
    <div class="controlPanel row">
        <div class="panel-top panel row">
            <button type="button"  data-toggle="modal" data-target="#bottomLeft1" class="panelButton">
                <i class="fas fa-cloud-upload-alt panelIcon"></i>
            </button>
        </div>
        <div class="panel-bottom panel row">
            <button type="button" class="panelButton" data-toggle="modal" data-target="#chatModal">
                <i class="fas fa-comments panelIcon"></i>
            </button>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
                <div>
                    <canvas id="dashCanvas" width="auto" height="auto"></canvas>
                </div>
            </div>
    <!--DASH BODY -->
            <div class="row">
                <div class="col-6" id="bottomCenter">
                <?php include "upload.php"; ?>
<?php 

include "rate.php"; 
    if(isset($_GET['comment']))
    {
        if($_GET['comment'] == "success" ){
            echo '<div class="alert alert-success" role="alert">Comment Successful!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
        }else if($_GET['comment'] == "failed" ){
            echo '<div class="alert alert-danger" role="alert">Comment Failed!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
        }
    }
    if(isset($_GET['delete']))
    {
        if($_GET['delete'] == "success" ){
            echo '<div class="alert alert-success" role="alert">Delete Successful!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
        }else if($_GET['comment'] == "failed" || $_GET['comment'] == "notOwner"){
            echo '<div class="alert alert-danger" role="alert">Delete Failed, you do not own this file!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
        }
    }
    ?>
                </div>
            </div>
        </div>
<!-- UPLOAD -->
        <div class="modal fade uploadBlock" id="bottomLeft1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog uploadForm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fileTitle">Upload your file here</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    
                    <div class="modal-body uploadModal">
                        <div class="modal-body" id="drop_zone">
                            <i class="fas fa-cloud-upload-alt" id="formFileIcon"></i>                
                            <form method="post" role="form" enctype="multipart/form-data">
                            <input type="file" name="file" id="file"/>
                        </div>
                        <input type="text" name="filename" class="form-control" id="fileNameUpload" placeholder="Filename..">
                        <input type="text" name="shortDesc" class="form-control" id="fileCommentUpload" placeholder="Please enter a short description.">
                        <input type="checkbox" name="agree" value="Agree" id="uploadCheck" onclick="agreeFunction(this)">Allow us to share your Notes.<br>
                        <button id="send" type="upload" name="upload" class="btn uploadBtn" onclick="uploadCheck()" style="display:none">Upload</button>
                        </form>
                        <p id="fileName"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--Model for upload-->
    <!-- Chat-Modal -->
<div class="modal fade" id="chatModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chatroom</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="chat-container">
            <div id="chat-box" onload="ajax();">
                <div id="chat">
                </div>
            </div>
            <form action="index.php" method="POST">
            <div id="push-container">
                <button style="float: right;" type="submit" name="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
                <textarea id="txtArea" name="message" placeholder="Enter your message"></textarea>
            </div>
        </form>
        <?php include 'submit.php' ;?>
        </div>      
    </div>
    </div>
  </div>
</div>
    <!-- Chat-Modal -->
<!--
    <script onload="loadDoc()">
        //dont touch it, it works, I dont know how
        $('#uploadCheck').on('click', function(){
            $('#send').show(); 
        });
        var sys = arbor.ParticleSystem();
        sys.parameters({stiffness:900, repulsion:2000, gravity:true, dt:0.015});
        sys.renderer = Renderer("#dashCanvas");
        <?php include "show.php";?>
    </script>
    -->
    <script>
</body>
</html>