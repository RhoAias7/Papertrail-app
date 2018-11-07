<!doctype html>
<html lang="en">
   <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <title>Papertrail - Dashboard</title>
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
      <script src="../stuff/js/lib/arbor.js"></script>
      <script src="../stuff/js/lib/graphics.js"></script>
      <script src="../stuff/js/lib/renderer.js"></script>
      <!-- <script src="main.js"></script> -->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
      <link rel="stylesheet" href="../css/indexStyle.css"> 
   </head>
   <body>
      <nav class="navbar navbar-expand-md navbar-dark bg-primary">
         <a class="navbar-brand" href="../../landing.php">
         <img src="log.png" width="50px" height="50px" alt="">
         </a> <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="navbar-collapse collapse" id="collapsingNavbar">
            <ul class="navbar-nav ml-auto">
<!--
               <li class="nav-item active">
                  <a class="nav-link" href="../landing.php" data-target="#myModal" data-toggle="modal">Home</a>
               </li>
               <li class="nav-item active">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Rating</button>               
               </li>
-->
            </ul>
         </div>
      </nav>
	   <li class="nav-item active">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Rating</button>               
               </li>
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog dashForm" role="document">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="fileTitle">Filename.doc</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
				
               <div class="modal-body">
                  <div class="container-fluid">
					  <div class="row">
						  <div class="col-5"></div>
					  	<i class=" formFileIcon fas fa-file-download"></i>
						
						<div class="fileAction col-5">
                           <button type="button" class="btn btnDown"><i class="fas fa-file-download"></i></button>
							<button type="button" class="btn btnDelete"><i class="fas fa-trash-alt"></i></button>
                        </div> 
					  </div>
					  <br>
					  <div  class="fileDesc">
					  <p id="fileDescription">This is filler text, this will contain the quick description of the file inserted when a user uploads a doc.</p>
					  </div>
					  
					  <div class="row"> 
						  <div class="col-2"></div>
						  <form class="form-group">
						  <ul>
							<li><input type="checkbox btnRate" name="rating">Perfect</input></li>
						 	<li><input type="checkbox" name="vehicle" value="Bike">Relevant</input></li>
				   			<li><input type="checkbox" name="vehicle" value="Bike">Irelevant</input></li>
	  
						</ul>
						  </form>
                           <button type="button" class="col-2 btn btnRate" id="per">Perfect</button>
							<div class="col-1"></div>
							<button type="button" class="col-2 btn btnRate" id="rel"><input type="checkbox" name="vehicle" value="Bike">Relevant</input> </button>
							<div class="col-1"></div>
							<button type="button" class=" col-2 btn btnRate"
							id="irel">Irelevant</button>
                     </div>
					 <br>
					  
                     <form>
                        <div class="form-group">
                           <label for="formGroupExampleInput">Have your say..</label>
                           <input type="text" class="form-control" id="userComment" placeholder="What are your thoughts on this file?">
							<button type="submit" class="btn sumit">Submit</button>
                        </div>
                     </form> 
                  </div>
				</div>
            </div>
         </div>
      </div>
	   
      <div class="container-fluid">
         <div class="row">
            <div class="">
               <canvas id="viewport" width="1366" height="768"></canvas>
            </div>
         </div>
         <div class="row">
            <div class="col-6">
               <button type="button" id="bottomLeft"  class="dashControl" data-toggle="modal" data-target="#bottomLeft1"><p><i class="fas fa-cloud-upload-alt"></i> </p></button>
            </div>
            <div class="col-" id="bottomCenter">
              <?php include "upload.php"; ?>
            </div>
            <div class="col-sm">
               <button type="button" id="bottomRight" class="dashControl"><p><i class="fas fa-comments"></i></p</button>
            </div>
         </div>
      </div>
      <!--Model for upload-->
      <!-- Modal -->
      <div class="modal fade" id="bottomLeft1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog uploadForm" role="document">
            <div class="modal-content">
               
				<div class="modal-header">
                  <h5 class="fileTitle">Upload your file here</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
				
               <div class="modal-body uploadModal">
              
               <div class="modal-body" id="drop_zone" ondrop="drag_drop(event)" ondragover="return false">
				   <i class="fas fa-cloud-upload-alt" id="formFileIcon"></i>                
				   <form method="post" role="form" enctype="multipart/form-data">
                     <input type="file" name="file" id="file"/>
               </div>
				   <br>
					 <input type="text" class="form-control" id="fileNameUpload" placeholder="Filename..">
				   <select name="Filetype" class="form-control" id="fileDrop">
						<option value="worddoc">Word Document</option>
						<option value="ppoint">Power Point</option>
						<option value="pdf">Pdf</option>
						<option value="mp4">MP4 Video</option>
					   <option value="mp3">MP3 Audio</option>
				  </select>
					   <input type="text" class="form-control" id="fileCommentUpload" placeholder="Please enter a short description.">
				   		<input type="checkbox" name="vehicle" value="Agree">Allow us to share your Notes.<br>
                     <button id="send" type="submit" name="submit" class="btn uploadBtn">Upload</button>
                  </form>
               <p id="fileName"></p>
				   </div>
            </div>
         </div>
      </div>
      <!--Model for upload-->
      <script>
         var sys = arbor.ParticleSystem(20);
         sys.parameters({
                gravity: false
         });
         
         sys.renderer = Renderer("#viewport");
         var data = {
                nodes: {
                       node1: {
                              color: "#70D7FF",
                              shape: "dot",
                              label: "Database Slides 1",
                              link: "uploads/pdfs/1_ADV_Database Review.pdf"
                       },
                },
         };
         
         sys.graft(data);
      </script>
   </body>

</html>