<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $message= $_POST['message'];
    $query = "INSERT INTO `chatroom`(`name`, `message`) VALUES ('$name', '$message')";
    $run = $conn->query($query);
}
?>