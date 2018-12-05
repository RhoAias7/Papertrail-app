<?php

session_start();

if(isset($_POST['submit'])){
    
    include 'dbh.inc.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

    //Error handlers
    //Check if the inputs are empty
    if(empty($username) || empty($pwd)){
        header("Location: ../index.php?login=empty");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE user_name = '$username' OR user_email= '$username'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        if($resultCheck < 1){
            header("Location: ../index.php?login=error");
            exit();
        }else{
            if($row = mysqli_fetch_assoc($result)){
                //De-hashing the pasword
                $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
                
                if($hashedPwdCheck == false){
                    header("Location: ../index.php?login=error");
                    exit();      
                }else if($hashedPwdCheck == true){
                    //Log in the user here
                    $_SESSION[u_id] = $row[user_id];
                    $_SESSION[u_name] = $row[user_name];
                    $_SESSION[u_email] = $row[user_email];
                    header("Location: ../index.php?login=success");
                    exit();  
                }
            }
        }
    }
    
}else{
    header("Location: ../index.php?login=error");
    exit();
}