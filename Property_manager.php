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
    

        $property_name = "";
        $property_description = "";
        $property_amenities = "";
        $property_price = 0;




        $errors = array();
    
        //connect to db
    
      //  $db = mysqli_connect('localhost', 'root', '', 'webreat') or die("Could not connect to database");

  
       //Adding picture to property and submit
        if(isset($_POST['properties_add'])){

            if(isset($_POST['properties_add_description'])){
                 $property_description = mysqli_real_escape_string($db, $_POST['properties_add_description']);
                }
                if(isset($_POST['properties_add_amenities'])){
                    $property_amenities = mysqli_real_escape_string($db, $_POST['properties_add_amenities']);
                 }
    
            if(isset($_POST['property_add_name'])){
                $property_name = mysqli_real_escape_string($db, $_POST['property_add_name']);
             }

             if(isset($_POST['property_add_price'])){
                $property_price = mysqli_real_escape_string($db, $_POST['property_add_price']);
             }

             
             
            if(empty($_POST['properties_add_description'])){
                    array_push($errors, "Include property description");
            }

            if(empty($_POST['property_add_name'])){
                array_push($errors, "Include property name");
            }
            if(empty($_POST['property_add_price'])){
                array_push($errors, "Include property price");
            }

            if(empty($_POST['properties_add_amenities'])){
                array_push($errors, "Include property amenities");
            }
            //For image
                   
            $output_dir = "properties_pictures/";/* Path for file upload */
            $RandomNum   = time();
            $ImageName      = str_replace(' ','-',strtolower($_FILES['property_picture']['name'][0]));
            $ImageType      = $_FILES['property_picture']['type'][0];
        
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
            move_uploaded_file($_FILES["property_picture"]["tmp_name"][0],$output_dir."/".$NewImageName );

            //UPDATE

            $owner_id = $_SESSION['owner_id'];
           // $owner_id = 4;
           // $owner_id = $_SESSION['owner_success'];


                $sql = "INSERT INTO owner_properties (property_name, property_description, property_image, owner_retreat_id, property_amenities, price, `status`) 
                VALUES ('$property_name', ' $property_description', '$NewImageName', '$owner_id', '$property_amenities', '$property_price', 'Available')";
                if (mysqli_query($db, $sql)) {
                    // echo "successful!";
                    unset($errors);
                    $errors = array();

                    header('location: OwnerPropertiesPage.php');
                    // echo $NewImageName;
                    // echo $owner_retreat_description;
                    // echo $owner_id;
                    // echo $_SESSION['owner_success'];
                }
                else {

                // echo "Error: " . $sql . "" . mysqli_error($db);
                header('location: OwnerPropertiesPage.php');
            }



      
        }

        //Deleting property
        if(isset($_GET['properties_delete'])){
            $id = $_GET['properties_delete'];
            $query = "DELETE FROM owner_properties where owner_property_id = '$id'";
            mysqli_query($db, $query);
            header('location: OwnerPropertiesPage.php');
        }

        
        //logout

        if(isset($_GET['owner_logout'])){
            session_destroy();
            
            header('location: index.php');
        }

?>