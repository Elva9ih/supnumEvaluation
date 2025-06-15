<?php
 include"header.php";
 include"s.php";

function score($mat){  
    include "../../connection.php";
  $sq = "SELECT * from reponse where id_evalu in (select id from evaluation where id_mat = '".$mat."')";
  $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
  $qu = mysqli_query($conn,$sq);
  while($rep = mysqli_fetch_assoc($qu)){
     $s[$rep['score']]++;
  }
  
  return round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);

}
include "../../connection.php";

?>

<!DOCTYPE html>
<html>
<head>
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <style>
        #chart {
            margin:5%;
            width: 85%;
            height: 85%;
        }
    </style>
</head>
<body>
    <div id="chart"></div>
    <script>
        function colorGradient(fadeFraction, rgbColor1, rgbColor2, rgbColor3) {
    var color1 = rgbColor1;
    var color2 = rgbColor2;
    var fade = fadeFraction;

    // Do we have 3 colors for the gradient? Need to adjust the params.
    if (rgbColor3) {
      fade = fade * 2;

      // Find which interval to use and adjust the fade percentage
      if (fade >= 1) {
        fade -= 1;
        color1 = rgbColor2;
        color2 = rgbColor3;
      }
    }

    var diffRed = color2.red - color1.red;
    var diffGreen = color2.green - color1.green;
    var diffBlue = color2.blue - color1.blue;

    var gradient = {
      red: parseInt(Math.floor(color1.red + (diffRed * fade)), 10),
      green: parseInt(Math.floor(color1.green + (diffGreen * fade)), 10),
      blue: parseInt(Math.floor(color1.blue + (diffBlue * fade)), 10),
    };

    return 'rgb(' + gradient.red + ',' + gradient.green + ',' + gradient.blue + ')';
  }

  let color1 = {red:255, green:0, blue:0}; // red
  let color2 = {red:250, green:250, blue:0}; // green
  let color3 = {red:0, green:255, blue:0}; // blue
        var options = {
              series: [{
              data: [
                <?php
                    $sqli_mat = "SELECT id from matieres where id in(select id_mat from evaluation where id in (select id_evalu from reponse))";
                    $query_mat = mysqli_query($conn,$sqli_mat);
                    while ($col = mysqli_fetch_assoc($query_mat)) {
                        echo score($col["id"]).",";
                    }
                    ?>
            ]
            }],
              chart: {
              type: 'bar',
              height: 380
            },
            plotOptions: {
              bar: {
                barHeight: '100%',
                distributed: true,
                horizontal: true,
                dataLabels: {
                  position: 'bottom'
                },
              }
            },
            colors: [
                <?php
                    $sqli_mat1 = "SELECT id from matieres where id in(select id_mat from evaluation where id in (select id_evalu from reponse))";
                    $query_mat1 = mysqli_query($conn,$sqli_mat1);
                    while ($col1 = mysqli_fetch_assoc($query_mat1)) {
                        echo "colorGradient(".score($col1["id"])."/100,color1,color2,color3)".",";
                    }
                    ?>
                
           
        ],
            dataLabels: {
              enabled: true,
              textAnchor: 'start',
              style: {
                colors: ['#fff']
              },
              formatter: function (val, opt) {
                return val + "%"
              },
              offsetX: 0,
              dropShadow: {
                enabled: true
              }
            },
            stroke: {
              width: 1,
              colors: ['#fff']
            },
            xaxis: {
               
              categories: [
                <?php
                    $sqli_mat2 = "SELECT nommatieres from matieres where id in(select id_mat from evaluation where id in (select id_evalu from reponse))";
                    $query_mat2 = mysqli_query($conn,$sqli_mat2);
                    while ($col2 = mysqli_fetch_assoc($query_mat2)) {
                        echo "'".$col2['nommatieres']."',";
                    }
                    ?>
  
              ],
            },
            yaxis: {
              title: {
                text: 'Matieres'
              },
              min: 0,
              max: 100
            },
            title: {
                text: "Scores d'evaluations des matieres",
                align: 'center',
                floating: true
            },
            subtitle: {
                text: 'represantation graphiques',
                align: 'center',
            },
            tooltip: {
              theme: 'dark',
              x: {
                show: false
              },
              y: {
                title: {
                  formatter: function () {
                    return ''
                  }
                }
              }
            }
            };

            var chart = new ApexCharts(document.querySelector("#chart"), options);
            chart.render();
    </script>
</body>
</html>