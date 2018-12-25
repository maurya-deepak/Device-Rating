<?php 
// session_start();
// include 'all_comment.php';
include 'connect.php';

if(isset($_POST['rate']))
{
  // $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $device_name = mysqli_real_escape_string($conn,$_POST['device_name']);
  $comment = mysqli_real_escape_string($conn,$_POST['comment']);

  $image = $_FILES['image']['name'];
  $target = "../images/".basename($image);

  $rate_count = $_POST['rate_count'];
  date_default_timezone_set('India/Mumbai');
  $date = date('d/m/Y');

  $usern = $_SESSION['name'];
    if($usern!='')
    {
        $sql = "INSERT INTO ratings(username,device_name,comment,rate_count,com_date,images) VALUES('$usern','$device_name','$comment','$rate_count','$date','$image')";
        if(mysqli_query($conn,$sql) === TRUE)
        {
          $_SESSION['device_name'] = $device_name ;
          $_SESSION['comment'] = $device_name ;
          $_SESSION['rate_count'] = $rate_count ;

          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
          }else{
            $msg = "Failed to upload image";
          }
          
          header("Location: ../phpfiles/compare.php");
          exit();
        }
        else
        {
        header("Location: ../phpfiles/compare.php?error");
        exit();
        }
    }
else{
      $_SESSION['not_logged_in'] = "true";
      header("Location: ../sign_up_page.php");
      exit();
  }
}



?>