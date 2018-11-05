<?php
       session_start();
?>

<!DOCTYPE html>
<html>
       <head>
              <title>Form Test</title>
       </head>
       
       <body>
              <form action="regSystem/signUp.php" method="post">
                     <input type="text" name="username" placeholder="Username...">
                     <br>
                     <br>
                     <input type="text" name="email" placeholder="Email...">
                     <br>
                     <br>
                     <input type="password" name="user-pwd" placeholder="Password...">
                     <br>
                     <br>
                     <input type="password" name="confirm-pwd" placeholder="Password...">
                     <br>
                     <br>
                     <button type="submit" name="register">Hit Me!</button>
                     <?php echo $emptyFields;?>
              </form>
       </body>
</html>