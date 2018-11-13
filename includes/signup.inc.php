<?php

if(isset($_POST['submit'])){
    
    include_once 'dbh.inc.php';
    
    $username = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    
    //Error handlers
    //Check for empty fields
    if(empty($username) || empty($email) || empty($pwd)){
        header("Location: ../index.php?signup=empty");
        exit();
    }else{
        //Check if input characters are valid
        if(!preg_match("/^[a-z A-Z]*$/", $username)){
            header("Location: ../index.php?signup=invalid");
            exit();
        }else{
            //Check if email is valid
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../index.php?signup=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE user_name = '$username'";
                $result = mysql_query($conn, $sql);
                $resultCheck = mysql_num_rows($result);
                
                if($resultCheck > 0){
                    header("Location: ../index.php?signup=usertaken");
                    exit();
                } else {
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //Insert the user into the database
                    $sql = "INSERT INTO users (user_name, user_email, user_pwd) VALUES ('$username', '$email', '$hashedPwd');";
                    mysqli_query($conn, $sql);
                    //robs code: trying to log the new user into a session so they dont have to go to the log in form after creating an account 
                    $_SESSION[u_id] = $row[user_id];
                    $_SESSION[u_name] = $row[user_name];
                    $_SESSION[u_email] = $row[user_email];
                    //I got this code ^ from the login.inc.php file
                    header("Location: ../index.php?signup=welcome");
                    exit();
                }
            }
        }
    }
}else{
    header("Location: ../index.php");
    exit();
}
?>