<?php
session_start();
if (!isset($_SESSION["semester"])) {
  $_SESSION["semester"]="semester";
  $_SESSION["c_semester"]="";
  $_SESSION["c1_semester"]="";

}
if (!isset($_SESSION["group"])) {
  $_SESSION["group"]="group";
  $_SESSION["c_group"]="";
  $_SESSION["c1_group"]="";
  
}
if (!isset($_SESSION["departement"])) {
  $_SESSION["departement"]="departement";
  $_SESSION["c_departement"]="";
}

if (isset($_POST["semester"])) {
  if ($_POST["semester"] != "semester") {
    $_SESSION["semester"] = $_POST["semester"];
    $_SESSION["c_semester"] = "and id_mat in(select id from matieres where semester = '".$_POST['semester']."')";
    $_SESSION["c1_semester"]="and semester = '".$_POST["semester"]."'";
  }
  else {
    $_SESSION["semester"]="semester";
    $_SESSION["c_semester"]="";
    $_SESSION["c1_semester"]="";
  }
}
if (isset($_POST["group"])) {
  if ($_POST["group"] != "group") {
    $_SESSION["group"] = $_POST["group"];
    $_SESSION["c_group"] = "and id_etud in(select id from etudiants where `group` = '".$_POST["group"]."')";
  }
  else {
    $_SESSION["group"]="group";
    $_SESSION["c_group"]="";
  }
}
if (isset($_POST["departement"])) {
  if ($_POST["departement"] != "departement") {
    $_SESSION["departement"] = $_POST["departement"];
    $_SESSION["c_departement"] = "and id_etud in(select id from etudiants where dep_id in(select id from departement where nom = '".$_POST["departement"]."'))";
  }
  else {
    $_SESSION["departement"]="departement";
    $_SESSION["c_departement"]="";
  }
}
function score($mat){
  $connection = mysqli_connect('localhost','root','','evaluation');
  $sq = "SELECT * from reponse where id_evalu in (select id from evaluation where id_mat = '".$mat."' ".$_SESSION["c_semester"].") ".$_SESSION["c_group"];
  $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
  $qu = mysqli_query($connection,$sq);
  while($rep = mysqli_fetch_assoc($qu)){
     $s[$rep['score']]++;
  }
  
  return round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);

}
  $connection = mysqli_connect('localhost','root','','evaluation');

?>

<!DOCTYPE html>
<html>
<head>
    
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        #chart {
            margin:5%;
            width: 85%;
            height: 90%;
        }
    </style>
  
          
</head>
<body>
  <!-- <br><br><br> -->
    <?php include("hed.php")?><br>
    <br>
    <form action="" method="post">
    <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="semester" id="s" style="margin-left:10%;width:80%;display: inline;">
    <?php
            if (isset($_SESSION['semester'])) {
              $xr = $_SESSION['semester'] ;
              if ($_SESSION['semester'] != "semester") {
              ?>
                  <option value="<?php echo $_SESSION['semester'] ;?>"><?php echo $_SESSION['semester'] ;?></option>

              <?php
            }
          }
        else{
          $xr = "semester";
        }
          echo '<option value="semester">semester</option>';
        
  
    $s_sem = "SELECT distinct(semester) FROM matieres WHERE id in(SELECT id_mat from evaluation where id in(SELECT id_evalu from reponse))";
    $q = mysqli_query($connection,$s_sem);
    while($r = mysqli_fetch_assoc($q)){
      if($r["semester"] != $xr)
            echo "<option value='".$r["semester"]."'>".$r["semester"]."</option>";
    }
    ?>
  </select>
  </form>

<br>
   <form action="" method="post">
    <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="group" id="s" style="width:80%;margin-left:10%;margin-left:10%;display: inline;">
    <?php
            if (isset($_SESSION['group'])) {
              $xr1 = $_SESSION['group'] ;
              if ($_SESSION['group'] != "group") {
              ?>
                  <option value="<?php echo $_SESSION['group'] ;?>"><?php echo $_SESSION['group'] ;?></option>

              <?php
            }
          }
        else{
          $xr1 = "group";
        }
          echo '<option value="group">group</option>';
        
  
    $s_g = "SELECT DISTINCT(`group`) FROM etudiants WHERE id in(SELECT id_etud from reponse);";
    $q_g = mysqli_query($connection,$s_g);
    while($r_g = mysqli_fetch_assoc($q_g)){
      if($r_g["group"] != $xr1)
            echo "<option value='".$r_g["group"]."'>".$r_g["group"]."</option>";
    }
    ?>
  </select>
  </form>

<br>
   <form action="" method="post">
    <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="departement" id="s" style="width:80%;margin-left:10%;margin-left:10%;display: inline;">
    <?php
            if (isset($_SESSION['departement'])) {
              $xr2 = $_SESSION['departement'] ;
              if ($_SESSION['departement'] != "departement") {
              ?>
                  <option value="<?php echo $_SESSION['departement'] ;?>"><?php echo $_SESSION['departement'] ;?></option>

              <?php
            }
          }
        else{
          $xr2 = "departement";
        }
          echo '<option value="departement">departement</option>';
        
  
    $s_d = "SELECT DISTINCT(`nom`) FROM departement WHERE id in(SELECT dep_id from etudiants where id in(select id_etud from reponse));";
    $q_d = mysqli_query($connection,$s_d);
    while($r_d = mysqli_fetch_assoc($q_d)){
      if($r_d["nom"] != $xr2)
            echo "<option value='".$r_d["nom"]."'>".$r_d["nom"]."</option>";
    }
    ?>
  </select>
  </form>
  <br>
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
               $sqli_mat = "SELECT * from matieres where id in(select id_mat from evaluation where id in (select id_evalu from reponse where 1 ".$_SESSION["c_group"]." ".$_SESSION["c_departement"].")) ".$_SESSION["c1_semester"];
            
                    $query_mat = mysqli_query($connection,$sqli_mat);
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
                    $query_mat1 = mysqli_query($connection,$sqli_mat);
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
                    $query_mat2 = mysqli_query($connection,$sqli_mat);
                    while ($col2 = mysqli_fetch_assoc($query_mat2)) {
                        echo "'".$col2['nommatieres']."',";
                    }
                    ?>
  
              ],
            },
            yaxis: {
           
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
