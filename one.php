<?php
include 'connect.php';
if(isset($_POST['reply']))
{
  $comment = mysqli_real_escape_string($conn,$_POST['input']);
  $sqla ="INSERT INTO reply(reply) VALUES('$comment')";
  if(mysqli_query($conn,$sqla) === TRUE)
  {
    $_SESSION['Reply'] = "Reply successful.";
    header("Location: ../phpfiles/all_comment.php");
  }
  else{
    $_SESSION['Reply']="Reply not successful.";
    header("Location: ../compare.php");
    exit();
  }
}
else{
  unset($_SESSION['Reply']);
  echo "error";
}
?>