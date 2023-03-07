<?php 
require 'config.php';
include 'sidebar.php';
?>

<?php
$sql = "SELECT satis_orani.urun_ad FROM satis_orani ORDER BY oran DESC LIMIT 1 ";
$res = mysqli_query($conn,$sql);
$res=mysqli_fetch_array($res);
$tatli1=$res[0];
?>


<?php
$sql2 = "SELECT satis_orani.urun_ad FROM satis_orani ORDER BY oran ASC LIMIT 1 ";
$res2 = mysqli_query($conn,$sql2);
$res2=mysqli_fetch_array($res2);
$tatli2=$res2[0];
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
            font-size: 40px;
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
            font-size: 40px;
            color: #f3f5f9;
            margin-top: 0px;
            margin-bottom: 20px;
            margin-left: 60px;
            
        }
        #getirtilme2{
            padding: 1px;
            color: #f3f5f9;
            text-align:center;

        }

    </style>
</head>
<body>
<div style="position:relative;left: 200px;">
<div id="tatlisayisi">
        <p id="tatli2" style='font-weight: bold;'>Satış Oranı En Yüksek Tatlı</p>
        <p id="tatli"> <?php echo $tatli1 ?> </p>
</div>
<div id="toplamgetirtilme">
        <p id="getirtilme2" style='font-weight: bold;'>Satış Oranı En Düşük Tatlı</p>
        <p id="getirtilme"> <?php echo $tatli2 ?> </p>
</div>
    </div>

</body>
</html>
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          $result=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Brownie'");
          while($row=$result->fetch_assoc()){
            echo "['Brownie',".$row['oran']."],";
          }

          $result1=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Bademli Kruvasan'");
          while($row1=$result1->fetch_assoc()){
            echo "['Bademli Kruvasan',".$row1['oran']."],";
          }

          $result2=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Bademli Berliner'");
          while($row2=$result2->fetch_assoc()){
            echo "['Bademli Berliner',".$row2['oran']."],";
          }
          
          $result3=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Çikolatalı Kruvasan'");
          while($row3=$result3->fetch_assoc()){
            echo "['Çikolatalı Kruvasan',".$row3['oran']."],";
          }

          $result4=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Orman Meyveli Kruvasan'");
          while($row4=$result4->fetch_assoc()){
            echo "['Orman Meyveli Kruvasan',".$row4['oran']."],";
          }

          $result5=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Fransız Ekleri'");
          while($row5=$result5->fetch_assoc()){
            echo "['Fransız Ekleri',".$row5['oran']."],";
          }

          $result6=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Çikolatalı Berliner'");
          while($row6=$result6->fetch_assoc()){
            echo "['Çikolatalı Berliner',".$row6['oran']."],";
          }


          ?>
         
        ]);

        var options = {
          title: 'Kar Elde Edilen Tatlıların Satış Oranları(%)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }

      
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          <?php
          $result7=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Cinnamon Roll'");
          while($row7=$result7->fetch_assoc()){
            echo "['Cinnamon Roll',".$row7['oran']."],";
          }

          $result8=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Soğuk sandviç'");
          while($row8=$result8->fetch_assoc()){
            echo "['Soğuk Sandviç',".$row8['oran']."],";
          }

          $result9=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Oreolu Magnolia'");
          while($row9=$result9->fetch_assoc()){
            echo "['Oreolu Magnolia',".$row9['oran']."],";
          }
          
          $result10=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Lotuslu Magnolia'");
          while($row10=$result10->fetch_assoc()){
            echo "['Lotuslu Magnolia',".$row10['oran']."],";
          }

          $result11=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Lotus Cheesecake'");
          while($row11=$result11->fetch_assoc()){
            echo "['Lotus Cheesecake',".$row11['oran']."],";
          }

          $result12=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='San Sebastian Cheesecake'");
          while($row12=$result12->fetch_assoc()){
            echo "['San Sebastian Cheesecake',".$row12['oran']."],";
          }

          $result13=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Orman Meyveli Cheesecake'");
          while($row13=$result13->fetch_assoc()){
            echo "['Orman Meyveli Cheesecake',".$row13['oran']."],";
          }

          $result14=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Cookie'");
          while($row14=$result14->fetch_assoc()){
            echo "['Cookie',".$row14['oran']."],";
          }

          $result15=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Çilekli Magnolia'");
          while($row15=$result15->fetch_assoc()){
            echo "['Çilekli Magnolia',".$row15['oran']."],";
          }

          $result16=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Mozaik Pasta'");
          while($row16=$result16->fetch_assoc()){
            echo "['Mozaik Pasta',".$row16['oran']."],";
          }

          $result17=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Vişneli Berliner'");
          while($row17=$result17->fetch_assoc()){
            echo "['Vişneli Berliner',".$row17['oran']."],";
          }

          $result18=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Bavyera Çikolatalı Berliner'");
          while($row18=$result18->fetch_assoc()){
            echo "['Bavyera Çikolatalı Berliner',".$row18['oran']."],";
          }

          $result19=$conn->query("SELECT satis_orani.oran FROM satis_orani WHERE satis_orani.urun_ad='Muffin'");
          while($row19=$result19->fetch_assoc()){
            echo "['Muffin',".$row19['oran']."],";
          }



          ?>
         
        ]);

        var options = {
          title: 'Zarar Edilen Tatlıların Satış Oranları(%)'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }

      
    </script>
  </head>
  <body>
    <div style="position:relative; top: 250px; left: 200px;">
    <div id="piechart" style="position:relative; left:0px;width: 800px; height: 500px;"></div>
    <div id="piechart2" style="position:relative; top: -500px;left: 620px;width: 800px; height: 500px;"></div>
    </div>
  </body>
</html>