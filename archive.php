<?php 
include 'header.php'; 
$a=$obj->showData("articles");
$c=0;?>
<div class="content container">
	<ul>
		<?php while ($a and $c < count($a)) { ?>
		<li>
			<span>
				<a style="font-size: 25px;" href="article.php?id=<?php echo $a[$c]['id']?>"><?php echo $a[$c]['article_title']; ?></a> 
				<time><?php  echo $a[$c]['article_date']; ?></time>	
			</span>		
		</li>
		<?php $c=$c+1; } ?>	
	</ul>
</div>
