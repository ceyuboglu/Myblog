<?php
ob_start();
session_start(); 
require '../airport/database.php';
use ceyuboglu\dbactions;
$obj = new dbactions('../airport/config.yml');
date_default_timezone_set('Europe/Istanbul');
$date=date('d.m.Y H:i:s');
include '../airport/dbconnect.php';
$adminsor=$db->prepare("SELECT * FROM blogmain where admin_id=:id");
$adminsor->execute(array(  
'id' => $_SESSION['admin_id']
));
$say=$adminsor->rowCount();
$admincek=$adminsor->fetch(PDO::FETCH_ASSOC);
if ($say==0){
  header("Location:../Login.php?durum=izinsiz");
}

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Cadmin</title>
	<link rel="stylesheet" type="text/css" href="style/main.css">
	 <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
</head>
<body>
	<div id="header">
		<a href="index.php"><h2>Cadmin Panel</h2></a>
		<hr>
		<ul>
			<li><a href="generalsettings.php">General Settings</a></li>
			&nbsp
			<li><a href="contentsettings.php">Content Settings</a></li>
			&nbsp
			<li><a href="aboutsettings.php">About Settings</a></li>
			&nbsp
			<li><a href="commentsettings.php">Comment Settings</a></li>
		</ul>
	</div>

