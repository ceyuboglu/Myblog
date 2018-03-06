<?php 
ob_start();
session_start();
include 'dbconnect.php';
if (isset($_POST['admingiris'])){
$admin_id=$_POST['admin_id'];
$admin_pw=$_POST['admin_pw'];
$kullanicisor=$db->prepare("SELECT * FROM blogmain where admin_id=:id and admin_pw=:pass");
$kullanicisor->execute(array(  
'id' => $admin_id,
'pass' => $admin_pw
));
$say=$kullanicisor->rowCount();
if ($say==1) {
	$_SESSION['admin_id']=$admin_id;
	header('Location:../center/index.php');

}else{
	header('Location:../login.php?durum=no');
}
}


 ?>