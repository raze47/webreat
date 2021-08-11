<?php include("owner_registration_sys.php") ?>
<?php include("Client_handling.php")?>
<?php include('connection.php')?>
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
      
       <!--<script>
          var openPopupBtn = document.querySelector("#open-popup-btn");
          var closPopupBtn = document.querySelector("#popup-close-btn");
    
          openPopupBtn.addEventListener("click",function(){
            document.body.classList.add(".customer_details_popup-active")
          }); 
          openPopupBtn.addEventListener("click",function(){
            document.body.classList.remove(".customer_details_popup-active")
          }); 
        </script>--> 


      <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }
        
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();


        function presentInfoBooked(){
 
          document.getElementById('customer_details_popup').style.display='block';

        }
        function presentInfoCheckedIn(){
          document.getElementById('customer_checkedin_details_popup').style.display='block'
        }
        function presentInfoCheckedOut(){
          document.getElementById('customer_checkedout_details_popup').style.display='block'
        }
        </script>

        

    </head>

    <body>

    <?php

//Check if property is booked
  $owner_retreat_id = $_SESSION['owner_id'];
  // $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");
   $query = "SELECT * FROM booking WHERE  owner_retreat_id = ' $owner_retreat_id'";
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
  $ctr = 0;

   while($row = mysqli_fetch_row($results)){
   /*
      0 - booking_id
      1 - ref_no
      2 - owner_retreat_id
      3 - owner_property_id
      4 - check_in
      5 - check_out
      6 - price
      7 - status
      8 - name
      9 - contact_no
      10 - email


      */

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
   //$db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");
   
   $ctr_properties = 0;

   while ($ctr_properties<$ctr){
      $query = "SELECT * FROM owner_properties WHERE  owner_property_id = ' $booked_properties[$ctr_properties]'";
      $results = mysqli_query($db, $query);
      if($row = mysqli_fetch_row($results)){
          array_push($booked_propertiesName, $row[1]);
          array_push($booked_propertiesPrice, $row[6]);
          array_push($booked_propertiesAvailability, $row[7]);

          $ctr_properties++;
      }
  
   }



?>








      <!--Header-->
      <section class="header"> 
        <nav>
            <a href="index.php" id="logo"><img src="Resources/WebReat.png" alt="Logo" width="150"></a>
            <div class="navs" id="navs">
                <i class="fa fa-window-close-o" onclick="hideMenu()"></i>					
                <ul>
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
                <li class="selected">
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
  
    <section class="container1">

      <div class="table_container">
        
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'booking')" id="defaultOpen">Bookings</button>
          <button class="tablinks" onclick="openCity(event, 'check-in')">Check-In</button>
          <button class="tablinks" onclick="openCity(event, 'check-out')">Check-Out</button>
          <button class="tablinks" onclick="openCity(event, 'property-availability')">Property Availability</button>
        </div>
        
        <div id="booking" class="tabcontent">
          <h2>Bookings</h2>
          <hr>
          <table class="table_content">
            <thead>
              <tr>
                <th>#</td>
                <th>Property</th>
                <th>Reference</th>
                <th>Status</th>
                <th>Information</th>
                <th>Check-In</th>
                <th>Delete?</th>
              </tr>
            </thead>



            <tbody class="tbody_content">

            <?php 
            
            
            $ctr1 = 0;
            
            while ($ctr1<$ctr):?>
              <?php if(strcmp($booked_status[$ctr1], "Booked") == 0): ?>
                <tr>
                  <td><?php echo $booked_id[$ctr1]?></td>
                  <td><?php echo $booked_propertiesName[$ctr1]?></td>
                  <td><?php echo $booked_reference[$ctr1]?></td>
                  <td><?php echo $booked_status[$ctr1]?></td>
                  <td class="text-center">
                    <button  onclick="presentInfoBooked()">View</button>
                  </td>
                  <td class="text-center">  
                    <a style="text-decoration: none; color: rgb(255, 112, 112) ;" href='Client_handling.php?check_in=<?php echo $booked_id[$ctr1]?>'>Check in</a>
                  </td>
                  <td>
                    <a style="text-decoration: none; color: rgb(255, 112, 112) ;" href='Client_handling.php?book_delete=<?php echo $booked_id[$ctr1]?>' >Del</a>
                  </td>
                 
                  <!--popup div-->

                </tr>

                <div id="customer_details_popup" class="customer_details_popup">
                  <div>
                    <h1>Booked</h1><hr><br>
                    <p><strong>Name:</strong> <?php echo $booked_name[$ctr1]?> </p>
                    <p><strong>Property: </strong> <?php echo $booked_propertiesName[$ctr1]?></p>
                    <p><strong>Reference Number: </strong> <?php echo $booked_reference[$ctr1]?></p>
                    <p><strong>Check-in Date/Time: </strong> <?php echo $booked_checkIn[$ctr1]?></p>
                    <p><strong>Check-out Date/Time: </strong> <?php echo $booked_checkOut[$ctr1]?></p>
                    <p><strong>Amount(Price to pay): </strong> <?php echo $booked_price[$ctr1]?></p>
                    <center><br><br>
                    <div class="addpropertybtn button">
                    <button onclick="document.getElementById('customer_details_popup').style.display='none'" >Close</button>
                    </div>
                    </center>
                  </div>
                  
                <?php endif;?>
                <?php $ctr1++;?>
                
            <?php endwhile;?>
          
            </tbody>
         </table>
        </div>
        
        <div id="check-in" class="tabcontent">
          <h2>Check-Ins</h2>
          <hr>
          <table class="table_content">
            <thead>
              <tr>
                <th>#</td>
                <th>Property</th>
                <th>Reference</th>
                <th>Status</th>
                <th>Information</th>
                <th>Check-Out</th>
              </tr>
            </thead>
            <tbody class="tbody_content">
            <?php 
            
            
            $ctr2 = 0;
            
            while ($ctr2<$ctr):?>
              <?php if(strcmp($booked_status[$ctr2], "Checked in") == 0): ?>
                <tr>
                  <td><?php echo $booked_id[$ctr2]?></td>
                  <td><?php echo $booked_propertiesName[$ctr2]?></td>
                  <td><?php echo $booked_reference[$ctr2]?></td>
                  <td><?php echo $booked_status[$ctr2]?></td>
                  <td class="text-center">
                    <button  onclick="presentInfoCheckedIn()">View</button>
                  </td>
                  <td class="text-center">
                     <a style="text-decoration: none; color: rgb(255, 112, 112) ;" href='Client_handling.php?check_out=<?php echo $booked_id[$ctr2]?>'>Check out</a>
                  </td>
                 
                </tr>


                <div id="customer_checkedin_details_popup" class="customer_details_popup">
                  <h1>Checked-ins</h1><hr><br>
                    <p><strong>Name: </strong> <?php echo $booked_name[$ctr2]?></p>
                    <p><strong>Property: </strong> <?php echo $booked_propertiesName[$ctr2]?></p>
                    <p><strong>Reference Number: </strong> <?php echo $booked_reference[$ctr2]?></p>
                    <p><strong>Check-in Date/Time: </strong> <?php echo $booked_checkIn[$ctr2]?></p>
                    <p><strong>Check-out Date/Time:</strong> <?php echo $booked_checkOut[$ctr2]?></p>
                    <p><strong>Amount(Price to pay): </strong> <?php echo $booked_price[$ctr2]?></p>
                  <center><br><br>
                  <div class="addpropertybtn button">
                    <button  onclick="document.getElementById('customer_checkedin_details_popup').style.display='none'">Close</button>
                  </div>
                  </center>
                </div>
                <?php endif;?>
                <?php $ctr2++?>
            <?php endwhile;?>

            </tbody>
         </table>
        </div>
        
        <div id="check-out" class="tabcontent">
          <h2>Check-Outs</h2>
          <hr>
          <table class="table_content">
            <thead>
              <tr>
                <th>#</td>
                <th>Property</th>
                <th>Reference</th>
                <th>Status</th>
                <th>Information</th>
                <th>Delete?</th>
              </tr>
            </thead>
            <tbody class="tbody_content">
            <?php 
            
            
            $ctr3 = 0;
            
            while ($ctr3<$ctr):?>
              <?php if(strcmp($booked_status[$ctr3], "Checked out") == 0): ?>
                <tr>
                  <td><?php echo $booked_id[$ctr3]?></td>
                  <td><?php echo $booked_propertiesName[$ctr3]?></td>
                  <td><?php echo $booked_reference[$ctr3]?></td>
                  <td><?php echo $booked_status[$ctr3]?></td>
                  <td class="text-center">
                    <button onclick="presentInfoCheckedOut()">View</button>
                  </td>

                  <td class="text-center">
                     <a style="text-decoration: none; color: rgb(255, 112, 112) ;" href='Client_handling.php?delete_check_out=<?php echo $booked_id[$ctr3]?>'>Archive</a>
                  </td>


                 
  
                </tr>

                <div id="customer_checkedout_details_popup" class="customer_details_popup">
                  <h1>Checked-outs</h1><hr><br>
                  <p><strong>Name: </strong> <?php echo $booked_name[$ctr3]?></p>
                    <p><strong>Property:</strong> <?php echo $booked_propertiesName[$ctr3]?></p>
                    <p><strong>Reference Number: </strong> <?php echo $booked_reference[$ctr3]?></p>
                    <p><strong>Check-in Date/Time: </strong> <?php echo $booked_checkIn[$ctr3]?></p>
                    <p><strong>Check-out Date/Time: </strong> <?php echo $booked_checkOut[$ctr3]?></p>
                    <p><strong>Amount(Price to pay): </strong> <?php echo $booked_price[$ctr3]?></p>
                  <center><br><br>
                  <div class="addpropertybtn button">
                    <button  onclick="document.getElementById('customer_checkedout_details_popup').style.display='none'">Close</button>
                  </div>
                  </center>
                </div>

                <?php endif;?>
                <?php $ctr3++?>
            <?php endwhile;?>
            </tbody>
         </table>
        </div>
 
        <div id="property-availability" class="tabcontent">
          <h2>Property Availability</h2>
          <hr>
          <table class="table_content">
            <thead>
              <tr>
              <th>#</th>
              <th>Property</th>
              <th>Price</th>
              <th>Availability</th> 
              </tr>
            </thead>
            <tbody class="tbody_content">
            <?php 
            
            
            $ctr4 = 0;
            $owner_id =  $_SESSION['owner_id'];
            $query = "SELECT * FROM owner_properties WHERE owner_retreat_id = '$owner_id'";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_row($results)):?>
     
                <tr>
                  <td><?php echo $row[0]?></td>
                  <td><?php echo $row[1]?></td>
                  <td><?php echo $row[6]?></td>
                  <td><a href='Client_handling.php?toggle_availability=<?php echo $row[0];?>'><?php echo $row[7]?></a></td>
                </tr>


       


                <?php $ctr4++?>
            <?php endwhile;?>
            </tbody>
         </table>
       </div>
        
       <script>
        function openCity(evt, cityName) {
          var i, tabcontent, tablinks;
          tabcontent = document.getElementsByClassName("tabcontent");
          for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
          }
          tablinks = document.getElementsByClassName("tablinks");
          for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
          }
          document.getElementById(cityName).style.display = "block";
          evt.currentTarget.className += " active";
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
        </script>

      </div>


    
      

    

     
      
    </section>

    </body>
    
 

   

    

    <foooter>
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
	</foooter>
</html>