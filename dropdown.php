
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
        .dropbtn {
  background-color: #4b4d4c;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #ddd;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {display: block;}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {background-color: #3e8e41;}
    </style>
  </head>
<body>
    <div class="dropdown">
  <button class="dropbtn" style="position:relative;top:5px; left:25px;">Tatlı Çeşidi Seçiniz</button>
  <div class="dropdown-content">
    <a href="bademliberliner.php">Bademli Berliner</a>
    <a href="cikolataliberliner.php">Çikolatalı Berliner</a>
    <a href="visneliberliner.php">Vişneli Berliner</a>
    <a href="bavyeraberliner.php">Bavyera Çikolatalı Berliner</a>
    <a href="brownie.php">Brownie</a>
    <a href="lotuscheese.php">Lotus Cheesecake</a>
    <a href="ormancheese.php">Orman Meyveli Cheesecake</a>
    <a href="sansebastian.php">San Sebastian Cheesecake</a>
    <a href="oreolumag.php">Oreolu Magnolia</a>
    <a href="lotuslumag.php">Lotuslu Magnolia</a>
    <a href="cileklimag.php">Çilekli Magnolia</a>
    <a href="mozaik.php">Mozaik Pasta</a>
    <a href="bademlikru.php">Bademli Kruvasan</a>
    <a href="cikolatalikru.php">Çikolatalı Kruvasan</a>
    <a href="ormankru.php">Orman Meyveli Kruvasan</a>
    <a href="cookie.php">Cookie</a>
    <a href="fransiz.php">Fransız Ekleri</a>
    <a href="cinnamon.php">Cinnamon Roll</a>
    <a href="sandvic.php">Soğuk Sandviç</a>
    <a href="muffin.php">Muffin</a>
    </div>
    </div>
</body>
</html>
