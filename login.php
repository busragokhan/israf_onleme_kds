<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $usernameemail = $_POST["usernameemail"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$usernameemail' OR email = '$usernameemail'");
  $row = mysqli_fetch_assoc($result);
  if(mysqli_num_rows($result) > 0){
    if($password == $row['password']){
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      header("Location: index.php");
    }
    else{
      echo
      "<script> alert('Wrong Password'); </script>";
    }
  }
  else{
    echo
    "<script> alert('User Not Registered'); </script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
  <div class="login-box">
  <h2>BONO CAFE</h2>
  <form class="" action="" method="post" autocomplete="off">
    <div class="user-box">
      <input type="text" name="usernameemail" id = "usernameemail" required value=""> <br>
      <label for="usernameemail">Kullanıcı Adı/Mail : </label>
    </div>
    <div class="user-box">
      <input type="password" name="password" id = "password" required value=""> <br>
      <label for="password">Şifre : </label>
    </div>
    <button type="submit" name="submit">GİRİŞ</button>
    <br>
    <div id="kayit"><a href="registration.php">KAYIT</a></div>
  </form>
</div>
  
 
      


   

    