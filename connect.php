<?php 
    $dbservername = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "website_compare";

    $conn = mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname);
    
    if(isset($_POST['submit-signup']))
    {  
        $email = mysqli_real_escape_string($conn, $_POST['user_email']);
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        if($email == "")
        {    
            header("Location: ../sign_up_page.php?error=signup");
            exit();
        }
        else{
              if($username == "")
              {
                header("Location: ../sign_up_page.php?error=signup");
                exit();
              }
              else{
                 if($password == "")
                 {
                    header("Location: ../sign_up_page.php?error=signup");
                    exit();
                 }
                 else{
                       $query = "INSERT INTO login_details(Email,username,apassword) VALUES('$email','$username ', '$password')";

                        if (mysqli_query($conn,$query) === TRUE)
                        {
                            header("Location: ../phpfiles/compare.php");
                            exit();
                        } 
                        else 
                        {
                            echo "Error: " . $query . "<br>" . $conn->error;
                        }
                 }
              }
        }
    }
?>
