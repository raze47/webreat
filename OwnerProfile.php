<?php include('connection.php')?>
<?php include('owner_registration_sys.php')?>
<?php if(!isset($_SESSION['owner_id'])){
     exit(header("Location: index.php"));

}?>

<?php 
//$db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");


$owner_id = $_SESSION['owner_id'];
$query = "SELECT * FROM retreat_place WHERE owner_retreat_id = '$owner_id'";
$results = mysqli_query($db, $query);
$retreat_image = "";
$owner_description = "";
if($row = mysqli_fetch_row($results)){
  $retreat_image = $row[2];
  $owner_description = $row[1];
}
else{
  echo "There is an error";
}

//For ownerlisting registration

$query = "SELECT * FROM owner_listing_registration WHERE owner_retreat_id = '$owner_id'";
$results = mysqli_query($db, $query);

if($row = mysqli_fetch_row($results)){
  $retreat_name = $row[4];
}
else{
  echo "There is an error";
}




?>

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
                    <li><a href="OwnerProfileSettings.php" class="navbtns">Settings</a></span></li>
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
        <div class="tabs-container">
          <nav>
              <ul>      
                <li>
                  <a href="OwnerPropertiesPage.php"> Properties</a></span>
              </li>
              <li>
                  <a href="OwnerReservations.php" class="owner-tabs-btns">Reservations</a></span>
              </li>
              <li>
                <a href="OwnerReviews.php" class="owner-tabs-btns">Reviews</a></span>
              </li>
              <li>
                <a href="OwnerFinances.php" class="owner-tabs-btns">Finances</a></span>
              </li>
              </ul>
          </nav>
      </div>
       
      </header>

      <!--Body-->
    <section>

      <div class="profile-container">
          <h1><?php echo $retreat_name?></h1>
          <div class="profile-container1">

            <div class="profile-container-venturePicture">
              
              <div class="venture-pic">
         
                  <img src="retreat_pfp/<?php echo $retreat_image
                ?>">
              </div>
              <div class="analytics">
                <?php echo $owner_description ?>
              </div>

            </div><br>
          <div class="profile-container-right-column">
              
          </div>

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