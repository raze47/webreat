<?php include('connection.php')?>
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
                <li>
                    <a href="OwnerReviews.php" class="owner-tabs-btns">Reviews</a></span>
                </li>
                <li class="selected">
                  <a href="OwnerFinances.php" class="owner-tabs-btns">Finances</a></span>
                </li>
              </ul>
          </nav>
      </div>


      <?php 
            $ctr = 0;
            $owner_id = $_SESSION['owner_id'];
           // $_SESSION['total-price'] = 0;
     
            $query = "SELECT * FROM booking where owner_retreat_id = '$owner_id'";   
            $results = mysqli_query($db, $query);
            $booked_properties = array();
            $booked_propertiesName = array();
            $booked_propertiesPrice = array();
            $booked_propertiesAvailability = array();
            $booked_reference = array();
            $booked_status= array();
            $booked_checkIn = array();
            $booked_checkOut = array();
            $booked_userId = array();
            $booked_email = array();
            $booked_price = array();
            $booked_id = array();
            $booked_name = array();
            $booked_contactNo = array();
            $booked_name = array();

            while($row = mysqli_fetch_row($results)){
                 //Getting all info from booking table
                array_push($booked_id, $row[0]);
                array_push($booked_reference, $row[1]);
                //Skip owner_retreat_id
                array_push($booked_properties, $row[3]);
                array_push($booked_checkIn, $row[4]);
                array_push($booked_checkOut, $row[5]);
                array_push($booked_price, $row[6]);
                array_push($booked_status, $row[7]);
                array_push($booked_name, $row[8]);
                array_push($booked_contactNo, $row[9]);
                array_push($booked_email, $row[10]);
                
                $ctr++;
            }

            $ctr_properties = 0;
          

            while ($ctr_properties<$ctr){
               $query = "SELECT * FROM owner_properties WHERE  owner_property_id = '$booked_properties[$ctr_properties]'";
               $results = mysqli_query($db, $query);
               if($row = mysqli_fetch_row($results)){

                
                   array_push($booked_propertiesName, $row[1]);
                   array_push($booked_propertiesPrice, $row[6]);
                   array_push($booked_propertiesAvailability, $row[7]);
         
                   $ctr_properties++;
               }
           
            }

            $ctr_price = 0;
            $total_price = 0;
            $monthyear = date("m-Y");
            while ($ctr_price<$ctr_properties){

       
                    
                $monthyear_check_in = date("m-Y", strtotime($booked_checkIn[$ctr_price]));
   
                if($monthyear ==  $monthyear_check_in && strcmp($booked_status[$ctr_price], "Finished") == 0){
                    $total_price += $booked_price[$ctr_price];
                }

                $ctr_price++;
            }

            

        ?>
       
      </header>

    <!--Body-->
    <section class="container1">

     <div class="monthly_revenue_container">
        <div class="revenue">
          <h1>Your revenue for this month</h1>
          <h2>Php <?php echo $total_price?></h2>
        </div>
        <div class="graphics_revenue">
         
        </div>
     </div>

     <div class="archives_container">
       <h1>Archives</h1><hr>

       <div class="scroll_archives">
        <center>
        <table class="archives_table_content">
          <thead>
            <tr>
              <th>Reference No.</td>
              <th>Property</th>
              <th>Name</th>
     
              <th>Price</th>

            </tr>
          </thead>
          <tbody>
       

            <?php 
            $ctr1 = 0;
            $monthyear = date("m-Y");
            $total_price = 0; 
            
            while ($ctr1<$ctr_properties):?>
            
                <?php 
                    $date_check = "false";
                    
                    $monthyear_check_in = date("m-Y", strtotime($booked_checkIn[$ctr1]));
       
                    if($monthyear ==  $monthyear_check_in){
                        $date_check = "true";
                    }

                    ?>

                 <?php if(strcmp($booked_status[$ctr1], "Finished") == 0  && strcmp($date_check, "true") == 0 ): ?>
                    <tr>
                        <td><?php echo $booked_reference[$ctr1]?></td>
                        <td><?php echo $booked_propertiesName[$ctr1]?></td>
                        <td><?php echo $booked_name[$ctr1]?></td>
                        <td><?php echo $booked_price[$ctr1]?></td>
                       <?php// $total_price += $booked_price[$ctr1]; ?> 
                    </tr>

                <?php endif;?>
                <?php $ctr1++?>
                
            <?php endwhile;?>
            <?php// $_SESSION['total-price'] = $total_price;?>
    
          </tbody>
          </table>
        </center>
       </div>
      
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