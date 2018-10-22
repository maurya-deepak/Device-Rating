<?php

include 'connect.php';
if(isset($_POST['device_name']))
{
    $device_name = $_POST['device_name'];

    $query = "SELECT * FROM ratings WHERE device_name = '$device_name' ";
    $result  = mysqli_query($conn,$query);
   
    while( $row = mysqli_fetch_assoc($result))
    {
        echo "<div id='comment_block'><h3 id='username_comm'>".$row['username']."</h3><p id='comm_date'>On ".$row['com_date']."</h3>";
        echo "<p id='comment'>".$row['comment']."</p>";
        $comment_id  = $row['id'];
        // echo "<input type='text' placeholder='Comment here' id='input_reply'>";
        // echo "<input type='button' value='reply' id=' " .$comment_id ." ' onclick ='reply(this.id)'>";
        // echo "<i class='fab fa-gratipay' id='like' title='Like' name='like' onclick='like()'></i>";
        for($i=0;$i<$row['rate_count'];$i++)
        {
            echo "<i class='fa fa-heart id='heart_show'></i>";
        }
        echo "</div>";
    }
    
}
if(isset($_POST['on_comment']))
{
    $comment = $_POST['on_comment'];

    $query = "INSERT INTO reply()";
    $result  = mysqli_query($conn,$query);

}

?>