<!doctype html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <title>Papertrail - Dashboard</title>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="../arbor-v0.92/lib/arbor.js"></script>
        <script src="../arbor-v0.92/lib/graphics.js"></script>
        <script src="../arbor-v0.92/lib/renderer.js"></script>
        <script src="../script/tutorialGraph.js"></script>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <a class="navbar-brand" href="#">
         <img src="logo.png" width="100%" height="100%" alt="">
         </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
         <span class="navbar-toggler-icon"></span>
         </button>
            <div class="navbar-collapse collapse" id="collapsingNavbar">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-target="#myModal" data-toggle="modal">My Profile</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <canvas id="viewport" width="1366" height="768"></canvas>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="button" id="bottomLeft" class="rounded-circle btn btn-primary" data-toggle="modal" data-target="#bottomLeft1"><i class="fas fa-plus"></i></button>
                </div>
                <div class="col-sm">
                    <?php
                        include "dbh.inc.php";
                        if (isset($_POST["submit"]))
                    	{
                        	$allow = array('pdfs');
                        	$temp = explode(".", $_FILES["pdf_file"]["name"]);
                        	$extension = end($temp);
                        	$upload_pdf = $_FILES["pdf_file"]["name"];
                        	move_uploaded_file($_FILES["pdf_file"]["tmp_name"], "uploads/pdf/" . $_FILES["pdf_file"]["name"]);
                        	$sql = mysqli_query($conn, "INSERT INTO `shared_notes`(`pdf_file`)VALUES('" . $upload_pdf . "')");
                        	if ($sql)
                    		{
                    		    echo '<div class="alert alert-success" role="alert">Upload Successful!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';

                    		}
                    	    else
                		    {
                    		    echo '<div class="alert alert-danger" role="alert">Upload Failed!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
                    		}
                    	}
                    ?>
                </div>
                <div class="col-sm">
                    <button type="button" id="bottomRight" class="rounded-circle btn btn-primary"><i class="fas fa-comments"></i></button>
                </div>
            </div>
        </div> 
        <!---->

        <!--Model for upload-->
        <!-- Modal -->
        <div class="modal fade" id="bottomLeft1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1>Upload Notes</h1>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-body" id="drop_zone" ondrop="drag_drop(event)" ondragover="return false">
                        <i class="fas fa-file-upload"></i>
                        <form method="post" role="form" enctype="multipart/form-data">
                            <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf" />
                            <button id="send" type="submit" name="submit" class="btn btn-success">Submit</button>
                        </form>
                    </div>
                    <p id="fileName"></p>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Share</button>
                    </div>
                </div>
            </div>
        </div>
        <!--Model for upload-->
        <script type="text/javascript">
        
            var sys = arbor.ParticleSystem(1000, 400, 1);
            sys.parameters({
                gravity: true
            });
            
            sys.renderer = Renderer("#viewport");
            var data = {
                nodes: {
                    node1: {
                        "color": "#007bff",
                        "shape": "dot",
                        "label": "Database Slides 1",
                    },
                    node2: {
                        "color": "#007bff",
                        "shape": "dot",
                        "label": "Database Slides 2",
                    },
                    node3: {
                        "color": "#007bff",
                        "shape": "dot",
                        "label": "Database Slides 3",
                    },
                    node4: {
                        "color": "#007bff",
                        "shape": "dot",
                        "label": "Database Slides 4",
                    },
                },
                edges: {}
            
            };
            sys.graft(data);
        
        </script>
    </body>
    <style type="text/css">
        html,
body {
    width: 100%;
    height: 100%;
    margin: 0px;
    border: 0;
    overflow: hidden;
    /*  Disable scrollbars */
    display: block;
    /* No floating content on sides */
}

#bottomRight {
    position: fixed;
    bottom: 100px;
    right: 100px;
    height: 100px;
    width: 100px;
    font-size: 50px;

}

#bottomCenter {
    position: fixed;
    bottom: 100px;
    left: 500px;
    height: 100px;
    width: 100px;
    font-size: 50px;
}

#bottomLeft {
    position: fixed;
    bottom: 100px;
    left: 100px;
    height: 100px;
    width: 100px;
    font-size: 50px;
}

#drop_zone {
    border: #007BFF 2px dashed;
    width: 100%;
    height: 100%;
    padding: 50px;
    font-size: 20px;
    text-align: center;

}

    </style>
</html>
