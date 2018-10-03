<?php
include 'phpfiles/connect.php';
if(isset($_POST['sendmail']))
{
  $emails = mysqli_real_escape_string($conn,$_POST['emailaddress']);
  echo $emails;
  $sql = "SELECT * FROM login_details where email = '$emails' ";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  $_SESSION['HAU'] = $count;
  if($count == 1)
  { 
    $subject = "Reset Your Password";
    $message = "To change your Password to go http://localhost/change_password";
    mail($emails,$subject,$message);
    echo "message send successfully.";
  }
  else{
    echo "message not send";
  }
}
?>