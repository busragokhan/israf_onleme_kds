<?php
require 'config.php';
include 'sidebar.php';
include 'dropdown.php';


if(!empty($_SESSION["id"])){
  $id = $_SESSION["id"];
  $result = mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
}
else{
  header("Location: login.php");
}
?>
<?php
$sql = "SELECT SUM(getirtilme_satis.getirtilme_sayisi) FROM getirtilme_satis WHERE urun_id = 3";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $bademliberlinerget = $row["SUM(getirtilme_satis.getirtilme_sayisi)"];
} else {
  echo "Sorguda hata oluştu veya hiç kayıt bulunamadı.";
}
?>

<?php
$sql = "SELECT SUM(getirtilme_satis.satis_sayisi) FROM getirtilme_satis WHERE urun_id = 3";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $bademliberlinersatis = $row["SUM(getirtilme_satis.satis_sayisi)"];
} else {
  echo "Sorguda hata oluştu veya hiç kayıt bulunamadı.";
}
?>

<?php
$sql = "SELECT SUM(getirtilme_satis.getirtilme_sayisi) - SUM(getirtilme_satis.satis_sayisi) FROM getirtilme_satis WHERE urun_id = 3";
$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
  $row = mysqli_fetch_assoc($result);
  $bademliberlinerfark = $row["SUM(getirtilme_satis.getirtilme_sayisi) - SUM(getirtilme_satis.satis_sayisi)"];
} else {
  echo "Sorguda hata oluştu veya hiç kayıt bulunamadı.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <style>
      #getirtilme_1{
        position: absolute;
        float: right;
        top: 570px;
        right: 1205px;

      }
      .getirtilme input{
        border-radius: 15px;
        width: 100px;
        height: 40px;
        outline: none;
        
        font-size: 20px;
        
      }
      #satis_1{
        position: absolute;
        float: right;
        top: 570px;
        right: 1018px;
      }
      .satis input{
        border-radius: 15px;
        width: 100px;
        height: 40px;
        outline: none;
        
      }
      #hesap_1{
        position: absolute;
        float: right;
        top: 570px;
        right: 842px;
      }
      .hesap input{
        border-radius: 15px;
        width: 100px;
        height: 40px;
        outline: none;
        
      }
      #tatli_hesap{
        position: relative;
        float: right;
        top: 500px;
      }
        
    </style>
  <style>
    
    #tatliget{
      position: relative;
      float: right;
      top: 470px;
      right: 1100px;
    }
    #tatlisat{
      position: relative;
      float: right;
      top: 470px;
      right: 760px;
    }
    #tatlifark{
      position: relative;
      float: right;
      top: 470px;
      right: 525px;
    }
  </style>
      

<div style="position:relative; left:300px; top: 80px;">
  <div id="tatliget">
    <p>Yıllık Getirilme Sayısı</p>
    <?php echo $bademliberlinerget; ?>
  </div>
  <div id="tatlisat">
    <p>Yıl İçinde Satış Sayısı</p>
    <?php echo $bademliberlinersatis; ?>
  </div>
  <div id="tatlifark">
    <p>Fark</p>
    <?php echo $bademliberlinerfark; ?>
  </div>
  <form name="farkhesap" style="position:relative; left:50px;">
        <div id="getirtilme_1">
            
            <div class="getirtilme">
                <input type="text" name="getirtilme">
            </div>
        </div>
        <div id="satis_1">
            <div class="satis">
              <input id="satis" type="text" name="satis">
            </div>
        </div>
        <div id="hesap_1">
            <div class="hesap">
              <input id="hesap" type="text"  name="hesap" >
            </div>
        </div>
        
        <div id="tatli_hesap" style="position:relative; left:-350px; top:580px;">
            <input type="button" value="Hesapla" onclick="sumValues()">
        </div>
    </form>
    </div>
    <script type="text/javascript">
        function sumValues(){
            var num1,num2,res
            num1 = Number(document.farkhesap.getirtilme.value);
            num2 = Number(document.farkhesap.satis.value);
            
            res=num1-num2;
            document.farkhesap.hesap.value = res;
        }
         
    </script>
    <?php
