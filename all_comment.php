<?php
include 'connect.php';
//     unset($_SESSION['Reply']);
if(isset($_POST["allcomment"])|| isset($_SESSION['Reply']))
{  

    $query = "SELECT DISTINCT device_name FROM ratings";
    $result = mysqli_query($conn,$query);
    $count = mysqli_num_rows($result);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="all_comment.css">
    <title>Compare.com | All Comments</title>
</head>
<body>
    <div class="head">
        <div class="searchbar">
            <input type="text" class="search" id="search" placeholder="serch the device...">
            <input type ="submit" value="search" class="s_btn" >
        </div>    
        <div id="result"></div>
		</div>
    </div>
    <div class="aside">
           <ul>
            <?php
              
                if($count > 0)
                {
                    while($row = $result->fetch_assoc())
                    {
                    //   $dataa = htmlspecialchars($row['device_name']);
                      echo "<li><input type='button' value = '".$row['device_name']."' name='".$row['device_name']."'class='text'></li>";
                    }
                }
            ?>
            </ul>
    </div>
    <div class="content">
        <div class="parent">
            <div>
                <?php
                    if(isset($_SESSION['Reply']))
                    {
                        echo "<h3>".$_SESSION['Reply']."</h3>";
                    }
                    if($count > 0)
                    {
                        $query1 = "SELECT username,comment FROM ratings";
                        $result1 = mysqli_query($conn,$query1);
                        while($rows = $result1->fetch_assoc())
                        {

                            echo "<div class='comment'>";
                            echo "<h3 id='name'>".$rows['username']."</h4>"."<p class = 'result'>".$rows['comment']."</p>";
                 ?>
                            <form id='form' method='POST' action='one.php'>
                                    <input type='text' class = 'reply' name='input' placeholder='kar comment'>
                                    <div class='re-comment'>
                                        <input type ='submit' value='reply' name='reply' id='one'>
                                    </div>
                            </form>
                       
                            <div class='re-comment'>
                                <img class = img src='../images/like.jpg'>
                                <input type = 'button' value='helpful' name='helpful'>
                            </div>
                        </div><!--for class comment div  -->
                        <?php
                        }
                    }
                    else{
                        echo "No Comments";
                    }
                ?>
                
            </div>
           
        </div>
    </div>
</body>
</html>