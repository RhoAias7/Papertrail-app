<?php
    include "dbh.inc.php";

    $noteQuery = "SELECT * FROM `notes`";
    $userQuery = "SELECT * FROM `users`";  
    $edgeQuery = "SELECT * FROM `reviews`";
    $noteQuery1 = mysqli_Query($conn, $noteQuery);
    $userQuery1 = mysqli_Query($conn, $userQuery);
    $edgeQuery1 = mysqli_Query($conn, $edgeQuery);

    while($row = mysqli_fetch_array($noteQuery1))
    {
        $note_id = $row['note_id'];
        $name = $row['name'];
        $path = $row['path'];
        echo 'sys.addNode("'.$note_id.'", {label: "'.$name.'", color: "#009be4", shape: "dot", link: "'.$path.'"});';
        echo 'console.log(sys.getNode("'.$note_id.'"));';
    }

    while($row = mysqli_fetch_array($userQuery1))
    {
        $user_id = $row['user_id'];
        $user_uid = $row['user_uid'];
        echo 'sys.addNode("'.$user_id.'", {label: "'.$user_uid.'", color: "#FFCC00", shape: "square", link: "uploads/07_Quick Sort.pptx"});';
    }

    while($row = mysqli_fetch_array($edgeQuery1))
    {
        $user_id = $row['user_id'];
        $note_id = $row['note_id'];
        echo 'sys.addEdge("'.$user_id.'", "'.$note_id.'", {length:.75, pointSize:3});';
    }
?>

