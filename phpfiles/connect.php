<?php 
    
    session_start();
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "website_compare";

    $conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);

    if(isset($_POST['user_email']))
    {  
        $email = $_POST['user_email'];
        $username =  $_POST['username'];
        $password =  $_POST['password'];
  
        $query = "INSERT INTO login_details(Email,username,apassword) VALUES('$email','$username ', '$password')";

        if (mysqli_query($conn,$query) === TRUE)
        {
            $_SESSION['name'] = $username ; 
        } 
        else 
        {
            echo '1';
        }
    }
?>
