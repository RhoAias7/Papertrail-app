<?php

if (isset($_POST['login-submit'])) {
    
    require 'dBHandler.php';
    
    $emailuid = $_POST['username'];
    $password = $_POST['user-pwd'];
    
    if (empty($emailuid) || empty($password)) {
        header("Location: ../signInPage.php?error=emptyfields");
        exit();
    }
    
    else {
        $sql = "SELECT * FROM users WHERE user_uid=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../signInPage.php?error=sqlerror");
            exit();
        }
        
        //Prepared statement
        else {
            mysqli_stmt_bind_param($stmt, "s", $emailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            
            //Check if we have a result - set it equal to a variable
            //Take password from matched user
            //Hash the password that the user logged in with and compare
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($password, $row['user_pwd']);
                
                if ($pwdCheck == false) {
                    header("Location: ../signInPage.php?error=wrongpwd");
                    exit();
                }
                
                //User types correct username & password
                //Start session
                else if ($pwdCheck == true) {
                    session_start();
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['userUid'] = $row['user_uid'];
                    
                    header("Location: ../landing.php?login=success");
                    exit();
                }
                
                else {
                    header("Location: ../signInPage.php?error=wrongpwd");
                    exit();
                }
            }
            
            else {
                header("Location: ../signInPage.php?error=nouser");
                exit();
            }
        }
    }
    
}

else {
    header("Location: ../landing.php");
    exit();
}