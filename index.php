<?php 
require 'config.php';
include 'sidebar.php';
?>

<?php
$sql = "SELECT COUNT(urunler.urun_id) FROM urunler";
$res = mysqli_query($conn,$sql);

if(mysqli_num_rows($res) > 0) {
    $row = mysqli_fetch_assoc($res);
    $tatli_sayisi = $row["COUNT(urunler.urun_id)"];

}
?>

<?php
$sql2 = "SELECT SUM(getirtilme_satis.getirtilme_sayisi) FROM getirtilme_satis";
$res2 = mysqli_query($conn,$sql2);

if(mysqli_num_rows($res2) > 0) {
    $row2 = mysqli_fetch_assoc($res2);
    $toplam_getirtilme = $row2["SUM(getirtilme_satis.getirtilme_sayisi)"];

}
?>

<?php
$sql3 = "SELECT SUM(getirtilme_satis.satis_sayisi) FROM getirtilme_satis";
$res3 = mysqli_query($conn,$sql3);

if(mysqli_num_rows($res3) > 0) {
    $row3 = mysqli_fetch_assoc($res3);
    $toplam_satis = $row3["SUM(getirtilme_satis.satis_sayisi)"];

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        #tatlisayisi{
            position: absolute;
            float: right;
            right: 925px;
            top: 50px;
            width: 8cm;
            height: 4cm;
            border: 1px solid black;
            padding: auto;
            text-align: center;
            border-radius: 15px;
            border: transparent;
            background-color: #75206b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            

        }
        #tatli{
            padding: 1px;
            font-size: 70px;
            color: #f3f5f9;
            margin-top: 0px;
            margin-bottom: 20px;
            
        }
        #tatli2{
            padding: 3px;
            color: #f3f5f9;

        }
        #toplamgetirtilme{
            position: absolute;
            float: right;
            right: 525px;
            top: 50px;
            width: 8cm;
            height: 4cm;
            border-radius: 15px;
            border: transparent;
            background-color: #75206b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            

        }
        #getirtilme{
            padding: 10px;
            font-size: 50px;
            color: #f3f5f9;
            margin-top: 0px;
            margin-bottom: 20px;
            margin-left: 60px;
            
        }
        #getirtilme2{
            padding: 1px;
            color: #f3f5f9;
            margin-left: 80px

        }
        #toplamsatis{
            position: absolute;
            float: right;
            right: 125px;
            top: 50px;
            width: 8cm;
            height: 4cm;
            border-radius: 15px;
            border: transparent;
            background-color: #75206b;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }
        #satis{
            padding: 10px;
            font-size: 50px;
            color: #f3f5f9;
            margin-top: 0px;
            margin-bottom: 20px;
            margin-left: 75px;
            
        }
        #satis2{
            padding: 1px;
            color: #f3f5f9;
            margin-left: 80px

        }
        td{
            padding: 4px;
            text-align: center;
        }
        #dessert{
            position: relative;
            top: 220px;
            left: 430px;
            font-size: 10px;
        }
        #ilk{
            position: relative;
            left: 45px;
            top: 10px;
            font-size: 15px;
            font-weight: bold;
        }
        #getirilen{
            position: absolute;
            top: 265px;
            left: 840px;
            font-size: 10px;
        }
        #ikinci{
            position: absolute;
            bottom: 415px;
            left: -8px;
            font-size: 15px;
            font-weight: bold;
        }
        #satilan{
            position: absolute;
            top: 265px;
            left: 960px;
            font-size: 10px;
        }
        #ucuncu{
            position: absolute;
            bottom: 415px;
            left: 5px;
            font-size: 15px;
            font-weight: bold;
        }
        #duvar{
            position: relative;
            left: 625px;
            border: 1px solid;
            width: 420px;
            height: 500px;
            bottom: 275px;
            border-radius: 15px;
            border: transparent;
            background-color: white;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            z-index: -1;
        }     
    </style>
</head>
<body>
<div id="tatlisayisi">
        <p id="tatli2" style='font-weight: bold;'>Mevcut Tatlı Sayısı</p>
        <p id="tatli"> <?php echo $tatli_sayisi ?> </p>
</div>
<div id="toplamgetirtilme">
        <p id="getirtilme2" style='font-weight: bold;'>Yıl İçinde Getirilen <br> Toplam Tatlı Sayısı</p>
        <p id="getirtilme"> <?php echo $toplam_getirtilme ?> </p>
</div>
<div id="toplamsatis">
        <p id="satis2" style='font-weight: bold;'>Yıl İçinde Satılan <br> Toplam Tatlı Sayısı</p>
        <p id="satis"> <?php echo $toplam_satis ?> </p>
</div>
<div style="border-radius:15px;border-style: outset;display:flex;justify-content: center;position:relative;top:270px;left:350px;width:500px;height:auto;px;background:linear-gradient(#bdbebf,#74788f);">
<table id="sube_tablo">
        <tr>
            <th>Ürün Adı</th>
            <th>Toplam Stok</th>
            <th>Toplam Satış</th>
        </tr>
<?php 
$tablo="SELECT urunler.urun_ad,SUM(getirtilme_satis.getirtilme_sayisi) AS stok ,SUM(getirtilme_satis.satis_sayisi) AS satis FROM getirtilme_satis,urunler WHERE urunler.urun_id=getirtilme_satis.urun_id GROUP BY urunler.urun_id";
$sonuc=$conn->query($tablo);

if($sonuc->num_rows>0)
{
    while($cek=$sonuc->fetch_assoc())
    {
        echo "
        <tr>
        <td>".$cek['urun_ad']."</td>
        <td>".$cek['stok']."</td>
        <td>".$cek['satis']."</td>
        </tr>
        ";
    }
}

?>
</table>
</div>
</body>
</html>