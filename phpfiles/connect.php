<?php 
    if(session_id() == "")
    {
        session_start();
    }
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
                           
                            $_SESSION['name'] = $username;
                            header("Location: ../phpfiles/compare.php");
                            exit();
                        } 
                        else 
                        {
                            unset($_SESSION['name']);
                            echo "Error: " . $query . "<br>" . $conn->error;
                        }
                 }
              }
        }
    }

    // if(isset($_POST['reply']))
    // {
        
        
    //     echo "<h1>hiiiii</h1>";
    //     $comt = mysqli_real_escape_string($conn,$_POST['repl']);
    //     $user = $row['username'];
    //     $query = "INSERT INTO reply(username,comment) VALUES('$user','$comt')";
    //     if(mysqli_query($query) === TRUE)
    //     {
    //         echo "hiiiii";
    //     }
        
    // }
?>
