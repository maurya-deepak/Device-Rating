<?php
if(isset($_POST['logout']))
{
//  if(isset($_SESSION['name']))
//  {
//     $_SESSION['name']=null;
//     session_start();
//     session_unset();
//     session_abort();
//     header("Location: ../firstpage.php");
//  }
 session_start();
 unset($_SESSION['name']);
 session_unset();
 session_abort();
 header("Location: ../firstpage.php");
}
?>