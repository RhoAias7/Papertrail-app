<?php 
include "dbh.inc.php";

if(isset($_POST['insert1'])){
    $rating=$_POST['insert1'];
   if($rating=="good"){
        $rate=3;
   }
   else if($rating=="meh"){
        $rate=2;
    }
    if($rating=="bad"){
       $rate=1;
    }
}

if (isset($_POST['comment'])) { 
    $r = $rate;
    $c = $_POST['comment'];

    $sql = mysqli_query($conn, 'INSERT INTO `reviews`(`user_id`, `note_id`, `rating`, `comment`) VALUES (11, 9, "'.$r.'", "'.$c.'")');
    if($sql){
        echo '<div class="alert alert-success" role="alert">Comment Sent<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
    }
}    
?>

