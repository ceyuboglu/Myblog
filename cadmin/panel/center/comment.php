<?php 
include 'header.php';
$id=$_GET['id'];
$a=$obj->getByid("comments","$id");



 ?>
 <div class="container">
 	<form action="commentsettings.php" method="POST">
 	<input type="hidden" name="id" value="<?php echo $a['id']; ?>">
 	<div>Page İd:<?php echo $a['page_id']; ?></div>
 	<div>Name:<?php echo $a['comment_name']; ?></div>
 	<div>Email:<?php echo $a['comment_email']; ?></div>
 	<div style="word-wrap: break-word;">Comment: <br> <?php echo $a['comment_text']; ?></div>
 	<button name="confirmcomment">Confirm</button>&nbsp&nbsp&nbsp&nbsp<button name="deletecomment">Delete</button>
 	</form>
 </div>