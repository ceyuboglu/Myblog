<?php include 'header.php';
	if (isset($_POST['searchbutton'])) {
		$sc=$_POST['searchbar'];
		$searched=$obj->search("$sc");
		foreach ($searched as $result) {
			if (@$result["article_title"]==null and @$result["article_text"]==null ){
				echo "No Result";
			}elseif (@$result["article_title"]!==null and @$result["article_text"]!==null ) {?>
				<div class="posts" style="word-wrap:break-word; height: auto; max-height:350px; overflow: hidden; text-overflow: ellipsis;">
					<div class="post-container">
						<div class="post-thumbnail-img-box">
							<a href=""><img src="uploads/jon.jpg"></a>
						</div>
						<div class="post-thumbnail-text">
							<a href="article.php?id=<?php echo $result['id'];?>"><h1 class="post-title"><?php echo $result['article_title']; ?></h1></a>
							<span class="post-date">02.03.2018</span>
							<p class="post-thumbnail-desc"><?php echo $result['article_text']; ?></p>
						</div>
					</div>	
				</div>
<?php			
			}
		}

		
	
	 } ?>