<?php

include 'connect.php';
if(isset($_POST['device_name']))
{
    $device_name = $_POST['device_name'];
    $temp=0;
    $query = "SELECT * FROM ratings WHERE device_name = '$device_name' ORDER BY id DESC";
    $result  = mysqli_query($conn,$query);

    $q = "SELECT images FROM ratings WHERE device_name='$device_name' ";
    $qRes = mysqli_query($conn,$q);
    $row1 = mysqli_fetch_array($qRes);
    $alt_image = "this.src='../images/not-available.png';";
    echo "<div class='image'><img src=../images/".$row1[0]." alt='image not available' onError=".$alt_image."></div>";
    echo "<div class='flexed_data'><h1 style='margin-left:30px;'>All comments and reviews</h1>";
    echo "<div class='all_comments_block'>";
    while( $row = mysqli_fetch_assoc($result))
    {
        
        echo "<div id='comment_block'><h3 id='username_comm'>".$row['username']."</h3><p id='comm_date'><i class='fa fa-clock' style='color:black;font-size:16px'></i> ".$row['com_date']."</p><br>";
        for($i=0;$i<$row['rate_count'];$i++)
        {
            echo "<i class='fa fa-star' id='heart_show'></i>";
        }
        $temp = $temp + 1;
        echo "<p>".$row['comment']."</p>";
        echo "<i id='thumbs' title = 'Like' onclick='myFunction(this, $temp)' class='fa fa-thumbs-up'></i>";
        $comment_id  = $row['id'];
       
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    
}


if(isset($_POST['fav_device_name']))
{
    $device_name = $_POST['fav_device_name'];
    $user = $_SESSION['name'];
    $temp=0;
    $query = "SELECT * FROM ratings WHERE device_name = '$device_name' group by id desc ";
    $result  = mysqli_query($conn,$query);

    $q = "SELECT images FROM ratings WHERE device_name='$device_name' AND username = '$user'";
    $qRes = mysqli_query($conn,$q);
    $row1 = mysqli_fetch_array($qRes);
    $alt_image = "this.src='../images/not-available.png';";
    echo "<div style='text-align:center';><h3>".$device_name."</h3></div>";
    echo "<div class='flex_data'><div class='image'><img src=../images/".$row1[0]." alt='image not available' onError=".$alt_image."></div>";
    echo "<div class='all_comments_block'>";
    while( $row = mysqli_fetch_assoc($result))
    {
        
        echo "<div id='comment_block'><h3>You commented on </h3><p id='comm_date'>On ".$row['com_date']."</h3><br>";
        for($i=0;$i<$row['rate_count'];$i++)
        {
            echo "<i class='fa fa-star id='heart_show'></i>";
        }
        $temp = $temp + 1;
        echo "<br><p id='comment'>".$row['comment']."</p>";
        echo "</div>";
    }
    echo "</div>";
    echo "</div>";
    
}



?>