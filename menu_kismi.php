<?php
require 'config.php';
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .tatlilar{
            position: absolute;
            right: 115px;
            top: -300px;
            margin-right: 800px;
            margin-top: 380px;
            padding: 10px;

            /*border: 1px solid;*/
            font-size: 15px;
            color: black;
            
            /*
            border: 1px solid;
            position: relative;
            float: right;
            right: 400px;
            */
            
        }
        .fiyatlar{
            position: absolute;
            left: 660px;
            top: 90px;
            /*border: 1px solid;*/
            font-size: 18px;
            color: black;
            
            /*
            border: 1px solid;
            position: relative;
            float: right;
            right: 400px;
            */
            
        }
        /*
        #menu2{
            position: absolute;
            float: right;
            
        }
        #menu{
            position: relative;
            float: right;
        }
        */
        .fiyatlar2{
            position: absolute;
            left: 760px;
            top: 90px;
            /*border: 1px solid;*/
            font-size: 18px;
            color: black;
            
            /*
            border: 1px solid;
            position: relative;
            float: right;
            right: 400px;
            */
            
        }
        /*
        #menu3{
            position: absolute;
            float: right;
        
        }
        */
        .fiyatlar3{
            position: absolute;
            left: 860px;
            top: 80px;
            /*border: 1px solid;*/
            font-size: 18px;
            color: black;
            
            
            /*
            border: 1px solid;
            position: relative;
            float: right;
            right: 400px;
            */
            
        }
        #menu4{
            position: absolute;
            float: right;
            
        }
        
        #menu5{
            position: relative;
            left: 100px;
            top: 50px;
        }

        td{
            padding: 5px;
        }
        #arka{
            background: linear-gradient(#bdbebf,#74788f);
            width: 680px;
            height: 780px;
            position: absolute;
            float: right;
            left: 300px;
            top: 40px;
            z-index: -5;
            border-style: outset;
            border-radius: 20px;
        }
        #tat{
            position: absolute;
            float: right;
            right: 1030px;
            top: 35px;
            font-size: 20px;
            color: black;
            text-decoration:underline;
        }
        #ko{
            position: absolute;
            float: right;
            right: 810px;
            top: 45px;
            font-size: 15px;
            color: black;
            text-decoration:underline;
        }
        #st{
            position: absolute;
            float: right;
            right: 700px;
            top: 45px;
            font-size: 15px;
            color: black;
            text-decoration:underline;
        }
        #ae{
            position: absolute;
            float: right;
            right: 600px;
            top: 45px;
            font-size: 15px;
            color: black;
            text-decoration:underline;
        }

    </style>
</head>
<body>
    <div>
    <div id="menu">
    <?php
        if (isset($_POST['tatli_silme'])) {
        $id = $_POST['urun_id'];
        $sorgu=("DELETE FROM urunler WHERE urun_id=$id");
        $sonuc=mysqli_query($conn, $sorgu);
        
        }	
            
    ?>
<div id="menu">
    <table class="tatlilar">

    <?php
        $sql = "SELECT urunler.urun_id,urunler.urun_ad FROM urunler;";
        $result =$conn->query($sql);
            while ($row = mysqli_fetch_assoc($result)) {?>
            <tr>
            <td><?php echo $row['urun_ad']; ?></td> 
            <td>  
            <div class="d-flex">
            <form class="mx-1" action="menu_kismi.php" method="POST">
            <input type="hidden" name="urun_id" value="<?php echo $row['urun_id'] ?>">
            <button type="submit" name="tatli_silme" class="btn-sil">SİL</button>
            </form>  
            <?php } ?>
            </div>
            </td>         
            </tr>                
    </table>
    </div>

    <div id="menu2">
    <table class="fiyatlar">

        <?php
            
            $sql2 = "SELECT * FROM urun_fiyat WHERE urun_fiyat.tarih_id = 1;";
            $result2 = mysqli_query($conn, $sql2);
            $resultCheck2 = mysqli_num_rows($result2);

            if($resultCheck2 > 0) {
                while ($row2 = mysqli_fetch_assoc($result2)) {
                    echo "<tr><td>".$row2['fiyat']."<td><tr>";
                }
            }
        ?>
    </table>
    </div>

    <div id="menu3">
    <table class="fiyatlar2">

        <?php
            
            $sql3 = "SELECT * FROM urun_fiyat WHERE urun_fiyat.tarih_id = 2;";
            $result3 = mysqli_query($conn, $sql3);
            $resultCheck3 = mysqli_num_rows($result3);

            if($resultCheck3 > 0) {
                while ($row3 = mysqli_fetch_assoc($result3)) {
                    echo "<tr><td>" .  $row3['fiyat'] .  "<td><tr>";
                }
            }
        ?>
    </table>
    </div>
            
    <div id="menu4">
    <table class="fiyatlar3">

        <?php
            
            $sql4 = "SELECT urunler.guncel_fiyat FROM urunler";
            $result4 = mysqli_query($conn, $sql4);
            $resultCheck4 = mysqli_num_rows($result4);

            if($resultCheck4 > 0) {
                while ($row4 = mysqli_fetch_assoc($result4)) {
                    echo "<tr><td>" .  $row4['guncel_fiyat'] .  "<td><tr>";
                }
            }
        ?>
    </table>
    </div>
            
    <div id="tat">
        <p>Tatlılar</p>
    </div>
    <div id="ko">
        <p>Kasım-Ocak</p>
    </div>
    <div id="st">
        <p>Şubat-Temmuz</p>
    </div>
    <div id="ae">
        <p>Ağustos-Ekim</p>
    </div>

    <div id="arka">

    </div>
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #urun_id{
            position: absolute;
            float: right;
            right: 300px;
            height: 20px;
            border-radius: 10px;
            top: 30px;
        }
        #urun_ad{
            position: absolute;
            float: right;
            right: 300px;
            height: 40px;
            width: 200px;
            border-radius: 10px;
            top: 80px;
        }
        #guncel_fiyat{
            position: absolute;
            float: right;
            right: 70px;
            height: 40px;
            width: 200px;
            border-radius: 10px;
            top: 80px;
        }
        #btn1{
            position: relative;
            float: right;
            right: 10px;
            top: 90px;
            height: 30px;
            width: 50px;
            border-radius: 10px;
        }
        #ekleme{
            position: relative;
            top: 760px;
            right: 600px;
        }
    </style>
</head>
<body>
    <form id="ekleme" action="" method="post" autocomplete="off">
        <input type="text" id="urun_ad" name="urun_ad" placeholder="Ürünün Adını Giriniz">
        <input type="text" id="guncel_fiyat" name="guncel_fiyat" placeholder="Güncel Fiyatı Giriniz">
        <button style=""type="submit" name="tatli_ekle" id="btn1">EKLE</button>
    </form>
    <?php
        if(isset($_POST["tatli_ekle"]))
        {
        $sql6="INSERT INTO urunler(urun_ad,guncel_fiyat) VALUES('".$_POST["urun_ad"]."','".$_POST["guncel_fiyat"]."')";
        $sonuc6=mysqli_query($conn,$sql6);
            if($sonuc6)
            {
                echo "";
            }
            else{
                echo "Hata var!";
            }
        }  
     
     if (isset($_POST['tatli_silme'])) {
        $id7 = $_POST['urun_id'];
        $sorgu7=("DELETE FROM urunler WHERE urun_id=$id7");
        $sonuc7=mysqli_prepare($conn, $sorgu7);
        
        }	
            
    ?>
</body>
</html>




</body>
</html>