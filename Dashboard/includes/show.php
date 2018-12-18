<?php

    if (isset($_SESSION['userId'])){

    include "dbh.inc.php";

    $noteQuery = "SELECT * FROM `notes`";
    $userQuery = "SELECT * FROM `users`";  
    $edgeQuery = "SELECT * FROM `review_notes`";
    $noteQuery1 = mysqli_Query($conn, $noteQuery);
    $userQuery1 = mysqli_Query($conn, $userQuery);
    $edgeQuery1 = mysqli_Query($conn, $edgeQuery);
    echo "toastr.success('Welcome, click the <a style= \"color: blue;font-weight: bold; \" data-toggle=\"modal\" data-target=\"#modal2\">?</a> for info.');";

        $uid=$_SESSION['userId'];

        while($row = mysqli_fetch_array($noteQuery1))
        {
            $note_id = $row['note_id'];
            $usrid = $row['user_id'];
            $name = $row['name'];
            $path = $row['path'];
            if ($uid==$usrid){
                echo 'sys.addNode("'.$note_id.'", {label: "'.$name.'", color: "#FF69B4", shape: "dot", link: "'.$path.'"});';
            }else
            {
                echo 'sys.addNode("'.$note_id.'", {label: "'.$name.'", color: "#009be4", shape: "dot", link: "'.$path.'"});';
            }
        
        }

        while($row = mysqli_fetch_array($userQuery1))
        {
            $user_id = $row['user_id'];
            $user_uid = $row['user_uid'];
            if ($uid==$user_id){
                echo 'sys.addNode("id'.$user_id.'", {label: "'.$user_uid.'", color: "#FF69B4", shape: "square"});';
            }else
            {
                echo 'sys.addNode("id'.$user_id.'", {label: "'.$user_uid.'", color: "#FFCC00", shape: "square"});';
            }
        }


        while($row = mysqli_fetch_array($edgeQuery1))
        {
            $rating = $row['rating'];
            if($rating == 1){
                $rating = "#f12c2c";
            }else if($rating == 2){
                $rating = "#00b9e4";
            }else if($rating == 3){
                $rating = "#38bd34";
            }
            $user_id = $row['user_id'];
            $note_id = $row['note_id'];
            $comment = $row['comment'];
            echo 'sys.addEdge("id'.$user_id.'", "'.$note_id.'", {color: "'.$rating.'", length: 3, comment: "'.$comment.'", weight: "3"});';
            
        }
    }else{
        echo "toastr.error('You must be <a style= \"color: blue; \" href= \"../signInPage.php \">logged in</a> to see this page!');";
    }
 ?>