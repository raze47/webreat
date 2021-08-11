<?php include('Property_manager.php') ?>
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
                <li class="selected">
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
        <div class="owner-property-container">
            <div class="addproperty">
                <div>
                    <h1>Your Properties</h1>
                </div>
                <div class="addpropertybtn">
                    <button onclick="document.getElementById('add_property_container_popup').style.display='block'">Add Property</button>
                </div>
            </div>

            <div class="property-container">



            <div class="property-content">
            <?php 
                        $owner_id = $_SESSION['owner_id'];
                        // $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");
                         $sql = "SELECT * FROM owner_properties WHERE owner_retreat_id = '$owner_id'";
                         $results = mysqli_query($db, $sql);
                         $ctr = 0;
                         while($row = mysqli_fetch_row($results)):?>

                      
                       <?php if($ctr % 3 == 0):?>
                      
                       <div class='property-content'>
                        <div class='property'>
                                <div class='property-preview'>
                                    <img src='properties_pictures/<?php echo $row[3]?>'/>
                                </div>
                                <div class='property-desc'>
                                    <h3><?php echo $row[1]?></h3><hr>
                                    <div class="property-desc-scroll">
                                        <h4><?php echo $row[2]?></h4>
                                    </div>
                                    <a href='Property_manager.php?properties_delete=<?php echo $row[0]?>'>Delete</a>
                                </div>
                            </div>
                       </div>
                       <?php else : ?>
   
                       <div class='property'>
                        <div class='property-preview'>
                            <img src='properties_pictures/<?php echo $row[3]?>'/>
                        </div>
                        <div class='property-desc'>
                            <h3><?php echo $row[1]?></h3><hr>
                            <div class="property-desc-scroll">
                                <h4><?php echo $row[2]?></h4>
                            </div>
                            <a href='Property_manager.php?properties_delete=<?php echo $row[0]?>'>Delete</a>
                        </div>
                    </div>


                        <?php endif ?>
                                          
                        <?php $ctr++?>
                        <?php endwhile;?>
            </div>



                
                <div class="properties-right-column-list">
               
                </div>

            <div id="add_property_container_popup" class="modal">
                <div class="add_property_container_popup">
                    <span onclick="document.getElementById('add_property_container_popup').style.display='none'" class="close-btn">&times;</span>
                    <form action="" method="post"  enctype="multipart/form-data"> 
                        <div class="add_property_img animate ">
                            <h2>Add Property</h2>
                            <center>
                            <div class="property_preview-pic">
                                <img src="Resources/bg1.jpg"/>
                            </div>
            
                            <div class="choosefile">
                            <input type="file" name="property_picture[]" id="property_picture">
                            </div>
                            </center>
                            <div class="property-name">
                                <span class ="details" for="property_name">Property Name:</label>
                                <input type="text" name="property_add_name" id="property_add_name"><br>

                                <span class ="details" for="property_price">Property Price:</label>
                                <input type="text" name="property_add_price" id="property_add_price"><br>


                            </div>
                            
                        </div>     
                        
                        <div class="add_property_desc">
                            <h2>Description</h2>
                            <textarea id="properties_add_description" name="properties_add_description" value=""></textarea>
                       
                            <br>
                            <h2>List your amenities</h2>
                            <textarea id="properties_add_amenities" name="properties_add_amenities" value=""></textarea>
                        </div>
            
                        <center>
                        <div class="savebtn">
                            <input type="submit" id="properties_add" name = "properties_add" id ="properties_add" value="Add Property">   
                        </div>
                        </center><br>
                    </form>
                </div>
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