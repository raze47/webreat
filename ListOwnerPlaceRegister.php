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

    <body>
      <!--Header-->
      <section class="header"> 
			<nav>
				<a href="index.php" id="logo"><img src="Resources/WebReat.png" alt="Logo" width="150"></a>
				<div class="navs" id="navs">
					<i class="fa fa-window-close-o" onclick="hideMenu()"></i>					
					<ul>
						<li>Already a partner?</li>
                        <li><a href="ListOwnerPlaceSignIn.php">Sign-in</a></li>    
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
      <section class="owner-signup-body">
        <div class="owner-signup-container">
            <div class="owner-signuptitle">Become our partner!</div><hr>
            <form action="" method="post">
                <div class="owner-signup-form">
                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_email_reg">Email</span>
                        <input type="text" name="owner_email_reg" id="owner_email_reg" ><br>
                    </div>
                    <div class="owner-input-box">
                        <span class ="owner-details"label for="owner_name_reg">Owner name</span>
                        <input type="text" name="owner_name_reg" id="owner_name_reg" ><br>
                    </div>

                    <div class="owner-input-box">   
                        <span class ="owner-details" for="owner_retreatName_reg">Retreat Name</span>
                        <input type="text" name="owner_retreatName_reg" id="owner_retreatName_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_retreatType_reg">Retreat Type:</span>
                        <select name="owner_retreatType_reg" id="owner_retreatType_reg">
                            <option value="Resort">Resort</option>
                            <option value="Hiking Spot">Hiking Spot</option>
                            <option value="Spa">Spa</option>
                            <option value="Meditation">Meditation</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    
                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_stateProvince_reg">State/Province</span>
                        <input type="text" name="owner_stateProvince_reg" id="owner_stateProvince_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_city_reg">City</span>
                        <input type="text" name="owner_city_reg" id="owner_city_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_streetAddress_reg">Street Address</span>
                        <input type="text" name="owner_streetAddress_reg" id="owner_streetAddress_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_license_reg">Retreat License: </span>
                        <input type="text" name="owner_license_reg" id="owner_license_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_contactNo_reg">Phone Number: </span>
                        <input type="text" name="owner_contactNo_reg" id="owner_contactNo_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_zipPostal_reg">Zip/Postal Code: </span>
                        <input type="text" name="owner_zipPostal_reg" id="owner_zipPostal_reg" ><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="owner_password_reg">Password</span>
                        <input type="password" name="owner_password_reg" id="owner_password_reg"><br>
                    </div>

                    <div class="owner-input-box">
                        <span class ="owner-details" for="confirm_password_reg">Confirm Password</span>
                        <input type="password" name="owner_confirm_password_reg" id="owner_confirm_password_reg"><br>
                    </div>
                </div>
                <center>
                <div class="button-terms-form">
                    <input type="submit" id="owner_reg_submit" name = "owner_reg_submit" value="Submit">
                </div>
                </center>
            </form>
        </div>
            <div class="info_graphics">
            <img src="Resources/Infographics.png" width="700">
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