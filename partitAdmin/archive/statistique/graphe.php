
<?php
include"s.php";
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
     header('location:/p2e/index.php');
}
    
    include "../../../connection.php";

    
$a = "Axe";
$b = "Question";
$quest="";
$_matiere = $_GET['codematieres'];

if (!isset($_SESSION["group"])) {
  $_SESSION["group"]="group";
  $_SESSION["c_group"]="";
  $_SESSION["c1_group"]="";
  
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
$_id_eval=mysqli_query($conn,"SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');");
$id_eval=mysqli_fetch_row($_id_eval);
$sql_score = "SELECT score FROM reponse where `id_evalu`=$id_eval[0] ".$_SESSION["c_group"]." and id_evalu in (select id from evaluation where id_mat in (select id_mat from inspection where annee = '".$_SESSION["annee"]."')) ;";
if (isset($_POST["axe"])) {
    if ($_POST["axe"] != "Axe") {
     $sql_score = "SELECT score FROM reponse WHERE id_question in (SELECT id from question where id_axe=".$_POST["axe"].") ".$_SESSION["c_group"]." and id_evalu=$id_eval[0] and id_evalu in (select id from evaluation where id_mat in (select id_mat from inspection where annee = '".$_SESSION["annee"]."'));";
    $sql_axe = "SELECT * FROM question where id_axe =".$_POST["axe"];
    $a = mysqli_fetch_assoc(mysqli_query($conn,"select nomaxe from axe where id=".$_POST["axe"]))["nomaxe"];
    $query_axe = mysqli_query($conn,$sql_axe);
     while($axe = mysqli_fetch_assoc($query_axe)){
        $quest = $quest."<option value=".$axe['id'].">".$axe['question']."</option>";

    }
   
     }
}
if (isset($_POST["question"])) {
    
    $a = mysqli_fetch_assoc(mysqli_query($conn,"select nomaxe from axe where id in(SELECT id_axe from question where id=".$_POST["question"].")"))["nomaxe"];
    $b = mysqli_fetch_assoc(mysqli_query($conn,"select question from question where id=".$_POST["question"]))["question"];
    $sql_score = "SELECT score FROM reponse WHERE id_evalu =$id_eval[0] ".$_SESSION["c_group"]." and id_question =".$_POST["question"]." and id_evalu in (select id from evaluation where id_mat in (select id_mat from inspection where annee = '".$_SESSION["annee"]."'))";
    $sql_axe = "SELECT * FROM question where id_axe in (SELECT id_axe from question where id=".$_POST["question"].")";
    $query_axe = mysqli_query($conn,$sql_axe);
     while($axe = mysqli_fetch_assoc($query_axe)){
        if ($axe["id"] != $_POST["question"]) {
            $quest = $quest."<option value=".$axe['id'].">".$axe['question']."</option>";
        }

     }
}

$s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
$query_score = mysqli_query($conn,$sql_score);
while($rep = mysqli_fetch_assoc($query_score)){
   $s[$rep['score']]++;
}

 $score = round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);


