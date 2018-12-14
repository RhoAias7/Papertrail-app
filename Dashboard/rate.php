<?php 
include 'dbh.inc.php';
session_start();


$uid = $_SESSION['userId'];
if(isset($_GET['name'])){
    $nodeID = $_GET['name'];
}

if(isset($_POST['rate'])){
    $rating=$_POST['rate'];
   if($rating=='good'){
        $rate=3;
   }
   else if($rating=='meh'){
        $rate=2;
    }
    if($rating=='bad'){
       $rate=1;
    }
}

if (isset($_POST['send'])) { 
    $r = $rate;
    $n = $nodeID;
    $c = $_POST['usrComment'];
    $query = 'INSERT INTO `review_notes`(`user_id`, `note_id`, `rating`, `comment`) VALUES ('.$uid.', '.$n.', '.$r.', "'.$c.'")';
    $sql = mysqli_query($conn, $query) or die ('Error updating database: '.mysqli_error($conn));
    if($sql){
        header("Location: index.php?comment=success");
    }else{
        header("Location: index.php?comment=failed");
    }
} 

if(isset($_POST['delete'])){
    $query = "SELECT * FROM `notes`";

    $sql = mysqli_query($conn, $query) or die ('Error updating database: '.mysqli_error($conn));

    $usrid = $row['user_id'];
    $noteid = $row['note_id'];

    $n = $nodeID;
    if($usrid == $noteid){
        $query = 'DELETE FROM `review_notes` WHERE `note_id` = '.$n.'';
        $query1 = 'DELETE FROM `notes` WHERE `note_id` = '.$n.'';
        $sql = mysqli_query($conn, $query) or die ('Error updating database: '.mysqli_error($conn));
        $sql1 = mysqli_query($conn, $query1) or die ('Error updating database: '.mysqli_error($conn));
        if($sql && $sql1){
            header("Location: index.php?delete=success");
        }else{
            header("Location: index.php?delete=failed");
        }
    }else{
        header("Location: index.php?delete=notOwner");
    }
}



?>

