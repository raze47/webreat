<?php include('Client_handling.php')?>
<?php include("connection.php")?>
<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title> WebReat </title>
        <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <script>
         function paypalAppear(){
            var a = document.forms["bookingForm"]["cust_name"].value;
            var b = document.forms["bookingForm"]["check-in"].value;
            var c = document.forms["bookingForm"]["check-out"].value;
            var d = document.forms["bookingForm"]["cust_contact"].value;
            var e = document.forms["bookingForm"]["cust_email"].value;


            

            if (a == null || a == "", b == null || b == "", c == null || c == "", d == null || d == "", e == null || e == "") {
                alert("Please Fill All Required Field");
                
                document.getElementById("card-input-box").style.visibility = 'hidden';
                return false;
            }

            else{
            


                const date1 = new Date(b);
                date2 = new Date(c);
                time_difference = difference(date1,date2);
                
                var date = new Date();
                if(date > date1 || date > date2){
                    alert("Invalid dates");
                    document.getElementById("card-input-box").style.visibility = 'hidden';
                    return false;
                }
                else{
                    if(time_difference<0){
                        alert("Invalid dates");
                        document.getElementById("card-input-box").style.visibility = 'hidden';
                        return false;
                    }else{ 

                        alert(time_difference);
                        document.getElementById("card-input-box").style.visibility = 'visible';
                    }

                }

                //console.log(time_difference);
                
               
           

            }
          }


          function difference(date1, date2) {  
            const date1utc = Date.UTC(date1.getFullYear(), date1.getMonth(), date1.getDate());
            const date2utc = Date.UTC(date2.getFullYear(), date2.getMonth(), date2.getDate());
                day = 1000*60*60*24;
            return(date2utc - date1utc)/day
            }

    
      </script>
     
    </head>

    <body class="bodycolor">
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
    
    <?php
      $_SESSION['property-unavailable'] = "";
      $owner_property_id = $_SESSION['property-access-id'];
      $query = "SELECT * FROM owner_properties WHERE  owner_property_id = ' $owner_property_id'";
      $results = mysqli_query($db, $query);
      $property_name = "";
      $property_description = "";
      $property_image = "";
      $property_amenities = "";

    

      while($row = mysqli_fetch_row($results)){

          $property_image = $row[3];
          $property_name = $row[1];
          $property_description = $row[2];
          $property_amenities = $row[5];
          $property_price = $row[6];
          $property_availability = $row[7];
      }

        //Session variables
      $_SESSION['property-price'] = $property_price;
      $_SESSION['property-availability'] =    $property_availability;
    ?>


    <!--Body-->
    <section>
        <div class="container1"> 
            
            <!--Ilalagay pa din dito ung overview ng Eventplace-->
            <!--      <div class="eventPlace-upper-container">
    
                <div class="eventPlace-upper-container-left-column">
                  <h3></h3>            
                
                </div>
                <div class="eventPlace-upper-container-right-column">
                
                     <img src='properties_pictures/>
                
                </div>
    
            </div> -->
            <div class="eventPlace-upper-container">
    
                <div class="eventPlace-upper-container-left-column">
                  <h3><?php echo $_SESSION['all-info-about-retreat'][4]?></h3>            
                
                </div>
                <div class="eventPlace-upper-container-right-column">
                
                     <img src='retreat_pfp/<?php echo $_SESSION['all-info-about-pics-description'][2]?>'>
                
                </div>
    
            </div>
    
             <!--Yung room property na ibobook-->
             
             <div class="available_properties">
                <div class="eventplace_property_img">
                    <img src="properties_pictures/<?php echo $property_image ?>">
                </div>
                <div class="eventPlace-middle-container-left-column">
                    <h2><?php echo $property_name?></h2>
                    <hr>
                    <p><?php echo $property_description?></p>

                </div>
                <div class="eventPlace-middle-container-right-column">
                    <h2>Amenities</h2>
                    <p><?php echo $property_price?></p>
                    <p><b><?php echo $property_availability?></b></p>
                    <hr>
                    <p><?php echo $property_amenities?></p>
                </div>                        
            </div>
       
        
        <!--Booking form-->
        <div class="book">
            <div class="booking-form-container">
                <form action="" method="post" name="bookingForm">
                    <h2>Book</h2><hr>
                    <div class="book-form">
                        <div>
                            <div class="input-box">
                                <span class ="details" for="customer_name">Name</label>
                                <input type="text" id="cust_name" name="cust_name" placeholder="Enter your Name" required><br>
                            </div>
                            <div class="input-box">
                                <span class ="details" for="checkin_date">Check-In</label>
                                    <input type="text" placeholder="Check in Date"id="check-in" name="check-in" 
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')" required><br>
                            </div>
                            <div class="input-box">
                                <span class ="details" for="checkout_date">Check-Out</label>
                                    <input type="text" placeholder="Check out Date"id="check-out" name="check-out" 
                                    onfocus="(this.type='date')"
                                    onblur="(this.type='text')" required><br>
                            </div>
                            <div class="input-box">
                                <span class ="details" for="customer_contact">Contact Number</label>
                                <input type="text" id="cust_contact" name="cust_contact" placeholder="ex. 0920-123-3456" required><br>
                            </div>
                            <div class="input-box">
                                <span class ="details" for="customer_email">Email</label>
                                <input type="email" id="cust_email" name="cust_email" placeholder="ex. jkcsantiago@gmail.com" required><br>
                            </div>
                        </div>

                        <div>
                            <center>
                            <div class="button-terms-form">
                                <input type="button" id="confirm_input" name="confirm_input" onclick="paypalAppear()" value="Confirm"><br>
                            </div>
                            </center><br>
    
                            <div id="card-input-box" style="visibility: hidden;">
                                <script src="https://www.paypal.com/sdk/js?client-id=AbWhCqmR_uxXJU0NOMBhVQW9O9j3F7dJd4ELf6MZq_rTruXuLcA4mpcc7BDV3ZzDvXdlg1J53Sdf96yR" ></script>
                                <script src="payment.js"></script>
                            </div>

                            <div class="button-terms-form" style="visibility:hidden; height: 2%">
                                <input type="submit" name="submit_book" id="submit_book" value="Confirm" style="display: none;"> 
                            </div>
                        </div>
                    </div>
                </form>
            </div>   

            <div class="paymentgraphics">
                <img src="Resources/payment.png">
            </div>

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