<?php include('main_php.php')?>

<!DOCTYPE html>
<html>

    <head>
      <title> WebReat </title>
      <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
      <link rel="stylesheet" href="style.css">
    </head>

    <body class="signinbg">

      <!--Header-->
      <header class="header"> 
        <div class="container">
            <nav class="tabs">
               <img src="Resources/WebReat.png" alt="Logo" width="150"/>
                <ul>
                    <li><a href="ListOwnerPlaceRegister.php" class="navbtns">List your Place</a></li>
                    <li><a href="index.php" class="navbtns">Home</a></li>
                    <li><a href="UserSignUpPage.php" class="navbtns">Sign Up</a></li>  
                </ul>
            </nav>
        </div>
       
      </header>

      <!--Body-->
      <section class="signup-body">
        <div class="signup-container">
            <div class="signuptitle">Sign-in</div><hr>
            <form action="" method="post">
                <div class="signup-form">
                    <div class="input-box">
                        <span class ="details" for="username_reg">Username</label>
                        <input type="text" id="username_reg" placeholder="Enter your username"><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="first_name_reg">Password</label>
                         <input type="text" id="first_name_reg" placeholder="Enter your password"><br>
                    </div>
                </div>
               
                <div class="otheropt">
                  <ul>
                    <li><a href="SignUpPage.html" class="navbtns">Create Account</a></li>
                    <li><a href="" class="navbtns">Forgot Password?</a></li>  
                  </ul>
                </div>  
                <center>               
                <div class="button-terms-form">
                    <input type="submit" value="Log-in">
                </div>
                </center>
            </form>
        </div>
    </section>

    </body>
    <footer>
         <!--Footer-->
         <center>
    
            <div class="copyright">
                <img src="Resources/WebReat1.png" alt="Logo" width="140"/>
                <p>
                    <br>
                    Copyright © 2021 WebReat.com™. All rights reserved.
                    <br>
                    Polytechnic University of the Philippines, College of Computer and Information Science
                </p> 
            </div>
         </center>
    </footer>
</html>