$t = $s[3] + $s[2] + $s[1] + $s[0] ;
$pour_oui = $s[3]*100/$t ;
$pour_p_oui = $s[2]*100/$t ;
$pour_p_non = $s[1]*100/$t ;
$pour_non = $s[0]*100/$t ;
if ($score > 60) {
    $c = 'green' ;
}
else {
    $c = 'red' ;
}
//  ####################################################################################
function f($quetion,$id_eval){
    include "../../../connection.php";
    $sql_score = "SELECT score FROM reponse WHERE id_evalu =$id_eval and id_question = $quetion";
    $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
    
    $query_score = mysqli_query($conn,$sql_score);
    while($rep = mysqli_fetch_assoc($query_score)){
          $s[$rep['score']]++;
    }
    
     $score = round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);
    return $score;
  }
  // #####################################################################################
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>graphe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/22.1.3/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
      <style>
  .butt1{
    position: absolute;
    background-color: #20c997;
    top:15.5%;
    width: 50%;
    margin-left:27% ;
    }
 </style>
    <script>
    $(() => {
        $('#chart').dxChart({
            palette: 'soft',
            dataSource,
            commonSeriesSettings: {
                barPadding: 0.5,
                argumentField: 'state',
                type: 'bar',

            },
            series: [{
                    valueField: 'oui',
                    name: '<h1><b>oui<?php echo ": ".round($pour_oui,2) ;?>%</b></h1>',
                    color: '#008000',
                    width: 0.2
                },
                {
                    valueField: 'p_oui',
                    name: '<h1><b>pluton oui<?php echo ": ".round($pour_p_oui,2) ;?>%</b></h1>',
                    color: '#52B640'
                },
                {
                    valueField: 'p_non',
                    name: '<h1><b>pluton non<?php echo ": ".round($pour_p_non,2) ;?>%</b></h1>',
                    color: '#EE4747'
                },
                {
                    valueField: 'non',
                    name: '<h1><b>non<?php echo ": ".round($pour_non,2) ;?>%</b></h1>',
                    color: '#EE1818'
                },
            ],
            legend: {
                verticalAlignment: 'bottom',
                horizontalAlignment: 'center',
            },
            export: {
                enabled: true,
            },
            title: {
                text: '<center><b><h3><?php echo $_matiere; ?> </h3> </b> </center>',
                subtitle: {
                    text: '<?php
            if(isset($_POST['axe'])) {
                if ($_POST['axe'] != "Axe") {
                    $s_taxe = "SELECT nomaxe from axe where id =".$_POST['axe'];
                    echo "<b>Axe:</b> ".mysqli_fetch_assoc(mysqli_query($conn,$s_taxe))["nomaxe"].".";                }
              
            }
            if(isset($_POST['question'])) {
                $s_taxe = "SELECT nomaxe from axe where id in (select id_axe from question where id=".$_POST['question'].")";
                echo "<b>Axe:</b> ".mysqli_fetch_assoc(mysqli_query($conn,$s_taxe))["nomaxe"].".<br>";
                $s_taxe = "SELECT question from question where id =".$_POST['question'];
                echo "<b>Question:</b> ".mysqli_fetch_assoc(mysqli_query($conn,$s_taxe))["question"].".";
            }
            ?>',
                },
            },
        });
    });


    const dataSource = [{
        state: '<h1 style="font-size:30px;"><b>score :</b> <?php echo '<b style="color:'.$c.';">'.$score."</b>%" ;?></h1>',
        oui: <?php echo round($pour_oui,2);?>,
        p_oui: <?php echo round($pour_p_oui,2);?>,
        p_non: <?php echo round($pour_p_non,2);?>,
        non: <?php echo round($pour_non,2);?>,

    }];
    </script>
</head>
<?php $_SESSION['score']=$score;?>

<body>

    <div class="container my-20 pb-70 mt-n10"><br>
        <form action="" method="post">
            <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="group"
                id="s" style="display: inline;">
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
    $q_g = mysqli_query($conn,$s_g);
    while($r_g = mysqli_fetch_assoc($q_g)){
      if($r_g["group"] != $xr1)
            echo "<option value='".$r_g["group"]."'>".$r_g["group"]."</option>";
    }
    ?>
            </select>
        </form>
        <br>
        <form action="" method="POST" style="width:47%;display: inline;">
            <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="axe"
                style="display: inline;">
                <option selected><?php echo $a ;?></option>

                <?php
  if($a != "Axe"){
    echo '<option value="Axe">Axe</option>';
  }
$sql_axe = "SELECT * FROM axe";
$query_axe = mysqli_query($conn,$sql_axe);
 while($axe = mysqli_fetch_assoc($query_axe)){
    if ($a != $axe['nomaxe']) {
        echo  "<option value=".$axe['id'].">".$axe['nomaxe']."</option>";
    }
     }
 ?>
            </select>
        </form><br><br>
        <form action="" method="POST">
            <select class="form-select" onchange="this.form.submit()" aria-label="Default select example"
                name="question" style="display: inline;">
                <option selected disabled><?php echo $b ;?></option>
                <?php

echo $quest;
?>

            </select>
        </form>


        <div id="chart" class="graphe" class="shadow p-2 rounded border border-top border-primary">
        </div>
    </div>
<!-- ################################################################################################ -->
<button id="btnExport" onclick="tableToExcel()" class="butt1"> Cliquez ici pour obtenir le résultat du matériel dans le fichier Excel</button>
    <table class="table table-bordered  table-striped" id="table"  style="display:none;">
        <thead>
            <tr>
                <th>les axes </th>
                <th> les questions </th>
                <th> scores </th>
                <th> action corrective </th>
            </tr>
        </thead>
 <?php

 $sql="SELECT * FROM `question` ";
 $array=mysqli_query($conn,$sql);
 if ($array->num_rows > 0): $i = 0;
 while($question=mysqli_fetch_row($array)):
    $sql1= "SELECT `nomaxe` FROM `axe` where `id` in (select `id_axe` from `question` where `id`=$question[0]) ";
    $array1=mysqli_query($conn,$sql1);
    $axe=mysqli_fetch_row( $array1);
    $f=f($question[0],$id_eval[0]);
    if($f < 60){
?>
        <tbody>
            <tr>
                <td><?php echo $axe[0]; ?></td>
                <td><?php echo $question[1]; ?></td>
                <td><?php echo $f;?></td>
                <td></td>
            </tr>
        </tbody>
        <?php
        }
         $i += 1; 
        endwhile; 
        endif;
         ?>
 </table>
<!-- ################################################################################################ -->
</body>
<html>