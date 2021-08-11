<?php
    include('connection.php');
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(-1);
    //You can comment the three blocks above if you want to see errors
  //  ini_set('display_errors', 1);
  //  ini_set('display_startup_errors', 1);
  //  error_reporting(E_ALL);
    
    session_start();

    //Initializing variables

    $search_results_keyword = "";
    
    $errors = array();
 

    //connect to db

    //$db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");

    //Search at main homepage
    if(isset($_GET['search_btn'])){
   

        if(isset($_GET['main-search-bar'])){
            $search_results_keyword = mysqli_real_escape_string($db, $_GET['main-search-bar']);
        }
    
        //form validation

        if(empty($_GET['main-search-bar'])){
         //   //echo "No search query";
            array_push($errors, "Input the search field");
        }
        

        
    //Execute search if no error
    
        if(count($errors) == 0){
            //Description not name 
            $query = "SELECT * FROM retreat_place WHERE retreat_description LIKE '%{$search_results_keyword}%'";
           // mysqli_query($db, $query);
            $results = mysqli_query($db, $query);
            $search_counter = 0;
            $_SESSION['search-results-retreat-array'] = array();
            $_SESSION['retreat-place-id-array'] = array();
            $_SESSION['owner-retreat-id-array'] = array();
            $_SESSION['retreat-image-array'] = array();
            //Getting the retreat place thru array
            while($row = mysqli_fetch_row($results)){
               // $_SESSION['search-results-retreat'] = $row[1];
                array_push($_SESSION['search-results-retreat-array'], $row[1]);
               // $_SESSION['retreat-place-id'] = $row[0];
                array_push($_SESSION['retreat-place-id-array'], $row[0]);

                array_push($_SESSION['retreat-image-array'], $row[2]);
               // $_SESSION['owner-retreat-id'] = $row[3];
                array_push($_SESSION['owner-retreat-id-array'], $row[3]);
                $search_counter++;
                //Retreat description from this query
            }
            $_SESSION['search-counter'] = $search_counter;
           
            unset($errors);
            $errors = array();

    
            
    
            header('location: SearchResultsPage.php');
          
        }
        else{
            
         //   //echo "There is an error";
         //   //echo count($errors);
            
           
        }
    
    }
   


