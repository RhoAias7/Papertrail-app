<?php 
include "../dbh.inc.php";



// if(isset($_POST['name'])){
//     $userAnswer = $_POST['name']; 
//     echo $userAnswer;
//   }

if(isset($_POST['rate'])){
    $rating=$_POST['rate'];
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

if (isset($_POST['usrComment'])) { 
    // if(isset($_POST["some"])){
        $node_name  = $_POST['some'];
        echo '<div class="alert alert-success" role="alert">'.$node_name.'<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
    // }
    $r = $rate;
    $c = $_POST['usrComment'];
    $note = $node_name;
    $sql = mysqli_query($conn, 'INSERT INTO `reviews`(`user_id`, `note_id`, `rating`, `comment`) VALUES (11, "'.$node_name.'", "'.$r.'", "'.$c.'")');
    if($sql){
        echo '<div class="alert alert-success" role="alert">Comment Sent<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
    }
}    
?>

