<?php

include 'connect.php';
if(isset($_POST['device_name']))
{
    $device_name = $_POST['device_name'];
    $temp=0;
    $query = "SELECT * FROM ratings WHERE device_name = '$device_name' ";
    $result  = mysqli_query($conn,$query);

    $q = "SELECT images FROM ratings WHERE device_name='$device_name' ";
    $qRes = mysqli_query($conn,$q);
    $row1 = mysqli_fetch_array($qRes);
    $alt_image = "this.src='../images/not-available.png';";
    echo "<div class='image'><img src=../images/".$row1[0]." alt='image not available' onError=".$alt_image."></div>";
    echo "<div style='text-align:center;'><h1>All comments and reviews</h1></div>";
    echo "<div class='all_comments_block'>";
    while( $row = mysqli_fetch_assoc($result))
    {
        
        echo "<div id='comment_block'><h3 id='username_comm'>".$row['username']."</h3><p id='comm_date'>On ".$row['com_date']."</h3><br>";
        for($i=0;$i<$row['rate_count'];$i++)
        {
            echo "<i class='fa fa-star id='heart_show'></i>";
        }
        $temp = $temp + 1;
        echo "<p id='comment'>".$row['comment']."</p>";
        echo "<i id='thumbs' title = 'Like' onclick='myFunction(this, $temp)' class='fa fa-thumbs-up'></i>";
        $comment_id  = $row['id'];
       
        echo "</div>";
    }
    echo "</div>";
    
}


?>