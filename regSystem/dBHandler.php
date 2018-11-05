<?php

$servername = "127.0.0.1";
$dBUsername = "root";
$dBPwd = "";
$dBName = "paperTrailDb";

$conn = mysqli_connect($servername, $dBUsername, $dBPwd, $dBName);

if (!$conn) {
       die("Connection failed: ".mysqli_connect_error());
}

?>