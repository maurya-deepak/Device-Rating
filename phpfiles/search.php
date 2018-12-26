<?php
include 'connect.php';

if(isset($_POST['text']))
{
    $searchtext = $_POST['text'];
   

    // echo $searchtext;
    $searchQuery = "SELECT device_name , images FROM ratings  WHERE device_name LIKE '%{$searchtext}%' GROUP BY device_name ";

    $search_result = mysqli_query($conn,$searchQuery);
   
    while($row = mysqli_fetch_assoc($search_result))
    {
        $image ="../images/".$row['images'];
       
        echo '<div class="data" style="background:image('.$image.', ../images/not-available.png)';
        if(isset($_SESSION['name'])){ 
          echo '<i class="fa fa-heart" id="fav-heart" title="Add to favourites"></i>'  ;
        }
        echo ' <div class="btn" >
                <label class="label">'.$row['device_name'].'</label>
               </div>';

        echo '<div class="show_rate">';

        $star5query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 5 ");
        $star5arr =  mysqli_fetch_array($star5query);
        $GLOBALS['star_five'] = $star5arr[0];

        $star4query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 4 ");
        $star4arr =  mysqli_fetch_array($star4query);
        $GLOBALS['star_four'] = $star4arr[0];

        $star3query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 3 ");
        $star3arr =  mysqli_fetch_array($star3query);
        $GLOBALS['star_three'] = $star3arr[0];

        $star2query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 2 ");
        $star2arr =  mysqli_fetch_array($star2query);
        $GLOBALS['star_two'] = $star2arr[0];

        $star1query = mysqli_query($conn,"SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' AND rate_count = 1 ");
        $star1arr =  mysqli_fetch_array($star1query);
        $GLOBALS['star_one'] = $star1arr[0];

        $query = "SELECT COUNT(rate_count) FROM ratings WHERE device_name = '{$row['device_name']}' ";
        $sum = "SELECT SUM(rate_count) FROM ratings  WHERE device_name = '{$row['device_name']}' ";
        $sum_rows = mysqli_query($conn,$sum);
        $count_rows = mysqli_query($conn,$query);
        $ro = mysqli_fetch_array($count_rows) ;
        // echo $ro[0];
        
        $rso = mysqli_fetch_array($sum_rows);
        
        // echo $rso[0];
        $total = $rso[0]/ $ro[0];
        // echo gettype($ro);
        for($i=0;$i<$total;$i++)
        {
            echo '<i class="fa fa-star"></i>';
        }

        echo "</div>";

        echo ' <div class="comment_btn">
        <input type="button" value="Write review" class="done" title="Rate this device" id ='.$row['device_name'].'>
        </div>';
       
    }
    
}
else
{

}