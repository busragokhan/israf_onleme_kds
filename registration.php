<?php
require 'config.php';
if(!empty($_SESSION["id"])){
  header("Location: index.php");
}
if(isset($_POST["submit"])){
  $name = $_POST["name"];
  $username = $_POST["username"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirmpassword = $_POST["confirmpassword"];
  $duplicate = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
  if(mysqli_num_rows($duplicate) > 0){
    echo
    "<script> alert('Username or Email Has Already Taken'); </script>";
  }
  else{
    if($password == $confirmpassword){
      $query = "INSERT INTO tb_user VALUES('','$name','$username','$email','$password')";
      mysqli_query($conn, $query);
      echo
      "<script> alert('Registration Successful'); </script>";
    }
    else{
      echo
      "<script> alert('Password Does Not Match'); </script>";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kayıt</title>
    <link rel="stylesheet" href="login.css">
  </head>
  <body>
    <div class="login-box">
    <h2>Yeni Üyelik</h2>
    <form class="" action="" method="post" autocomplete="off">
    <div class="user-box">
      <label for="name">Ad : </label>
      <input type="text" name="name" id = "name" required value=""> <br>
    </div>
    <div class="user-box">
      <label for="username">Kullanıcı Adı : </label>
      <input type="text" name="username" id = "username" required value=""> <br>
    </div>
    <div class="user-box">
      <label for="email">Email : </label>
      <input type="email" name="email" id = "email" required value=""> <br>
    </div>
    <div class="user-box">
      <label for="password">Şifre : </label>
      <input type="password" name="password" id = "password" required value=""> <br>
    </div>
    <div class="user-box">
      <label for="confirmpassword">Şifre Tekrar : </label>
      <input type="password" name="confirmpassword" id = "confirmpassword" required value=""> <br>
    </div>
    <button type="submit" name="submit">KAYIT OL</button>
    <br>
    <div id="kayit"><a style="left:135px;" href="login.php">GİRİŞ</a></div>
    </form>
  </body>
</html>