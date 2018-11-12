<?php
    include "dbh.inc.php";

    $noteQuery = "SELECT * FROM `notes`";  
    //$userQuery = "SELECT * FROM `users`";  
    $noteQuery1 = mysqli_noteQuery($conn, $noteQuery);
    //$userQuery1 = mysqli_noteQuery($conn, $userQuery);
    while($row = mysqli_fetch_array($noteQuery1))
    {
        $path = $row['path'];
        $note_id = $row['note_id'];
        $name = $row['name'];
        echo 'sys.addNode("'.$note_id.'", {label: "'.$name.'", color: "#009be4", shape: "dot", link: "'.$path.'"});';
        echo 'console.log(sys.getNode("'.$note_id.'"));';
    }

    // while($row = mysqli_fetch_array($userQuery1))
    // {
    //     $user_id = $row['user_id'];
    //     $user_uid = $row['user_uid'];
    //     echo 'sys.addNode("'.$user_id.'", {label: "'.$user_uid.'", color: "#EBF8A4", shape: "square"});';
    // }
    // $noteQuery2 = "SELECT `note_id` FROM `notes` WHERE `note_id` = 13"
    // $noteQuery3 = "SELECT `note_id` FROM `notes` WHERE `note_id` = 16"
    // echo 'sys.addEdge(animals, dog)';

?>

