<?php
include 'connect.php';

if(isset($_POST['user_comm']) && isset($_POST['user_name']))
{
  $comment=$_POST['user_comm'];
  $name=$_POST['user_name'];
  $insert=mysqli_query("insert into reply(username,comment) values('$name','$comment'");
  
  // $id=mysql_insert_id($insert);

  $select=mysqli_query("select username,comment from reply where name='$name' and comment='$comment'");
  
  if($row=mysqli_fetch_assoc($select))
  {
	  $name=$row['username'];
	  $comment=$row['comment'];
      // $time=$row['post_time'];
  ?>
<div class="comment_div"> 
 <p class="name"><strong>Posted By:</strong> <?php echo $name;?> <span style="float:right"></span></p>
 <p class="comments"><?php echo $comment;?></p>	
</div>
  <?php
  }
exit;
}

?>