<?php 
include 'header.php';
$showArticle=$obj->showData('articles');
$totalArticle=count($showArticle);
if (isset($_GET['showarticle'])) 
{
	$p=$obj->findArticle($_GET['article_id']);
	$article=$_GET['article_id'];
	
}
?>
<div class="container">
	<h1>CONTENT | SETTİNGS</h1>
	<hr>
	<form action="contentsettings.php" method="GET">
		<select name="article_id">
			<?php
		     $t=0;
			 while ($t < $totalArticle) {	?>
				<option  value="<?php echo $showArticle[$t]['id'];?>"?>
					<?php echo $showArticle[$t]['article_title']; $t=$t+1 ?>
				</option>
			<?php } ?>
		</select>
		<button type="submit" name="showarticle" value="edit">Show Article</button>
		<button type="submit" name="deletearticle" value="1">Delete Article</button>
	</form>
	<hr>
	
	<form action="contentsettings.php?article_id" method="POST">
			<label>Article Title : </label>
			<input type="text" name="article_title" value="<?php echo @$p[0]['article_title'];?>">
			<hr>
			<label>Article İmage : </label>
			<input type="file" name="article_image">
			<hr>
			<input type="hidden" name="article_id" value="<?php echo @$_GET['article_id'] ?>">
			<label>Article Text : </label>
			<textarea class="ckeditor" id="editor1" name="article_text">
				<?php echo @$p[0]['article_text']; ?>
			</textarea>
              <script type="text/javascript">     
                CKEDITOR.replace('editor1',
                {
                  filebrowserBrowseUrl : 'ckfinder/ckfinder.html',
                  filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',
                  filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',
                  filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUplaod&type=Files',
                  filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUplaod&type=Images',
                  filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUplaod&type=Flash',
                  forcePasteAsPlainText: true
                }
                  );
              </script>
			<hr>	
			<button style="float: left;" type="submit" name="editarticle">Save Changes</button>
			<button style="float: right;" type="submit" name="contentsettingssave">Create New</button>
	</form>

</div>
<?php 

if (isset($_POST['contentsettingssave'])) 
{
	$title=$_POST['article_title'];
	$text=$_POST['article_text'];
	$obj->newArticle("$title","$text","$date");
	header("Refresh:0");
}

if (isset($_GET['deletearticle'])) 
{
	$article = $_GET['article_id'];
	$obj->deleteArticle("$article");
	header("Location:contentsettings.php?ok");

}

if (isset($_POST['editarticle']))
{
	$title=$_POST['article_title'];
	$text=$_POST['article_text'];
	$id=$_POST['article_id'];
	$obj->editArticle("$id","$title","$text");
	header("Refresh:0");
}

 ?>