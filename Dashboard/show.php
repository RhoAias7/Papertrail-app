<?php
    include "dbh.inc.php";

    $query = "SELECT * FROM `notes`";  
    $query1 = mysqli_query($conn, $query);
    while($ros = mysqli_fetch_array($query1))
    {
        $path = $ros['path'];
        $note_id = $ros['note_id'];
        $name = $ros['name'];
        echo 'sys.addNode("'.$note_id.'", {label: "'.$name.'", color: "#009be4", shape: "dot", link: "'.$path.'"});';
    }
?>

