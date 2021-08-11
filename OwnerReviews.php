<?php include("owner_registration_sys.php") ?>
<?php include("Client_handling.php")?>
<?php if(!isset($_SESSION['owner_id'])){
     exit(header("Location: index.php"));

}?>
<?php include('connection.php')?>
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
                    <li><a href="OwnerProfile.php" class="navbtns">Home</a></span></li>
                    <li><a href="OwnerProfileSettings.php" class="navbtns">Settings</a></span></li>
                    <li><a href="Property_manager.php?owner_logout" class="navbtns">Sign out</a></span></li>
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
                <li class="selected">
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

      <?php 
        $owner_id =  $_SESSION['owner_id'];
        //happiness score
        $query = "SELECT * FROM review_retreat WHERE owner_retreat_id = '$owner_id'";
        $results = mysqli_query($db, $query);
        $rating_ctr = 0;
        $total_rating = 0;
        while($row = mysqli_fetch_row($results)){
         //   $total_rating = $total_rating + $row[7];
            $rating_ctr++;
        }
        $new_ctr = 0;
        while($new_ctr < $rating_ctr){
            $total_rating = $total_rating + 10;
            $new_ctr++;
        }

        $query = "SELECT * FROM review_retreat WHERE owner_retreat_id = '$owner_id'";
        $results = mysqli_query($db, $query);
        //38/230 = .165 .165 x 100 = 16.5
        $partial_rating = 0;
        $whole_rating = 0;
        while($row = mysqli_fetch_row($results)){
            if($total_rating <= 0){
                break;
            }
            $partial_rating = ($row[7]/$total_rating)*100;
            $whole_rating += $partial_rating;
        }        
    
      ?>
    <section class="container1">
      <h1>Some reviews of your place: <?php echo $whole_rating?>% score </h1>
      <div class="reviews_container">
      <?php
            //$reviews_ctr = 0; 
            $owner_id =  $_SESSION['owner_id'];
            $query = "SELECT * FROM review_retreat WHERE owner_retreat_id = '$owner_id'";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_row($results)): ?>
        <br>
        <div class="eventPlace-upper-container">


     
                <div class="eventPlace-upper-container-left-column">
                    <h3>Rating: <?php echo $row[7]?></h3>   
                    <h5>Ref no: <?php echo $row[1]?></h5>
                    <h5>Stayed for <?php echo $row[4]?> day(s) in <?php echo $row[3]?></h5> 
                    
                    <a style="text-decoration: none; color: rgb(255, 112, 112) ;" href='Client_handling.php?review_delete=<?php echo $row[0]?>' >Delete</a>
                </div> 
                <div class="eventPlace-upper-container-right-column">
                    <div style="padding: 30px; font-size: 20px; height: 75%; overflow-y: auto;">
                        <p><?php echo $row[5]?></p> 
                     </div>
                </div>
        </div>



             <?php endwhile;?>
                           
      </div><br>

      
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