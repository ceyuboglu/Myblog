<?php 
include 'header.php';
$a=$obj->showData('blogmain'); ?>
<div class="container">
	<h1>GENERAL | SETTİNGS</h1>
	<hr>
	<div>
		<form action="generalsettings.php" method="POST">
			<label>BLOG H1 : </label>
			<input type="text" name="blog_h1" value="<?php echo $a[0]['blog_h1'];?>">
			<hr>
			<label>BLOG Subtext : </label>
			<input type="text" name="blog_sub" value="<?php echo $a[0]['blog_sub'];?>">
			<hr>
			<label>BLOG facebook : </label>
			<input type="text" name="blog_fb" value="<?php echo $a[0]['blog_fb'];?>">
			<hr>
			<label>BLOG twitter : </label>
			<input type="text" name="blog_tw" value="<?php echo $a[0]['blog_tw'];?>">
			<hr>
			<label>BLOG instagram : </label>
			<input type="text" name="blog_inst" value="<?php echo $a[0]['blog_inst'];?>">
			<hr>
			<label>BLOG linkedin : </label>
			<input type="text" name="blog_linkin" value="<?php echo $a[0]['blog_linkin'];?>">
			<hr>
			<label>BLOG github : </label>
			<input type="text" name="blog_gh" value="<?php echo $a[0]['blog_gh'];?>">
			<hr>	
			<button type="submit" name="generalsettingssave">Save</button>
		</form>
	</div>
</div>
<?php 
if (isset($_POST['generalsettingssave'])) 
{
	$blog_h1=$_POST['blog_h1'];
	$blog_sub=$_POST['blog_sub'];
	$blog_fb=$_POST['blog_fb'];
	$blog_tw=$_POST['blog_tw'];
	$blog_inst=$_POST['blog_inst'];
	$blog_linkin=$_POST['blog_linkin'];
	$blog_gh=$_POST['blog_gh'];
	$obj->update("blogmain","$blog_h1","$blog_sub","$blog_fb","$blog_tw","$blog_inst","$blog_linkin","$blog_gh");
	header("Refresh:0");
}
?>