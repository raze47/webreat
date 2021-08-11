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
      <section class="container1">

        <center><br>
            <form action="SearchResultsPage.php" method="get">
               <div class="search-bar">
                    <div class="search-bar-content">
                        <input type="search" id="main-search-bar" name="main-search-bar" placeholder="Search a destination or retreat place">
                    </div>
                    <div class="searchbtnhome">
                        <input type="submit" id="search_btn" name="search_btn" value="Search">
                    </div>     
                </div>
            </form>
         </center><br>
         
        <div class="resultcontainer">
            <div class="container-results">            
                <div class="actual-results">
                <!---->
                 <?php if ($_SESSION['search-counter']!=0):  ?>
                
                 <?php 
                 //For getting the search results description
                    //  $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");
                      $query = "SELECT * FROM owner_listing_registration";
                                              
                      $results = mysqli_query($db, $query);

                      //initialize variables
                      $retreat_city = array();
                      $retreat_name = array();
                      $retreat_owner_name = array();
                      $retreat_type = array();

                      $ctr_description = 0;
                      while($row = mysqli_fetch_row($results)){

                        if($row[0] == $_SESSION['owner-retreat-id-array'][$ctr_description]){
                            array_push($retreat_name, $row[4]);
                            array_push($retreat_owner_name, $row[1]);
                            array_push($retreat_type, $row[5]);
                            array_push($retreat_city, $row[9]);
                            /*
                            echo "retreat name success: ". $retreat_name[$ctr_description];
                            echo "<br>";
                            echo "row[0] success: ".$row[0];
                            echo "<br>";
                            echo "ctr desc success".$ctr_description;
                            echo "<br>";
                            echo "SESSION success".$_SESSION['owner-retreat-id-array'][$ctr_description];
                            echo "<br>";*/
                            $ctr_description++;
                     }
                        else{
                            /*
                            echo "retreat name fail: ". $retreat_name[$ctr_description];
                            echo "row[0] fail: ".$row[0];
                            echo "<br>";
                            echo "ctr desc ".$ctr_description;
                            echo "<br>";
                            echo "SESSION FAIL".$_SESSION['owner-retreat-id-array'][$ctr_description];
                            echo "<br>";*/
                        }
                       

                      }
                 
                 $ctr = 0;
                 
                    while ($ctr < $_SESSION['search-counter']) {
                        /*
                        $retreat_pfp 
                        $retreat_desc
                        $retreat_names
                        $retreat_owner_name
                         $retreat_type 
                        */

                       // $_SESSION['owner-retreat-id-array'][$ctr]
                        $retreat_pfp = $_SESSION['retreat-image-array'][$ctr];
                        $retreat_desc = $_SESSION['search-results-retreat-array'][$ctr];
                     //   echo $retreat_desc;

                    echo "
                     <div class='search-result'>
                        <div class='preview-pic'>
                            <img class='preview' src='retreat_pfp/".$retreat_pfp."'/>
                        </div>
                        <div class='eventplace'>
                            <div class='eventplace-info'>
                                <h1><a href='Client_handling.php?retreat_access=".$_SESSION['owner-retreat-id-array'][$ctr]."'>".$retreat_name[$ctr]."</a></h1>
                                <h4>".$retreat_city[$ctr]."</h4>
                                <div class='eventplace-reviews'>
                                    <div class='rev-score'>
                                        <h2>9.0</h2>
                                    </div>
                                    <div class='rev-desc'>
                                        <h3>Very Good</h3>
                                        <h5>1000 Reviews</h5>
                                    </div>
                                </div>
                                <br>
                                <div class='eventplace-desc'>
                                    <p>".$retreat_desc."</p>
                                </div>
                            </div>
                            <div class='eventplace-price'> 
                                <h4>Price starts:</h4>
                                <h2>Php 5,000</h2>
                                <h3>Free Cancellation</h3>
                                <p>3 Nights 5 Adults</p><br><br><br><br>
                              
                                <div class='seeavailability'>
                                    <input type='submit' value='See Availability'>
                                </div>
                           
                            </div>
                        </div>
                    </div>
                    ";
                    $ctr++;


                 }?>

                

                <?php else: ?>
                    <h1>No results :(</h1>
                  
                <?php endif; ?>
                </div>
             
            </div>
        </div>
      </section>
   
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
    </body>
</html>