//For searchpage
    if(isset($_GET['searchpage_btn'])){
   

        if(isset($_GET['main-results-search-bar'])){
            $search_results_keyword = mysqli_real_escape_string($db, $_GET['main-results-search-bar']);
        }
    
        //form validation

        if(empty($_GET['main-results-search-bar'])){
            //echo "No search query";
            array_push($errors, "Input the search field");
        }
        

        
    //Execute search if no error
    
        if(count($errors) == 0){
            //Description not name 
            $query = "SELECT * FROM retreat_place WHERE retreat_description LIKE '%{$search_results_keyword}%'";
           // mysqli_query($db, $query);
            $results = mysqli_query($db, $query);
            $search_counter = 0;
            $_SESSION['search-results-retreat-array'] = array();
            $_SESSION['retreat-place-id-array'] = array();
            $_SESSION['owner-retreat-id-array'] = array();
            $_SESSION['retreat-image-array'] = array();
        
            //Getting the retreat place thru array
            while($row = mysqli_fetch_row($results)){
               // $_SESSION['search-results-retreat'] = $row[1];
                array_push($_SESSION['search-results-retreat-array'], $row[1]);
               // $_SESSION['retreat-place-id'] = $row[0];
                array_push($_SESSION['retreat-place-id-array'], $row[0]);

                array_push($_SESSION['retreat-image-array'], $row[2]);
               // $_SESSION['owner-retreat-id'] = $row[3];
                array_push($_SESSION['owner-retreat-id-array'], $row[3]);
                $search_counter++;
                //Retreat description from this query
            }
            $_SESSION['search-counter'] = $search_counter;
           
            unset($errors);
            $errors = array();

    
            
    
            header('location: SearchResultsPage.php');
          
        }
        else{
            
         //   //echo "There is an error";
           // //echo count($errors);
            
           
        }
    
    }
    if(isset($_GET['retreat_access'])){
        $id = $_GET['retreat_access'];
       // $_SESSION['review-counter'] = 0;
        $_SESSION['owner-access-id'] = $id;
        $_SESSION['all-info-about-retreat'] = array();
        $_SESSION['all-info-about-property'][] = array();
        $_SESSION['all-info-about-pics-description'] = array();
        $query = "SELECT * FROM owner_listing_registration where owner_retreat_id = '$id'";
        $results = mysqli_query($db, $query);
        $ctr = 0;
        //owner listing registration attainment
        while($row = mysqli_fetch_row($results)){
            /*
                owner_listing_registration
                0 - owner_retreat_id
                1 - main_contact_name
                2 - email
                3 - password
                4 - retreat_name
                5 - retreat_type
                6 - state_province
                7 - street_address
                8 - zip_postal
                9 - city
                10 - main_phone_number
                11 - license_number

                */
    
           
                while($ctr<12){
                    if($ctr!=3){
                        array_push($_SESSION['all-info-about-retreat'], $row[$ctr]);
                    }
                    else{
                        array_push($_SESSION['all-info-about-retreat'], "Blank");
                    }
                 
              
                    $ctr++;
                    
                }
            
         
        }

        //retreat_place attainment


        $query = "SELECT * FROM retreat_place where owner_retreat_id = '$id'";
        $results = mysqli_query($db, $query);
        $ctr = 0;
        $_SESSION['properties-ctr'] = 0;
        while($row = mysqli_fetch_row($results)){
            /*
                retreat_place
                0 - retreat_place_id
                1 - retreat_description
                2 - retreat_image
                3 - owner_retreat_id
        
            */
        
            while($ctr<4){
                 
                array_push($_SESSION['all-info-about-pics-description'], $row[$ctr]);
                $ctr++;
                    
                
            }
         
        }


        //owner_properties attainment
      /*
                retreat_place
                0 - owner_property_id
                1 - property_name
                2 - property_description
                3 - property_image
                4 - owner_retreat_id
        
            */
        
        $query = "SELECT * FROM owner_properties where owner_retreat_id = '$id'";
        $results = mysqli_query($db, $query);
        $ctr = 0;
        /*
        while($row = mysqli_fetch_row($results)){
       
        
                while($ctr<5){
                    //Treat this like a multi layer array   
                array_push($_SESSION['all-info-about-property'][$_SESSION['properties-ctr']], $row[$ctr]);
                $ctr++;
                    
                
            }
            $_SESSION['properties-ctr']++;
         
        }*/



        header('location: EventPlacePage.php');
    }



    if(isset($_GET['property_access'])){
        $id = $_GET['property_access'];
        $_SESSION['property-access-id'] = $id;
      

        header('location: BookingPage.php');
    }


    //Check in
    if(isset($_GET['check_in'])){
        $id = $_GET['check_in'];
        $query = "UPDATE booking SET `status` = 'Checked in' where booking_id = '$id'";
       
        if(mysqli_query($db, $query)){
            header('location: OwnerReservations.php');
        }
      
    }
    //Check out
    if(isset($_GET['check_out'])){
        $id = $_GET['check_out'];
        $query = "UPDATE booking SET `status` = 'Checked out' where booking_id = '$id'";
       
        if(mysqli_query($db, $query)){
            header('location: OwnerReservations.php');
        }
      
    }

    if(isset($_GET['delete_check_out'])){
        $id = $_GET['delete_check_out'];
        $query = "UPDATE booking SET `status` = 'Finished' where booking_id = '$id'";
       
        if(mysqli_query($db, $query)){
            header('location: OwnerReservations.php');
        }
    }


    //Toggle property availability
    if(isset($_GET['toggle_availability'])){

        $id = $_GET['toggle_availability'];

        //Check if there are people in the area before making it unavailable
        $query = "SELECT * FROM booking where owner_property_id = '$id'";

        $results = mysqli_query($db, $query);
        while($row = mysqli_fetch_row($results)){
            if(strcmp($row[7], "Checked in") == 0 || strcmp($row[7], "Booked") == 0){
                   $_SESSION['no-availability-toggle'] = "You cannot alter the status of property if there are people checked in";
                   exit(header("Location: OwnerReservations.php"));
                   
               }    
           }
       





        $input_availability = "";
        $query = "SELECT * FROM owner_properties WHERE owner_property_id = '$id'";
        $results = mysqli_query($db, $query);
        if($row = mysqli_fetch_row($results)){
            if(strcmp($row[7], "Available") == 0){
                $input_availability = "Unavailable";
  
            }
            else{
                $input_availability = "Available";
     
            }
        }
      
        $query = "UPDATE owner_properties SET `status` = '$input_availability' where owner_property_id = '$id'";
       
        if(mysqli_query($db, $query)){
            header('location: OwnerReservations.php');
        }
    }
      
    


    


    //Booking a customer from bookingpage.php
    if(isset($_POST['submit_book'])){

        //Initialize variables
        $customer_name = "";
        $check_in= "";
        $check_out = "";
        $customer_contactNo = "";
        $customer_email = "";

   
        if(isset($_POST['cust_name'])){
            $customer_name = mysqli_real_escape_string($db, $_POST['cust_name']);
        }
    
        if(isset($_POST['check-in'])){
            $check_in = mysqli_real_escape_string($db, $_POST['check-in']);
        }

        if(isset($_POST['check-out'])){
            $check_out = mysqli_real_escape_string($db, $_POST['check-out']);
        }
    

        if(isset($_POST['cust_contact'])){
            $customer_contactNo = mysqli_real_escape_string($db, $_POST['cust_contact']);
        }
    
        if(isset($_POST['cust_email'])){
            $customer_email = mysqli_real_escape_string($db, $_POST['cust_email']);
        }
    

        //form validation

    
        if(empty($_POST['cust_name'])){
            $customer_name = mysqli_real_escape_string($db, $_POST['cust_name']);
            array_push($errors, "Your name is required");
        }
    
        if(empty($_POST['check-in'])){
            $check_in = mysqli_real_escape_string($db, $_POST['check-in']);
            array_push($errors, "Check in date is required");
        }

        if(empty($_POST['check-out'])){
            $check_out = mysqli_real_escape_string($db, $_POST['check-out']);
            array_push($errors, "Check out date is required");
        }
    

        if(empty($_POST['cust_contact'])){
            $customer_contactNo = mysqli_real_escape_string($db, $_POST['cust_contact']);
            array_push($errors, "Your contact number is required");
        }
    
        if(empty($_POST['cust_email'])){
            $customer_email = mysqli_real_escape_string($db, $_POST['cust_email']);
            array_push($errors, "Your email is required");
        }
    
 
        
    //Book user if no error
    
        if(count($errors) == 0){
            /*
                 0 - booking_id (DONE)
            1 - ref_no (NOT YET) - RANDOMLY GENERATED
            2 - owner_retreat_id (DONE)
            3 - owner_property_id (DONE)
            4 - check_in (INPUT)
            5 - check_out n (INPUT)
            6 - price (DONE * CHECKOUT-CHECKIN)
            7 - status (BOOKED/CHECKED IN/CHECKED OUT)
            8 - name (INPUT)
            9 - contact_no (INPUT)
            10 - email (INPUT)
                */

            




              
            $ref_no = mt_rand(100000000000,999999999999); 
            $ref_no = strval($ref_no);
            $owner_id = $_SESSION['owner-access-id'];
            $owner_property_id = $_SESSION['property-access-id'];
            
            $status = "Booked";

            //First check availability of property
            $query = "SELECT * FROM owner_properties WHERE owner_property_id = '$owner_property_id'";
            $results = mysqli_query($db, $query);
            if($row = mysqli_fetch_row($results)){
                if(strcmp($row[7], "Unavailable") == 0){
                    $_SESSION['unavailable-property'] = "Property is unavailable, sorry!";
                    exit(header("Location: EventPlacePage.php"));
                    
                }      
   
            }


            //Check duplicaation

  
            //Check if the email is checked in. FAlse it returns without succession
            $query = "SELECT * FROM booking WHERE email = '$customer_email'";
            $results = mysqli_query($db, $query);
            while($row = mysqli_fetch_row($results)){
                 if(strcmp($row[7], "Checked in") == 0 || strcmp($row[7], "Booked") == 0){
                         $_SESSION['no-same-user-booking'] = "You cannot check in with same email at same booking";
                        exit(header("Location: EventPlacePage.php"));
                        
                    }    
                }
           

          //  1000-0000-0000
          //  9999-9999-9999

  
            $date1 = new DateTime($check_in);
       
            $date2 = new DateTime($check_out);
            $interval = $date1->diff( $date2);
         
            // shows the total amount of days (not divided into years, months and days like above)
        
            $price = $_SESSION['property-price'] * $interval->days;
           if($price <= 0){
                $price = $_SESSION['property-price'];
            }


            $query = "INSERT INTO booking (ref_no,owner_retreat_id,owner_property_id,check_in,check_out,price,`status`,`name`,contact_no,email) VALUES ('$ref_no', '$owner_id', '$owner_property_id', '$check_in','$check_out', '$price', '$status', '$customer_name', '$customer_contactNo', '$customer_email')";
   
       
            if(mysqli_query($db, $query)){
                unset($errors);
                $errors = array();
                $_SESSION['cust-ref-no'] =  $ref_no;
                $_SESSION['cust-booking-ctr'] = 0;
                header('location: EventPlacePage.php');
            }          
            else{
                //echo "Else";
                //echo "<br>";
                //echo "Name: ".$customer_name;
                //echo "<br>";
               //echo  "Check in: ".$check_in;
               //echo "<br>";
                //echo "Check out: ".$check_out;
                //echo "<br>";
               //echo "contact no: ".$customer_contactNo;
               //echo "<br>";
               //echo "Cust email: ".$customer_email;
               //echo "<br>";
               //echo "ref no: ".$ref_no;
               //echo "<br>";
               //echo "price: ".$price;
               //echo "<br>";
               //echo "status: ".$status;
               //echo "<br>";
               //echo "owner id: ".$owner_id;
               //echo "<br>";
               //echo "property id: ".$owner_property_id;
               //echo "<br>";

            }
        }
    }
    

    
    
    

    //Delete booker if owner wants to
    if(isset($_GET['book_delete'])){
        $id = $_GET['book_delete']; //Get booking id
   
        $query = "DELETE FROM booking where booking_id = '$id'";

        if($results = mysqli_query($db, $query)){
            header("location: OwnerReservations.php");
        }
        
    }

    //Check from eventplacepage if inputted email is from the property
    if(isset($_POST['eventplace_customer_review_submit'])){

        $review_email = "";
        $review = "";
        $feedback_refno = "";
        $feedback_check_in = "";
        $feedback_check_out = "";
        
        $review_range = "";

        $errors = array();

        if(isset($_POST['email_review'])){
            $review_email = mysqli_real_escape_string($db, $_POST['email_review']);
        }

        if(isset($_POST['eventplace_customer_review'])){
            $review = mysqli_real_escape_string($db, $_POST['eventplace_customer_review']);
        }

        $review_range = $_POST['review_range'];
    
        //form validation


        if(empty($_POST['email_review'])){
            array_push($errors, "Input the email ield");
        }

        if(empty($_POST['eventplace_customer_review'])){
            array_push($errors, "Input the review field");
        }

   

        if(count($errors) == 0){
            //Finally check email from booking
            $query = "SELECT * FROM booking where email = '$review_email'";
            $results = mysqli_query($db, $query);
            $owner_id = $_SESSION['owner-access-id'];
     
            
            //check if equal retreat ID
            while($row = mysqli_fetch_row($results)){
                //store checkin, checkout, and ref no if confirmed
                if($row[2] ==  $owner_id){
                    $feedback_refno = $row[1];   
                    $feedback_check_in = $row[4];
                    $feedback_check_out = $row[5];
                
                    $_SESSION['valid-review'] = "The email went to this place at least once";
                    //echo $_SESSION['valid-review'];
                }
            }
    

            

       //check if duplicates from review_table
       $query = "SELECT * FROM review_retreat WHERE review_email = '$review_email'";
       $results = mysqli_query($db, $query);
       while($row = mysqli_fetch_row($results)){
            if($row[6] == $owner_id){
                $_SESSION['invalid-review'] = "Email already gave their feedback on this property";
                exit(header("location: index.php"));
            }
       }
       
       /*if(mysqli_query($db, $query)){
           $_SESSION['invalid-review'] = "Email already gave their feedback";
           exit(header("Location: index.php"));
           
        }*/

 



            //if the email matches, then proceed with the insertion to review_retreat table
            if(isset($_SESSION['valid-review']) && !isset($_SESSION['invalid-review'])){


                  
                $date1 = new DateTime($feedback_check_in);
            
                $date2 = new DateTime($feedback_check_out);
                $interval = $date1->diff($date2);
                $days_stay = $interval->days;
                //echo "Days stay: ".$days_stay;
                

                $query = "INSERT INTO review_retreat (review_ref_no, review_email, review_check_in, review_days, review_feedback, owner_retreat_id, rating) 
                VALUES ('$feedback_refno', '$review_email', '$feedback_check_in', '$days_stay', '$review', '$owner_id', '$review_range')";
                if(mysqli_query($db, $query)){
                    $_SESSION['review-submitted'] = "User reviewed successfully";
                  //  $_SESSION['review-counter']++;
                    header("location: EventPlacePage.php");
                }
            }
        }
        else{
        
            header("location: ListOwnerPlaceSignIn.php");
        }
    }
   

    if(isset($_GET['review_delete'])){
        $id = $_GET['review_delete']; //Get booking id
   
        $query = "DELETE FROM review_retreat where review_id = '$id'";

        if($results = mysqli_query($db, $query)){
            header("location: OwnerReviews.php");
        }
        
    }
    
?>