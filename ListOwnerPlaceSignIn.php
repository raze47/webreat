<?php include('owner_registration_sys.php')?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title> WebReat </title>
        <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body class="signinbg">
        <!--Header-->
        <section class="header"> 
            <nav>
                <a href="index.php" id="logo"><img src="Resources/WebReat.png" alt="Logo" width="150"></a>
                <div class="navs" id="navs">
                    <i class="fa fa-window-close-o" onclick="hideMenu()"></i>					
                    <ul>
                        <li><a href="ListOwnerPlaceRegister.php">List your Place</a></li>  
                    </ul>
                </div>
                <i class="fa fa-bars" onclick="showMenu()"></i>
            </nav>
        </section>
        
        <!--JavaScript for Menu-->
        <script>

            var navs = document.getElementById("navs");

            function showMenu(){
                navs.style.right = "0";
            }
            function hideMenu(){
                navs.style.right = "-200px";
            }

        </script>
        <!--Body-->
        <section class="signup-body">
            <div class="signup-container">
                <div class="signuptitle">Welcome back Partner!</div><hr>
                <form action="" method="post">
                    <div class="signup-form">
                        <div class="input-box">
                            <spac class="details" for="email_in">Email</label>
                            <input type="email" name="email_in" id="email_in" placeholder="Enter your email"><br>
                        </div>
                        <div class="input-box">
                            <span class="details" for="password_in">Password</label>
                            <input type="password" name="password_in" id="password_in" placeholder="Enter your password"><br>
                        </div>
                    </div>

                    <div class="otheropt">
                        <ul>
                        <li><a href="ListOwnerPlaceRegister.php" class="navbtns">Create Account</a></li>
                        <li><a href="" class="navbtns">Forgot Password?</a></li>  
                        </ul>
                    </div>  
                    
                    <center>
                    <div class="button-terms-form">
                    <input type="submit" id="login_submit" name = "login_submit" id ="login_submit" value="Log-in">
                    </div>
                    </center>
                </form>            
            </div>
        </section>

    </body>
    <footer>
        <div class="copyright">
			<center>
            <img src="Resources/WebReat1.png" alt="Logo" width="140"/>
            <p>
                <br>
                Copyright © 2021 WebReat.com™. All rights reserved.
                <br>
                Polytechnic University of the Philippines, College of Computer and Information Science
            </p> 
			</center>
        </div>
    </footer>
</html>