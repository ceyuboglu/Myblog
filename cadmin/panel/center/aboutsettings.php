<?php 
include 'header.php';

 ?>
<div class="container">
	<H1>ABOUT | SETTİNGS</H1>
	<hr>
	<form action="aboutsettings.php" method="POST">
			<label>About Me Text : </label>
			<textarea class="ckeditor" id="editor1" name="aboutme_text"><?php $a=$obj->showData("blogmain"); echo $a[0]['blog_about']; ?></textarea>
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
			<button type="submit" name="aboutsettingssave">Save</button>
	</form>

</div>
<?php 
if (isset($_POST['aboutsettingssave'])) {
  $blog_about = $_POST['aboutme_text'];
  $obj->updateAbout("$blog_about");
  header("Refresh:0");
}


?>