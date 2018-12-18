<?php
include "dbh.inc.php";
if (isset($_SESSION['userId'])){

$uid = $_SESSION['userId'];
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
                $sql = mysqli_query($conn, "INSERT INTO `notes`(`name`, `user_id`, `short_desc`, `path`, `file_ext`) VALUES ('".$userFileName."', '".$uid."','".$shortDesc."','".$fileStore."','".$fileActualExt."')");
                if($sql){
                    $fileDestination = 'uploads/'.$fileName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo "toastr.success('Your note was uploaded!')";
                }else{
                    echo "toastr.warning('Something bad happend!')";

                }
            }
            else{
                echo "toastr.warning('There was something wrong with the file!')";
            }
}
}else{
    echo "toastr.error('You must be <a style= \"color: blue; \" href= \"../../signInPage.php \">logged in</a> to see this page!');";
}
?>