<?php

/*
        ini_set('display_errors', 0);
        ini_set('display_startup_errors', 0);
        error_reporting(-1);*/
        //You can comment the three blocks above if you want to see errors
        include('connection.php');
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        
        session_start();
    
        //Initializing variables
    
        $owner_email = "";
        $owner_retreatName = "";
        $owner_name = "";
        $owner_password = "";
        $owner_confirm_password = "";

        $owner_retreat_description = "";



        $errors = array();
    
        //connect to db
    
        //$db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");

  
       //Changing picture and description of retreat
        if(isset($_POST['profile_settings_submit'])){

            if(isset($_POST['profile_settings_description'])){
                    $owner_retreat_description = mysqli_real_escape_string($db, $_POST['profile_settings_description']);
                }
            if(empty($_POST['profile_settings_description'])){
                    array_push($errors, "Include site description");
            }
                   
            $output_dir = "retreat_pfp/";/* Path for file upload */
            $RandomNum   = time();
            $ImageName      = str_replace(' ','-',strtolower($_FILES['retreat_picture']['name'][0]));
            $ImageType      = $_FILES['retreat_picture']['type'][0];
        
            $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
            $ImageExt       = str_replace('.','',$ImageExt);
            $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
            $NewImageName = $ImageName.'-'.$RandomNum.'.'.$ImageExt;
            $ret[$NewImageName]= $output_dir.$NewImageName;

            /* Try to create the directory if it does not exist */
            if (!file_exists($output_dir))
            {
                @mkdir($output_dir, 0777);
            }               
            move_uploaded_file($_FILES["retreat_picture"]["tmp_name"][0],$output_dir."/".$NewImageName );

            //UPDATE

            $owner_id = $_SESSION['owner_id'];
           // $owner_id = 4;
           // $owner_id = $_SESSION['owner_success'];


                $sql = "UPDATE retreat_place SET retreat_image = '$NewImageName', retreat_description = '$owner_retreat_description' WHERE owner_retreat_id = '$owner_id'";
                if (mysqli_query($db, $sql)) {
                    // echo "successful!";
                    unset($errors);
                    $errors = array();
                    header('location: OwnerProfile.php');
                    // echo $NewImageName;
                    // echo $owner_retreat_description;
                    // echo $owner_id;
                    // echo $_SESSION['owner_success'];
                }
                else {
                // echo "Error: " . $sql . "" . mysqli_error($db);
            `   }

      
        }




        //Update forms
        if(isset($_POST['profile_settings_update'])){
       
            if(isset($_POST['owner_name_update'])){
                $owner_name = mysqli_real_escape_string($db, $_POST['owner_name_update']);
            }
        
            if(isset($_POST['owner_retreatName_update'])){
                $owner_retreatName = mysqli_real_escape_string($db, $_POST['owner_retreatName_update']);
            }
  
            if(isset($_POST['owner_password_update'])){
                $owner_password = mysqli_real_escape_string($db, $_POST['owner_password_update']);
            }
            if(isset($_POST['owner_confirm_password_update'])){
                $owner_confirm_password = mysqli_real_escape_string($db, $_POST['owner_confirm_password_update']);
            }
           
        
        
        
            //form validation
    
            if(empty($_POST['owner_name_update'])){
                // echo "1";
                array_push($errors, "The name of owner is required");
            }
            
            if(empty($_POST['owner_retreatName_update'])){
                // echo "6";
                array_push($errors, "Retreat Name is required");
            }
          
            if(empty($_POST['owner_password_update'])){
                // echo "11";
                array_push($errors, "Password is required");
            }
            if(empty($_POST['owner_confirm_password_update'])){
                // echo "12";
                array_push($errors, "Confirm the password");
            }
            if($owner_password != $owner_confirm_password){
                
                array_push($errors, "Password mismatch!");
            }
        
     
            
        //update owner if no error
        
            if(count($errors) == 0){
                $owner_password = md5($owner_password);
                $owner_email = $_SESSION['owner_email_success'];
                // echo $owner_email;
                /*		*/
                $query = "UPDATE owner_listing_registration SET main_contact_name = '$owner_name',
                password = '$owner_password', retreat_name = '$owner_retreatName'
                          WHERE email = '$owner_email'";

                mysqli_query($db, $query);
                unset($errors);
                $errors = array();
                header('location: OwnerProfile.php');
                // echo $_SESSION['owner_success'];
            }
            else{
                
                // echo "There is an error";
                // echo count($errors);
                
               
            }
        
        }

        //logout

        if(isset($_GET['owner_logout'])){
            session_destroy();
            
            header('location: index.php');
        }


            


?>