if (!$conn) {
  die("Bağlantı hatası: " . mysqli_connect_error());
}
$sql = "select getirtilme_satis.getirtilme_sayisi, getirtilme_satis.satis_sayisi from getirtilme_satis inner join urunler on getirtilme_satis.urun_id = urunler.urun_id inner join aylar on getirtilme_satis.ay_id = aylar.ay_id where urunler.urun_ad = 'Vişneli Berliner' ";
$res = mysqli_query($conn, $sql);

$getirtilme_sayisi = array();
$satis_sayisi = array();
while ($data = mysqli_fetch_array($res)) {
  $getirtilme_sayisi[] = $data['getirtilme_sayisi'];
  $satis_sayisi[] = $data['satis_sayisi'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <style>
    .container{
      position: relative;
    }
    .row {
      position: relative;
      /*display: block;
      margin: 0 auto; */
      height: 300px;
      width: 500px;
      left: 20px;
    }
    #btnone{
      display: block;
      margin: auto;
      
    }
     
  </style>
</head>

<body>
  <html>

  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  </head>

  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm" style="position:relative;left:300px;">
        <h5>Vişneli Berliner</h5>
          <canvas id="getirtilmeSayisiCanvas" style="display: block; box-sizing: border-box; height: 300px; width:300px;"></canvas>
          <button id="btnone" type="button" class="btn pull-right btn-primary" data-toggle="modal" data-target="#exampleModal">
            Değiştir
          </button>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Getirtilme Sayısı</span>
            </div>
            <input class="form-control" id="inputGetirtilme" type="number">
          </div>

          <label>Satış Sayısı</label>
          <input id="inputSatis" type="number">
          <label>Ay</label>
          <input id="inputAy" type="text">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="getirtilmeChange()">Save changes</button>
        </div>
      </div>
    </div>
  </div>
  </body>

  </html>
</body>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript">

  var getirtilmeSayisi, satisSayisi, aylar;
  var chartGetirtilme;

  function createChart() {
    getAllData();
    getirtilmeSayisiChart();
  }
  window.onload = createChart();

  function getAllData(){
    getirtilmeSayisi = [<?php echo '"' . implode('","', $getirtilme_sayisi) . '"' ?>];
    satisSayisi = [<?php echo '"' . implode('","', $satis_sayisi) . '"' ?>];
    aylar = [ "Kasım", "Aralık","Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim",];
  }

  function getirtilmeSayisiChart() {
    getirtilmeSayisiCanvas = document.getElementById("getirtilmeSayisiCanvas");

    chartGetirtilme = new Chart(getirtilmeSayisiCanvas, {
      type: "bar",
      data: {
        labels: aylar,
        datasets: [{
            label: "Getirtilme Sayısı",
            data: getirtilmeSayisi,
            backgroundColor: "#F7DC6F"
          },
          {
            label: "Satis Sayisi",
            data: satisSayisi,
            backgroundColor: "#2980B9"
          }
        ]
      }
    })
  }

  function getirtilmeChange() {
    var getirtilme = document.getElementById("inputGetirtilme");
    var satis = document.getElementById("inputSatis");
    var ay = document.getElementById("inputAy");

    if (getirtilme.value.length === 0 || satis.value.length === 0 || ay.value.length === 0) {
      alert("Lütfen boş alan bırakmayınız");
    }else{
      getirtilmeSayisi.push(getirtilme.value);
      satisSayisi.push(satis.value);
      aylar.push(ay.value);
      chartGetirtilme.destroy();
      getirtilmeSayisiChart();

      getirtilme.value = "";
      satis.value = "";
      ay.value = "";
    }
    

  }
</script>
</body>
</html>