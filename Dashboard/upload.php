<?php
include "dbh.inc.php";

if (isset($_POST["submit"]))
	{
        $file = $_FILES['file'];

        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
    
        $allowed = array('docx', 'pdf', 'ppt', 'doc', 'pptx');
        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                $sql = mysqli_query($conn, "INSERT INTO `uploaded_notes`(`note_name`, `note_file_index`) VALUES ('".$fileName."','".$fileName."')");
                if($sql){
                    $fileDestination = 'uploads/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo '<div class="alert alert-success" role="alert">Upload Successful!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
                }else{
                    echo '<div class="alert alert-danger" role="alert">Upload Was Too Big!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';

                }
            }
            else{
                echo '<div class="alert alert-danger" role="alert">An error has occurred<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
            }

        }else{
            echo '<div class="alert alert-danger" role="alert">File Type cannot be uploaded!<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
        }
}

?>