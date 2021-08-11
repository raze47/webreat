<?php include('profile_settings.php')?>
<?php include('owner_registration_sys.php')?>
<?php if(!isset($_SESSION['owner_id'])){
     exit(header("Location: index.php"));

}?>

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
      <header class="header"> 
         <!--Header-->
      	<section class="header"> 
			<nav>
				<a href="index.php" id="logo"><img src="Resources/WebReat.png" alt="Logo" width="150"></a>
				<div class="navs" id="navs">
					<i class="fa fa-window-close-o" onclick="hideMenu()"></i>					
					<ul>
                        <li><a href="OwnerProfile.php" class="navbtns">Back</a></span></li>
                        <li><a href="profile_settings.php?owner_logout" class="navbtns">Sign out</a></span></li>
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
      </header>

      <!--Body-->
    <section class="container1">

      <form method="post" action="" enctype="multipart/form-data">
        <div class="settings-title">
          <h1>Settings</h1><hr>
        </div>
        <div class="profile-settings-container">

              <div class="profile-settings-container-left-column">

                <div class="profile-settings-container-left-column-venturePicture">
                    <center>
                    <div class="preview-pic">
                        <img src="Resources/bg1.jpg"/>
                    </div>
                    <div class="choosefile">
                      <input type="file" name="retreat_picture[]" id="retreat_picture">
                    </div>
                  </center>
                </div>     
                
                <div class="profile-settings-container-description">
                  <h1>Event Place Description</h1>
                  <textarea id="profile_settings_description" name="profile_settings_description"  cols="32" rows="13"></textarea>
                </div>

                <center>
                  <div class="savebtn">
                      <input type="submit" id="profile_settings_submit" name = "profile_settings_submit" id ="profile_settings_submit" value="Save">   
                  </div>
                 </center><br>
              </div>

              <div class="profile-settings-container-right-column">
                <h1>Change Account Details</h1>
                <form method="post" action="">
                  <div class="owner-detail-form">
                    <div class="owner-info-input-box">
                      <span class ="details" for="owner_name_reg">Owner name</label>
                      <input type="text" name="owner_name_reg" id="owner_name_reg" ><br>
                    </div>

                    <div class="owner-info-input-box">
                      <span class ="details" for="owner_retreatName_reg">Retreat Place Name</label>
                      <input type="text" name="owner_retreatName_reg" id="owner_retreatName_reg" ><br>
                    </div>
                  </div><br>

                <h1>Change Password</h1>
                <div class="owner-detail-form">
                  <div class="owner-info-input-box">
                    <span class ="details" for="owner_password_reg">New Password</label>
                    <input type="password" name="owner_password_reg" id="owner_password_reg"><br>
                  </div>

                  <div class="owner-info-input-box">
                    <span class ="details" for="confirm_password_reg">Confirm Password</label>
                    <input type="password" name="owner_confirm_password_reg" id="owner_confirm_password_reg"><br>
                  </div>
                </div>

                <center>
                  <div class="seeavailability">
                      <input type="submit" id="profile_settings_submit" name = "profile_settings_submit" value="Save Changes">   
                  </div>
                </center>
              </form>

              </div>
      
        </div>
        </form>
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