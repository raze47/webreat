<?php include('main_php.php')?>

<!DOCTYPE html>
<html>

    <head>
      <title> WebReat </title>
      <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
      <link rel="stylesheet" href="style.css">
    </head>

    <body class="signupbg">

      <!--Header-->
      <header class="header"> 
        <div class="container">
            <nav class="tabs">
                <img src="Resources/WebReat.png" alt="Logo" width="150"/>
                <ul>
                    <li><a href="ListOwnerPlaceRegister.php" class="navbtns">List your Place</a></li>
                    <li><a href="UserSignInPage.php" class="navbtns">Sign In</a></li>
                    <li><a href="index.php" class="navbtns">Home</a></li>  
                </ul>
            </nav>
        </div>
       
      </header>

    <!--Body-->
    <section class="signup-body">
        <div class="signup-container">
            <div class="signuptitle">Sign-up</div><hr>
            <form action="" method="post">
                <div class="signup-form">
                    <div class="input-box">
                        <span class ="details" for="username_reg">Username</label>
                        <input type="text" id="username_reg" placeholder="Enter your username"><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="first_name_reg">First Name</label>
                         <input type="text" id="first_name_reg" placeholder="Enter your first name"><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="last_name_reg">Last Name</label>
                        <input type="text" id="last_name_reg" placeholder="Enter your last name" ><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="email_reg">Email</label>
                        <input type="email" id="email_reg" placeholder="ex. jkcs@gmail.com" ><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="contact_no_reg">Contact Number</label>
                        <input type="text" id="last_name" placeholder="ex. 0920-123-3456"><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="password_reg">Password</label>
                        <input type="password" id="password_reg" placeholder="Create password"><br>
                    </div>
                    <div class="input-box">
                        <span class ="details" for="confirm_password_reg">Confirm Password</label>
                        <input type="password" id="confirm_password_reg" placeholder="Confirm your password"><br>   
                    </div>
                </div>
                <center>
                <div class="button-terms-form">
                    <input type="submit" value="Submit">
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