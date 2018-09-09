<?php
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "website_compare";

    $conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

    if(isset($_POST['submit-signup']))
    {
        $useremail = mysqli_real_escape_string($conn, $_POST['user_email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if($useremail != ""  || $password != "")
        {  
           $query1 = " SELECT * FROM detail ";
           $query = "INSERT INTO detail(user,pass) VALUES('$useremail ', '$password')";
            
        
        if (mysqli_query($conn,$query) === TRUE)
         {
            echo "New record created successfully";
         } 
        else {
            echo "Error: " . $query . "<br>" . $conn->error;
        }

        }
        else{
            header("Location: ../firstpage.php?error");
            exit(); 
        }
    }
    else{
        header("Location: ../firstpage.php?error");
        exit();
    }
?>