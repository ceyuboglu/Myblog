<?php 
include 'header.php'; 
$a_id=$_GET['id'];
$a=$obj->getByid("$a_id");
?>
<div class="post-container" style="padding: 0 10%; word-wrap: break-word; height: 78vh;">
	<h1 style="text-align: center; text-decoration: underline; padding: 0 3%;"><?php echo $a['article_title']; ?></h1>
	<span style="text-align: left;"><?php echo $a['article_text']; ?></span>
</div>
