<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form id='form' method='POST' action='one.php'>
        <input type='text' class = 'repl' name="input" placeholder='kar comment'>
        <div class='re-commen'>
            <input type ="submit" value="reply" name="reply" id="one">
        </div>
</form>
<!-- <script>
    document.getElementById("one").onclick = fn;
    function fn(){
        alert("HII");
    }
</script> -->

</body>
</html>
<?php
                   $sql = "SELECT * FROM ratings LIMIT 4";
                   $result = mysqli_query($conn,$sql);
                   if(mysqli_num_rows($result) > 0)
                   {
                       while($rows = mysqli_fetch_assoc($result))
                       {   
                           echo "<div class='comment'>";
                           echo "<h3>".$rows['username']."</h3>";
                           echo "<p>".$rows['comment']."</p>";
                           $user = $rows['username'];
                ?>
                        <div class="reply">
                        <form method="POST" action="" onsubmit="return reply();" style="display:inline">
                            <input type="text" name="reply" id="reply" placeholder="Your Comment...">
                            <input type="button" name="Reply" value="Reply">
                        </form>
                        <script>
                          var user = "<?php $row['username'] ?>";
                        </script>
                        <div class="like" id="heart">
                            <i class="fas fa-heart"></i>
                       </div>
                       <input type="button" name="like" value="Useful" onclick="like_color">
                <?php
                           echo "</div>";
                           echo "</div>";
                ?>
                <div id="all_comment">
               <?php
                if(isset($_POST['Reply']))
                {
                  $comment = mysqli_real_escape_string($conn,$_POST['reply']);
                  $sqla ="SELECT username,comment FROM reply";
                  if(mysqli_query($conn,$sqla) === TRUE)
                    {
                         $_SESSION['Reply'] = "Reply successful.";
    // header("Location: ../phpfiles/all_comment.php");
                     }
                    else{
                        $_SESSION['Reply']="Reply not successful.";
                        header("Location: ../compare.php");
                        exit();
                    }
                }
                ?>
                </div>
                <?php
                       }
                   }
               
            ?>