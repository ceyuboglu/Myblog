<?php 
$a=$obj->showData("articles");
$c=0; ?>
<div class="searchbar container">
	<form method="post" action="searchresults.php">
	<input style="text-align: center; width: 50%;" type="text" name="searchbar" class="textbox" placeholder="Search" value="">
	<button style="display: none;" class="fa fa-search" name="searchbutton"></button>
	</form>
</div>
<hr>
<div class="content container">
	<?php while ($a and $c < count($a)) { ?>
	<div class="posts" style="word-wrap:break-word; height: auto; max-height:350px; overflow: hidden; text-overflow: ellipsis;">
		<div class="post-container">
			<div class="post-thumbnail-img-box">
				<a href=""><img src="uploads/jon.jpg"></a>
			</div>
			<div class="post-thumbnail-text">
				<a href="article.php?id=<?php echo $a[$c]['id']  ?>"><h1 class="post-title"><?php  echo $a[$c]['article_title']; ?></h1></a>
				<span class="post-date"><?php  echo $a[$c]['article_date']; ?></span>
				<p class="post-thumbnail-desc"><?php  echo $a[$c]['article_text']; ?></p>
			</div>
		</div>	
	</div>
	<br>
	<?php $c=$c+1; } ?>
</div>
 