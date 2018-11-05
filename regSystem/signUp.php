<?php

if (isset($_POST['register'])) {
       
       require 'dBHandler.php';

       $username = $_POST['username'];
       $email = $_POST['email'];
       $password = $_POST['user-pwd'];
       $confirmPassword = $_POST['confirm-pwd'];
       
       if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
              header("Location: ../signUpPage.php?error=emptyfields&uid=".$username."&email=".$email);
              exit(); //Stop script from running
       }
       
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
              header("Location: ../signUpPage.php?error=invalidemailuid&email");
              exit(); 
       }
       
       else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              header("Location: ../signUpPage.php?error=invalidemail&uid=".$username);
              exit(); 
       }
       
       else if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
              header("Location: ../signUpPage.php?error=invaliduid&email=".$email);
              exit(); 
       }
       
       else if ($password !== $confirmPassword) {
              header("Location: ../signUpPage.php?error=passwordcheck&uid=".$username."&email=".$email);
              exit(); 
       }
       
       //Use of prepared statements to securely save user information to the database
       else {
              
              //Use placeholders inside the sql statemnt - (?)
              //We don't run what the user has inserted into the input field
              $sql = "SELECT user_uid FROM users WHERE user_uid=?";
              
              //Prepared statement
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                     header("Location: ../signUpPage.php?error=sqlerror");
                     exit(); 
              }
              
              //Now the data we store in the database will be executed using a different method
              //Making it much safer to pass in information from the user to the database
              else {
                     //Binding parameters from the user to the prepared statement
                     //Taking information from the user, before later sending to the database using the prepared statement
                     mysqli_stmt_bind_param($stmt, "s", $username);
                     
                     //Run user information inside the database
                     mysqli_stmt_execute($stmt);
                     
                     //Check to see if username is already taken
                     //Store username in $stmt
                     mysqli_stmt_store_result($stmt);
                     
                     //Compare the username against other rows in the database - if more than 1 row is returned, the username already exists 
                     $resultCheck = mysqli_stmt_num_rows($stmt);
                     
                     if ($resultCheck > 0) {
                            //User_uid already taken - return user to sign up screen with email details inputted 
                            header("Location: ../signUpPage.php?error=usertaken&email=".$email);
                            exit(); 
                     }
                     
                     else {
                            
                            $sql = "INSERT INTO users (user_uid, user_email, user_pwd) VALUES (?, ?, ?)";
                            $stmt = mysqli_stmt_init($conn);
                            if (!mysqli_stmt_prepare($stmt, $sql)) {
                                   header("Location: ../signUpPage.php?error=sqlerror");
                                   exit(); 
                            }
                            
                            else {
                                   //Using bcrypt to hash password - Latest version of hashing
                                   //Bcrypt is always relevant as it is automatically updated when there is some kind of security breach on bcrypt
                                   $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                                   
                                   mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
                                   mysqli_stmt_execute($stmt);
                                   header("Location: ../signInPage.php?signup=success");
                                   exit();
                            }
                            
                     }
              }
              
       }
       
       mysqli_stmt_close($stmt);
       mysqli_close($conn);
       
}

else {
       
       //If access to this page was gained without clicking "SignUp Button" 
       //Send back to signup page
       header("Location: ../signUpPage.php");
       exit();
       
}

?>