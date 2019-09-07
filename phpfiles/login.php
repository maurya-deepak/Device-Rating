<?php
    // session_start();
    // unset($_SESSION['EMAIL']);
    // unset($_SESSION['PASSWORD']);
    
    include 'connect.php';
    if(isset($_POST['username'])) 
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM login_details WHERE username = '$username' AND apassword = '$password' " ;
        $result = mysqli_query($conn,$sql);
        $resultcheck = mysqli_num_rows($result);
        if($resultcheck == 1)
        {  
            $_SESSION['name'] = $username ;
            echo "Success";
            // this is send to success of ajax
        }
        else
        { 
          echo "failed" ; // this is send to success of ajax
        }
    }
    

    else
    {
     header("Location: ../firstpage.php?error");
     exit();
    }
?>