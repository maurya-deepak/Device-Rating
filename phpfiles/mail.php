<?php
include 'connect.php';

if(isset($_POST['submit']))
{
    $email = $_POST['email'];
    $query = "SELECT * FROM login_details WHERE Email = '$email' ";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
    $sendMailTo = $row['Email'];
    $subject = "Reset Your Password";
    $message = "Your Password is: ".$row['apassword']."  .Please Reset your password by login again to http://localhost/compare-webpage-php/firstpage.php";
    // echo $subject ;
    // echo $message;
    if(mail($sendMailTo,$subject,$message))
    {
        $_SESSION['mail_sent']="Email send successfully to ".$sendMailTo;
        header("Location: forgetPassword.php");
        exit();
    }
    else{
        $_SESSION['mail_sent']="<p style='color:red'>Email sending failed.</p>";
        header("Location: forgetPassword.php");
        exit();
    }

}

?>