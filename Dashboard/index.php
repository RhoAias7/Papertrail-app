<?php session_start(); ?> 
    <!DOCTYPE html>
    <html>
    <style>
    </style>
    <head>
    <link rel="shortcut icon" type="image/png" class="img-fluid" href="../img/plane.png">
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Papertrail - Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/style.css">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="../scripts/js/lib/arbor.js"></script>
        <script src="../scripts/js/lib/graphics.js"></script>
        <script src="../scripts/js/lib/renderer.js"></script>
        <script src="../scripts/rate.js"></script>
        <script src="dash.js"></script>
        <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    </head>
    <body>
        <section>
            <nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
                <div class="d-flex flex-grow-1">
                <span class="w-100 d-lg-none d-block">
                </span>
                <a class="navbar-brand d-none d-lg-inline-block" href='../index.php'><img src="../img/plane.png" height="60px"></a>
                <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="index.php">
                <img src="../img/plane.png" height="60px" alt="logo">
                </a>
                <div class="w-100 text-right">
                </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <canvas id="dashCanvas" width="auto" height="auto"></canvas>
                </div>
                </div>
                <div class="row">
                <div class="col-md-4">
                    <button type="button" id="bottom-left" class="btn btn-primary" data-toggle="modal" data-target="#modal1"><i class="fas fa-cloud-upload-alt"></i></button>
                </div>
                <div class="col-md-4">
                    <button type="button" id="bottom-center" class="btn btn-primary" data-toggle="modal" data-target="#modal2"><i class="fas fa-question"></i></button>
                    
                </div>
                <div class="col-md-4"> 
                    <button id="bottom-right" type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal3"><i class="fas fa-comments"></i></button>
                </div>
                </div>
            </div>
            
        </section>
        <!-- Upload Modal -->
        <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Share Your Notes</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8 upload-panel" style="text-align: center;margin: 0 auto;padding-bottom: 20px;padding-top: 10px;">
                            <i class="fas upload-icon fa-cloud-upload-alt"></i> 
                            <form method="post" role="form" enctype="multipart/form-data">
                                <input type="file" name="file" id="file"/>
                                <input type="text" name="filename" class="form-control" id="fileNameUpload" placeholder="Filename.." style="margin-bottom: 10px;margin-top: 10px;">
                                <input type="text" name="shortDesc" class="form-control" id="fileCommentUpload" placeholder="Please enter a short description." style="margin-bottom: 20px;">
                                <input type="checkbox" name="agree" value="Agree" id="uploadCheck">Allow us to share your Notes.<br>
                                <button id="send" type="upload" name="upload" class="btn btn-primary" style="margin-top: 10px;display:none; background: #009be4">Upload</button>
                            </form>
                            </div>
                            <div class="col-md-2">
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Upload Modal -->
        <!-- Legend Modal -->
        <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/note.png" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is an uploaded note</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/userNote.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is a note uploaded by you</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/user.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is a student</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/userNow.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is you</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/good.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is a positive comment</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/ok.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is a relevant comment</h3>
                            </div>
                            </div>
                            <div class="carousel-item ">
                            <img class="img-thumbnail rounded mx-auto d-block" src="../img/bad.png" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h3 class="slide-text">This is a negative comment</h3>
                            </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <i class="arrow fas fa-arrow-left"></i>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <i class="arrow fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Legend Modal -->
        <!-- Chat Modal -->
        <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="container">
                        <div id="chat-box" onload="ajax();">
                            <div id="chat">
                            </div>
                        </div>
                        <form action="index.php" method="POST">
                            <div id="push-container">
                                <textarea id="txtArea" name="message" placeholder="Enter your message"></textarea>
                                <button style=" background: #009be4" type="submit" name="submit" class="btn btn-primary"><i class="fas fa-arrow-right"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- Chat Modal -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
                <?php include 'includes/submit.php' ;?>

            <?php include "includes/upload.php"; ?>
            
            $('#uploadCheck').on('click', function(){
                $('#send').show(); 
            });
            //render arborjs
            var sys = arbor.ParticleSystem();
            sys.parameters({stiffness:900, repulsion:2000, gravity:true, dt:0.015});
            sys.renderer = Renderer("#dashCanvas");
            <?php include "includes/show.php";?>
            //render arborjs
            
            //resize canvas window 
            function resize(){    
                $("#dashCanvas").outerHeight($(window).height()-$("#dashCanvas").offset().top- Math.abs($("#dashCanvas").outerHeight(true) - $("#dashCanvas").outerHeight()));
            }
            $(document).ready(function(){
                resize();
                $(window).on("resize", function(){                      
                    resize();
                });
            });
            //resize canvas window
            
            <?php 

    if(isset($_GET['comment']))
    {
        if($_GET['comment'] == "success" ){
            echo "toastr.success('You commented!')";
        }else if($_GET['comment'] == "failed" ){
            echo "toastr.warning('Something went wrong, try again')";
        }
    }
    if(isset($_GET['delete']))
    {
        if($_GET['delete'] == "success" ){
            echo "toastr.success('You deleted a note!')";
        }else if($_GET['comment'] == "failed" || $_GET['comment'] == "notOwner"){
            echo "toastr.warning('You don't own this note!)";
        }
    }
    ?>
        </script>
    </body>
    </html>