<?php 
include 'header.php';
$a=$obj->showData("comments");
$c=0;


?>
<style type="text/css">
	.form-group{
		display: table;
	}
</style>
<div class="container">
	<h1>COMMENT SETTİNGS</h1>
	<hr>
	
		
			<div class="form-group">id
			pageid
			Name
			email
			comment
				status
			Confirm-Delete
		</div>
		<?php while ($a and $c < count($a)) { ?>
		<div class="form-group">
			<form action="commentsettings.php" method="POST">
			<?php  echo $a[$c]['id'];?>
			<?php  echo $a[$c]['page_id'];?>
			<?php  echo $a[$c]['comment_name'];?>
			<?php  echo $a[$c]['comment_email'];?>
				<a href="comment.php?id=<?php  echo $a[$c]['id'];?>">
				<?php 
				if (strlen($a[$c]['comment_text'])>"30") {
				 	echo "See Comment";
				 } else{ 
				echo substr($a[$c]['comment_text'],0,30)." ...";
				}
				?>	
				</a>
				<?php
					if ($a[$c]['comment_status']==0) {
					  	echo "Waiting";
					  }  else {
					  	echo "Confirmed";
					  }
				?>
				<button name="confirmcomment">confirm</button> | <button name="deletecomment">delete</button> 
			</form>
			</div>		
		<?php $c=$c+1; } ?>	
</div>
<?php 
if (isset($_POST['confirmcomment'])) {
	echo"postacı geldi";
}
if (isset($_POST['deletecomment'])) {
	echo"deleteci geldi";
}

 ?>