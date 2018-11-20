<?php
include "../dbh.inc.php";

if (isset($_POST["upload"]))
	{
        $file = $_FILES['file'];
        $userFileName = $_POST['filename'];
        $shortDesc = $_POST['shortDesc'];
        $fileName = $_FILES['file']['name'];
        $fileStore = "uploads/".$fileName;
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
    
            if($fileError === 0){
                $sql = mysqli_query($conn, "INSERT INTO `notes`(`name`, `short_desc`, `path`, `file_ext`) VALUES ('".$userFileName."', '".$shortDesc."','".$fileStore."','".$fileActualExt."')");
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
}
?>