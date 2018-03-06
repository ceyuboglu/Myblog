<?php 
require 'cadmin/panel/airport/database.php';
use ceyuboglu\dbactions;
$obj = new dbactions('cadmin/panel/airport/config.yml');
$a=$obj->showData("blogmain");
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php echo $a[0]['blog_h1'];?></title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/main.css">
</head>
<body>

<div class="topbar container">
	<div class="topbar-about">
		<a href="index.php"><h1><?php echo $a[0]['blog_h1'];?></h1></a>
		<p><?php echo $a[0]['blog_sub'];?></p>
	</div>
	<div class="topbar-menu container">
		<div class="topbar-menu-ul">
		<ul>
			<li><a href="about.php">About</a></li>
			<li><a href="archive.php">Archive</a></li>
		</ul>
		</div>
		<div class="topbar-menu-social">
			<ul>
				<li id="fb">
					<a href="http://www.fb.com/<?php echo $a[0]['blog_fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				</li>
				&nbsp
				<li id="tw">
					<a href="http://www.twitter.com/<?php echo $a[0]['blog_tw'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				</li>
				&nbsp
				<li id="inst">
					<a href="http://www.instagram.com/<?php echo $a[0]['blog_inst'];?>" target="_blank"><i class="fa fa-instagram"></i></a>
				</li>
				&nbsp
				<li id="linkedin">
					<a href="http://www.linkedin.com/<?php echo $a[0]['blog_linkin'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				</li>
				&nbsp
				<li id="gh">
					<a href="http://www.github.com/<?php echo $a[0]['blog_gh'];?>" target="_blank"><i class="fa fa-github"></i></a>
				</li>
			</ul>
		</div>

	</div>
</div>
<hr>
