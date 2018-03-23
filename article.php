<?php 
include 'header.php'; 
$a_id=$_GET['id'];
$a=$obj->getByid("articles","$a_id");
$b=$obj->getcomments("$a_id");
$k=0;
date_default_timezone_set('Europe/Istanbul');
$date=date('d.m.Y H:i:s');
?>
<div class="post-container" style="padding: 0 1%; word-wrap: break-word; min-height: 50vh; ">
	<h1 style="text-align: center; text-decoration: underline; "><?php echo $a['article_title']; ?></h1>
	<span style="text-align: left; word-wrap:  width: 10%;"><?php echo $a['article_text']; ?></span>
</div>
<hr>
<div class="comments-wrap" style="text-align: center;">
	<?php if (count($b)==null) {
		echo "Write a comment about ".$a['article_title'];
	}else { ?>
	<div style="display: inline-block; text-align: left;">
		<h3 style="text-transform: uppercase;">Comments about <?php echo $a['article_title'];?></h4>
		<hr>
		<div class="comments" style="width: 80vw;">
			<?php 
				while ($k < count($b)) 
					{ ?> 
					<h5 style="font-size: 120%; display: inline;"><?php echo $b["$k"]['comment_name'] ?></h5>&nbsp&nbsp
					<?php if ($b["$k"]['comment_website']!=null) {?>
						<span><?php echo $b["$k"]['comment_website'] ?></span>
					<?php }else{ ?>
					<span><?php echo $b["$k"]['comment_email'] ?></span>
					<?php } ?>
					<span style="color: gray;"><?php echo $b["$k"]['comment_date'] ?></span>
					<p style="box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5); border-radius: 4px; word-wrap: break-word; width: auto;"><?php echo $b["$k"]['comment_text'] ?></p> 
				<?php $k=$k+1;	} ?>
		</div>
	</div>
	<?php }  ?>
	<hr>
	<div >
		<form method="POST" action="article.php?id=<?php echo $a_id; ?>" >
			<div class="form-group" style="display: inline-block; vertical-align: top;  ">
			<input type="text" name="commentname" placeholder="**Name" required style="margin-bottom: 5%;">
			<br>			
			<input type="text" name="commentemail" placeholder="**Email" required style="margin-bottom: 5%;">
			<br>
			<input type="text" name="commentwebsite" placeholder="Website">
			<br>
			<input type="hidden" name="pageid" value="<?php if(isset($_GET['id'])){
				echo $_GET['id'];
			} ?>">
			</div>
			<div class="form-group" style="display: inline-block;">
			<textarea rows="5" cols="50" name="comment" placeholder="**Write a comment." required style="resize: none; margin-bottom: 2%;"></textarea><br>
			</div>
			<div class="form-group">
			<input type="submit" id="gonderbtn" name="commentbutton" value="Submit">
			</div>
		</form>
	</div>
</div>
<?php 
if (isset($_POST['commentbutton'])) 
{
	$name=$_POST['commentname'];
	$email=$_POST['commentemail'];
	$website=$_POST['commentwebsite'];
	$pageİd=$_POST['pageid'];
	$comment=$_POST['comment'];
	$obj->newComment("$pageİd","$name","$email","$website","$comment","$date");
	header("Location:article.php?id=$a_id");
}
 ?>