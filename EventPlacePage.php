<?php include('Client_handling.php')?>
<?php include('connection.php')?>

<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="with=device-width, initial-scale=1.0">
        <title> WebReat </title>
        <link href="Resources/map-marker-icon.png" rel="icon" type="x-icon">
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <?php $_SESSION['cust-booking-ctr']++?>
        <?php if(isset($_SESSION['cust-ref-no']) &&  $_SESSION['cust-booking-ctr']==1):?>
          <script>
              alert("Your ref no is: "+<?php echo $_SESSION['cust-ref-no']?>+". Kindly save this information")
          </script>
        <?php endif;?>
  
        <?php if(isset($_SESSION['no-same-user-booking'])): ?>
          <script>
              alert(<?php echo $_SESSION['no-same-user-booking']?>)
          </script>
        <?php endif;?>
  
        <?php if(isset($_SESSION['unavailable-property'])): ?>
          <script>
              alert(<?php echo $_SESSION['unavailable-property']?>)
          </script>
        <?php endif;?>
    
    
    
    
    </head>


    <body>

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
    <section>
    <div class="container1"> 
        

        <div class="eventPlace-upper-container">

            <div class="eventPlace-upper-container-left-column">
              <h3><?php echo $_SESSION['all-info-about-retreat'][4]?></h3>            
              <h3><?php echo $_SESSION['all-info-about-retreat'][6]?></h3>
              <h3><?php echo $_SESSION['all-info-about-retreat'][7]?></h3>
            </div>
            <div class="eventPlace-upper-container-right-column">
            
                 <img src='retreat_pfp/<?php echo $_SESSION['all-info-about-pics-description'][2]?>'>
            
            </div>

        </div>

  
      
                    <?php 
                        $owner_id = $_SESSION['owner-access-id'];
                       //  $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");
                         $sql = "SELECT * FROM owner_properties WHERE owner_retreat_id = '$owner_id'";
                         $results = mysqli_query($db, $sql);
                         $ctr = 0;
                         while($row = mysqli_fetch_row($results)):?>
           
        <div class="available_properties">
            <div class="eventplace_property_img">
                <img src="properties_pictures/<?php echo $row[3]?>">
            </div>
            <div class="eventPlace-middle-container-left-column">
                <h3><?php echo $row[1]?></h3> <hr>
                <div class="scrollcontent">
                    <p><?php echo $row[2]?></p>
                </div><br>

                <div class="booknowbtns">
                <!--Pag click neto mapupunta sa booking page-->
                     <a href='Client_handling.php?property_access=<?php echo $row[0]?>'>Book now</a>
                </div>
            </div>
            <div class="eventPlace-middle-container-right-column">
                <h3>Amenities</h3><hr>
                <div class="scrollcontent_amenities">
                    <p><?php echo $row[6]?></p>
                    <p><b><?php echo $row[7]?></b></p>

                    <p><?php echo $row[5]?></p>
                </div><br>
            </div>                        
        </div>  
                              

                                                
                                <?php $ctr++?>
                            <?php endwhile;?>


        <?php
            //$reviews_ctr = 0; 
            $query = "SELECT * FROM review_retreat WHERE owner_retreat_id = '$owner_id'";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_row($results)): ?>
            <br><div class="eventPlace-upper-container">
                <div class="eventPlace-upper-container-left-column">
                    <h3>Rating: <?php echo $row[7]?></h3>   
                    <h5><?php echo $row[1]?></h5>
                    <h5>Stayed for <?php echo $row[4]?> day(s) in <?php echo $row[3]?></h5>                               
                </div> 
                <div class="eventPlace-upper-container-right-column">
                    <div style="padding: 30px; font-size: 20px; height: 75%; overflow-y: auto;">
                    <p><?php echo $row[5]?></p> 
                 </div>
                </div>
            </div>
    <?php endwhile;?>
                           

        <br>
        <div class="eventplace_reviews">
            <form action="" method="post" name="form_review">
                <h1>Leave us a review</h1>
                <label for="email_review">Customer email: </label>
                <input type="email" name="email_review" id="email_review">
                <br>
                <label for="review_range">Rating (between 0 and 10):</label>
                <input type="range" id="review_range" name="review_range" min="0" max="10">



                <textarea id="eventplace_customer_review" name="eventplace_customer_review"  cols="165" rows="13"></textarea>
                <center>
                    <div class="searchbtnhome">
                        <input type="submit" id="eventplace_customer_review_submit" name = "eventplace_customer_review_submit" value="Submit">   
                    </div>
                </center><br>
            </form>
        </div>
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