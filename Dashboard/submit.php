<?php 
if(isset($_POST['submit'])){
    $name = $_SESSION['userUid'];
    $message = $_POST['message'];
    $query = "INSERT INTO `chatroom`(`name`, `message`) VALUES ('$name', '$message')";
    $run = $conn->query($query);
}
?>