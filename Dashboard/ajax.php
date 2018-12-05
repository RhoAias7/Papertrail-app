<?php
if(isset($_GET['name'])){
  $userAnswer = $_GET['name']; 
  echo '<div class="alert alert-success" role="alert">'.$userAnswer.'<a href="#" class="close" data-dismiss="alert">&times;</a></div>';
}
?>