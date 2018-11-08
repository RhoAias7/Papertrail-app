<?php
  include 'dbh.inc.php';
  
   $query = "SELECT * FROM ratings";
   $query1 = mysqli_query($conn, $query);
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
       echo "successful" . $rate ;
    $nid='10';
    $uid = 'bowcanlorens';
    $r = $rate;
    $c = $_POST['comment'];
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO ratings (note_id, user_id, rating, comment) VALUES ('$nid','$uid','$r','$c')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

  }
  else{echo "no";}

    // if(isset($_POST["save"], $_POST["business_id"]))
    // {
    //     $query = "
    //     INSERT INTO rating(business_id, rating) 
    //     VALUES (:business_id, :rating)
    //     ";
    //     $statement = $connect->prepare($query);
    //     $statement->execute(
    //     array(
    //     ':business_id'  => $_POST["business_id"],
    //     ':rating'   => $_POST["index"]
    //     )
    //     );
    //     $result = $statement->fetchAll();
    //     if(isset($result))
    //     {
    //         echo 'done';
    //     }
    // }


  ?>