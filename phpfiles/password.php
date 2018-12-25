<?php
// session_start();
include "connect.php";

if(isset($_POST['submit']))
{
    $oldpass = mysqli_real_escape_string($conn,$_POST['oldpassword']);
    $pass = mysqli_real_escape_string($conn,$_POST['password']);
    $re_pass = mysqli_real_escape_string($conn,$_POST['re-password']);

    $username = $_SESSION['name'];

    $checkIfOldPassCorrect = "SELECT apassword FROM login_details WHERE username='$username' AND apassword ='$oldpass' ";
    $result = mysqli_query($conn,$checkIfOldPassCorrect);
    $row = mysqli_fetch_array($result)[0];
    echo $row;
    if($row == $oldpass)
    { 
       if($pass == $re_pass)
       {
            $query = "UPDATE login_details SET apassword = '$pass' WHERE username = '$username' AND apassword = '$oldpass' ";
            if(mysqli_query($conn,$query))
            {
                header("Location: ../firstpage.php");
                exit();
            }
            else{
                $_SESSION['cpass']="Something went wrong.";
                header("Location: changePassword.php");
                exit();
            }
        }
        else{
            $_SESSION['cpass']="Password does not match.";
            header("Location: changePassword.php");
            exit();
        }

       
    }

    else{
            $_SESSION['cpass']="Incorrect Password.";
 
        header("Location: changePassword.php");
        exit();
    }
   }

else{
$_SESSION['cpass']="Something went wrong.";
}
?>