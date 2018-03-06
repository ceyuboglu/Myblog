<!DOCTYPE html>
<html>
<head>
  <title>Cadmin Panel</title>
  <link rel="stylesheet" type="text/css" href="style/login.css">
</head>
<body>
<div id="wrap">
  <form action="airport/giris.php" method="POST" >
    <h1>ADMİN LOGİN</h1>
    <p >

             <?php 
             if (isset($_GET['durum'])){
             if ($_GET['durum']=="no") {
             
             echo "Kullanıcı Bulunamadı...";

             } elseif ($_GET['durum']=="exit") {
             
             echo "Başarıyla Çıkış Yaptınız.";

             } elseif ($_GET['durum']=="izinsiz"){
              echo "Please Login with your id&pw...";
             }
             }
             ?>
               
      </p>
    <div>
              <input type="text" name="admin_id" class="form-item" placeholder="İd" required="" />
    </div>
     <div>
              <input type="password" name="admin_pw" class="form-item" placeholder="Password" required="" />
    </div>

    <div style="margin: 1% 25%;">
            <button style="width: 30%; background-color: #73879C; color:white; float: right;" type="submit" name="admingiris" class="button"> Login</button>
              
    </div>

    






  </form>





</div>





</body>
</html>