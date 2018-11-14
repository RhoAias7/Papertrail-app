<!DOCTYPE html>
<html>
   
   <head>
       <title>Sign Up | PaperTrail</title>
       <link rel="shortcut icon" type="image/png" class="img-fluid" href="../../img/plane.png"/>
       <meta name="viewport" content="width=device-width, inital-scale=1" charset="utf-8">
       <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>      
       <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
       <link rel="stylesheet" href="css/form.css"/>
   </head>
   
   <body>		
	<div class="container">
	<form action="regSystem/signUp.php" method="post">
              <div class="row">
		       <div class="col">
			       <h2>Sign Up</h2>
		              <p class="formDesc">It's free and only takes a second.</p>
			</div>
		</div>
              <div class="form-group row">
                     <div class="col"><label>Email Address:</label>
		              <input type="text" name="email" class="form-control" placeholder="Enter your email address..">
			</div>
              </div>
              <div class="form-group row">
                     <div class="col"><label>Username:</label><input type="text" name="username" class="form-control" placeholder="Enter a username..."></div>
                     </div>
             <div class="form-group row">
                     <div class="col"><label>Password:</label><input type="password" name="user-pwd" class="form-control" placeholder="Enter your password..."></div>
              </div>
              <div class="form-group row">
                     <div class="col"><label>Confirm Password:</label><input type="password" name="confirm-pwd" class="form-control" placeholder="Re-enter your password..."></div>
                     </div>
              <div class="form-group row">
                     <div class="col"> 
		              <button type="submit" name="register" class="btn btn-block">Sign Up Now</button>
			</div>
              </div>
              <div class="row">
	              <div class="col"><span>Already have an account? <a href="signInPage.php" class="signIn"><u>Sign In</u></a></span>
			       </div>
              </div>
	</form>
       </div>
   </body>