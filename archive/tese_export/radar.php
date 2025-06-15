<?php
 include"s.php";
 include "../../connection.php";

 $matiere=$_GET['codematieres'];
 $xr1 = "group";
if(isset($_POST["group"])){
    $xr1 = $_POST["group"];
}
function score($axe){
  $matiere=$_GET['codematieres'];
  include "../../connection.php";

  $sq = "SELECT * from reponse where id_question in(select id from question where id_axe =".$axe.") and id_evalu in (select id from evaluation where id_mat in (select id from matieres where codematieres = '".$matiere."'))";
  if(isset($_POST["group"])){
    if($_POST["group"] != "group"){
        $sq = "SELECT * from reponse where id_question in(select id from question where id_axe =".$axe.") and id_etud in(select id from etudiants where `group` = '".$_POST["group"]."') and id_evalu in (select id from evaluation where id_mat in (select id from matieres where codematieres = '".$matiere."'))";
    }
}
  $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
  $qu = mysqli_query($conn,$sq);
  while($rep = mysqli_fetch_assoc($qu)){
     $s[$rep['score']]++;
  }
  
  return round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);

}
?>


<title>radar</title>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
</script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

<style>
.highcharts-credits {
    display: none;
}
</style>

<form action="" method="post">
    <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="group" id="s"
        style="width:80%;margin-left:10%;margin-left:10%;display: inline;">
        <?php
if(isset($_POST["group"])){
    if($_POST["group"] != "group"){
        echo '<option value="'.$_POST["group"].'">'.$_POST["group"].'</option>';
    }
}
echo '<option value="group">group</option>';
 $s_g = "SELECT DISTINCT(`group`) FROM etudiants WHERE id in(SELECT id_etud from reponse);";
 $q_g = mysqli_query($conn,$s_g);
 while($r_g = mysqli_fetch_assoc($q_g)){
   if($r_g["group"] != $xr1)
         echo "<option value='".$r_g["group"]."'>".$r_g["group"]."</option>";
 }
?>
    </select>

</form>
<div style="width:80%;height:70%;margin:6%;" id="container"></div>

<script>
Highcharts.chart('container', {
    chart: {
        polar: true,
        type: 'line'
    },
    title: {
        text: 'Radar pour la matiere <b><?php echo $matiere ;?></b>'
    },
    xAxis: {
        categories: [
            <?php
    $sql_a = "SELECT * from axe";
    $_query_a = mysqli_query($conn,$sql_a);
    while ($a = mysqli_fetch_assoc($_query_a)) {
        echo "'".$a["nomaxe"]."',";
    }
    
    ?>

        ],
        tickmarkPlacement: 'on',
        lineWidth: 0
    },
    yAxis: {
        gridLineInterpolation: 'polygon',
        lineWidth: 0,
        tickPositions: [0, 20, 40, 60, 80, 100],
        min: 0,
        max: 100,
    },
    // legend: {
    //     layout: 'vertical',
    //     align: 'right',
    //     verticalAlign: 'middle'
    // },
    series: [{

        name: '<?php echo $matiere; ?>',
        data: [<?php
    $sql_a1 = "SELECT * from axe";
    $_query_a1 = mysqli_query($conn,$sql_a1);
    while ($a1 = mysqli_fetch_assoc($_query_a1)) {
        echo score($a1["id"]).",";
    }
    
    ?>],
        pointPlacement: 'on',
        color: "black",
    }, {

        name: 'Max',
        data: [100, 100, 100, 100, 100, 100],
        pointPlacement: 'on',
        color: 'green',
    }, {

        name: 'Seille',
        data: [60, 60, 60, 60, 60, 60],
        pointPlacement: 'on',
        color: "red",
    }]
});
</script>