<?php

//    include"header.php";
    include"s.php";
    include "../../connection.php";
$a = "Axe";
$b = "Question";
$quest="";
// $_matiere = $_GET['code'];
$_matiere ="DSI312";
$_SESSION['_matiere']=$_matiere;
$_id_eval=mysqli_query($conn,"SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');");
$id_eval=mysqli_fetch_row($_id_eval);
$sql_score = "SELECT score FROM reponse where `id_evalu`=$id_eval[0];";
// if (isset($_POST["axe"])) {
//     if ($_POST["axe"] != "Axe") {
//      $sql_score = "SELECT score FROM reponse WHERE id_question in (SELECT id from question where id_axe=".$_POST["axe"].") and id_evalu=$id_eval[0];";
//     $sql_axe = "SELECT * FROM question where id_axe =".$_POST["axe"];
//     $a = mysqli_fetch_assoc(mysqli_query($conn,"select nomaxe from axe where id=".$_POST["axe"]))["nomaxe"];
//     $query_axe = mysqli_query($conn,$sql_axe);
//      while($axe = mysqli_fetch_assoc($query_axe)){
//         $quest = $quest."<option value=".$axe['id'].">".$axe['question']."</option>";

//     }
   
//      }
// }
// if (isset($_POST["question"])){
    
//     $a = mysqli_fetch_assoc(mysqli_query($conn,"select nomaxe from axe where id in(SELECT id_axe from question where id=".$_POST["question"].")"))["nomaxe"];
//     $b = mysqli_fetch_assoc(mysqli_query($conn,"select question from question where id=".$_POST["question"]))["question"];
//     $sql_score = "SELECT score FROM reponse WHERE id_evalu =$id_eval[0] and id_question =".$_POST["question"];
//     $sql_axe = "SELECT * FROM question where id_axe in (SELECT id_axe from question where id=".$_POST["question"].")";
//     $query_axe = mysqli_query($conn,$sql_axe);
     
// }

// $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
// $query_score = mysqli_query($conn,$sql_score);
// while($rep = mysqli_fetch_assoc($query_score)){
//    $s[$rep['score']]++;
// }

//  $score = round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);

 function f($quetion,$id_eval){
    include "../../connection.php";
    $sql_score = "SELECT score FROM reponse WHERE id_evalu =$id_eval and id_question = $quetion";
    $s = [3 => 0, 2 => 0, 1 => 0, 0 => 0];
    
    $query_score = mysqli_query($conn,$sql_score);
    while($rep = mysqli_fetch_assoc($query_score)){
          $s[$rep['score']]++;
    }
    
     $score = round(($s[3]*3 + $s[2]*2 + $s[1])*100/(3*($s[3] + $s[2] + $s[1] + $s[0])),2);
    return $score;
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>graphe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/22.1.3/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script>

 </script>
 </head>
 <body >
 <button id="btnExport" onclick="tableToExcel()"  class="button button5">Export</button>
    <table class="table table-bordered  table-striped">
        <thead>
            <tr>
                <th>nom axe </th>
                <th> nom question </th>
                <th> score </th>
                <th> action </th>
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
 </body>
 <html>
 <script type="text/javascript" src="js/table2excel.js"></script>
<script type="text/javascript" src="js/script.js"></script>











































<?php

   include"header.php";
    include"s.php";
    include "../../connection.php";
$a = "Axe";
$b = "Question";
$quest="";
$_matiere = $_GET['code'];
$_id_eval=mysqli_query($conn,"SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');");
$id_eval=mysqli_fetch_row($_id_eval);
$sql_score = "SELECT score FROM reponse where `id_evalu`=$id_eval[0];";
if (isset($_POST["axe"])) {
    if ($_POST["axe"] != "Axe") {
     $sql_score = "SELECT score FROM reponse WHERE id_question in (SELECT id from question where id_axe=".$_POST["axe"].") and id_evalu=$id_eval[0];";
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
    $sql_score = "SELECT score FROM reponse WHERE id_evalu =$id_eval[0] and id_question =".$_POST["question"];
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>graphe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>window.jQuery || document.write(decodeURIComponent('%3Cscript src="js/jquery.min.js"%3E%3C/script%3E'))</script>
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.common.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn3.devexpress.com/jslib/22.1.3/css/dx.light.css" />
    <script src="https://cdn3.devexpress.com/jslib/22.1.3/js/dx.all.js"></script>
    <script src="data.js"></script>
    <link rel="stylesheet" type="text/css" href="styles.css" />
    <script src="index.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
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
    series: [
      { valueField: 'oui', name: '<h1><b>oui<?php echo ": ".round($pour_oui,2) ;?>%</b></h1>', color: '#008000',width:0.2},
      { valueField: 'p_oui', name: '<h1><b>pluton oui<?php echo ": ".round($pour_p_oui,2) ;?>%</b></h1>',color: '#52B640'},
      { valueField: 'p_non', name: '<h1><b>pluton non<?php echo ": ".round($pour_p_non,2) ;?>%</b></h1>',color: '#EE4747'},
      { valueField: 'non', name: '<h1><b>non<?php echo ": ".round($pour_non,2) ;?>%</b></h1>',color: '#EE1818'},
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
 <style>
  .but1{
    position: absolute;
    background-color: red;
    top:20%;
    margin-left:95% ;
    }
   
 </style>
 </head>
 
 <?php $_SESSION['score']=$score;?>

 <body>
 
  <div class="container my-20 pb-70 mt-n10" >
  <br><br>
 <form action="" method="POST" style="width:47%;display: inline;">
 <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="axe" style="display: inline;">
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


    //  ####################################################################################
    function f($quetion,$id_eval){
      include "../../connection.php";
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
 
</select>

</form><br><br>
<form action="" method="POST" >
<select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="question" style="display: inline;">
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
<button id="btnExport" onclick="tableToExcel()" class="but1">Export</button>
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
<script type="text/javascript" src="js/table2excel.js"></script>
<script type="text/javascript" src="js/script1.js"></script>



</script>
 <style>
  .but1{
    position: absolute;
    background-color: red;
    top:20%;
    margin-left:95% ;
    }
   
 </style>


<!-- ############################################################################################# -->
<!-- ############################################################################################# -->
<?php
session_start();
if (!isset($_SESSION['matricule'])) {
     header('location:/p2e/index.php');
}

$alert = "";
include("../connection.php");
if(!empty($_POST['pointfort']) && !empty($_POST['pointfaible']) && !empty($_POST['capaciter'])){
if (isset($_POST["submit"])) {
    $matricule=$_SESSION['matricule'];
    $question=0;
             $id_etd="SELECT id from etudiants where matricule=$matricule";
             $r=mysqli_query($conn, $id_etd);
             $etudiant= mysqli_fetch_row($r);
             $matiere=$_GET["codematieres"];
             $dep="SELECT dep_id from etudiants where matricule=$matricule";
             $result1=mysqli_query($conn, $dep);
             if ($result1->num_rows > 0  ){
             $departement=mysqli_fetch_row($result1);
             #####################################################################
             $code=" SELECT id from departement WHERE id in (SELECT id_dep from matieres where id=$matiere)";
             $eval1=mysqli_query($conn, $code);
             $id_mat_dep = mysqli_fetch_row($eval1);

             $code_mat=" SELECT code from departement WHERE id= $id_mat_dep[0]";
             $eval1=mysqli_query($conn, $code_mat);
             $code_mat_dep = mysqli_fetch_row($eval1);
             ######################################################################
             if($code_mat_dep[0] != 'TC'){ 
              $id_eval = "SELECT id from evaluation WHERE dep_id=$departement[0] and id_mat=$matiere ;";
             $eval=mysqli_query($conn, $id_eval);
             $e= mysqli_fetch_row($eval);
             }else{

              $id_eval="SELECT id from evaluation WHERE dep_id=$id_mat_dep[0] and id_mat=$matiere;";
              $eval=mysqli_query($conn, $id_eval);
              $e= mysqli_fetch_row($eval);

             }

             $verify="SELECT id_etud from reponse where id_etud = $etudiant[0] && id_evalu= $e[0]";
              $result2=mysqli_query($conn, $verify);
              if ($result2->num_rows == 0  ){

            $sql1= "SELECT * FROM `axe` WHERE `id` IN (SELECT `id_axe` from `question`); ";
            $result1 = mysqli_query($conn, $sql1);
            while($a=mysqli_fetch_assoc($result1)){
         
           $l=$a['id'];
           $sql = "SELECT * FROM `question` where `id_axe`=$l;";
            $result = mysqli_query($conn, $sql);


             if ($result->num_rows > 0): $i = 0;
             
              while ($array = mysqli_fetch_row($result)): ;
            
              $B="rep$l$i" ;
              $score=$_POST[$B];
              $question=$question+1;


              $sql= "INSERT INTO `reponse`( `id_etud`, `id_question`, `id_evalu`, `score`) VALUES ($etudiant[0],$question,$e[0],$score);";
              mysqli_query($conn,$sql);
                   
              
                $i += 1;

                    endwhile; 
                endif;

             }
             
             $group="SELECT group from etudiants where matricule=$matricule";
             $query=mysqli_query($conn, $group);
             $G= mysqli_fetch_row($query);

             $pointfort=$_POST['pointfort'];
             $pointfaible=$_POST['pointfaible'];
             $capaciter=$_POST['capaciter'];
             $sql1 ="INSERT INTO `description`(`id_evalu`,`pointfort`, `pointfaible`, `connaissance`) VALUES ($e[0],'$pointfort','$pointfaible','$capaciter','$G[0]')";
              mysqli_query($conn,$sql1);
            }
             header("location:index.php") ;
               
                
            }
        }
      
}elseif(isset($_POST["submit"]) && ( empty($_POST['pointfort']) || empty($_POST['pointfaible']) || empty($_POST['capaciter'] ))){
                 
    $alert = '<div class="alert alert-success" id="success-alert">
    <span aria-hidden="true">&times;</span>
    <strong><center> <b>Il faut répondre à toutes les questions123456789!</b> </center></strong>"
    </div>';
}
            
 
        


    ?>
    <!DOCTYPE html>
    <html>
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="/partitEtudiant/partitEtudiant/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="../assets/css/style22.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></scriplocation.replace>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script>
    $(document).ready(function() {
  $("#success-alert").hide();

    $("#success-alert").slideDown(300).delay(2000).slideUp(400);
});

$('#success-alert .close').click(function() {
  $(this).parent().hide();
});
  </script>
<link rel="stylesheet" href="css/style.css">
        <title>Formulaire</title>
        <?php include "header.php";?>
        <br>
        <br>
      <br>
   
    </head>
  <body>
        <br>
        <br>

        // <div class="mb-5 mb-lg-n20 z-index-2">
            <div class="container my-20 pb-10 mt-n10">
                <h1 style="text-align:center;">-------- Evaluation ------</h1>
                
                <br>


                <form method="POST" class="shadow p-5 rounded border border-top border-primary">
                    <?php
                    echo $alert ; 
                    $sql1= "SELECT * FROM `axe` WHERE `id` IN (SELECT `id_axe` from `question`); ";
                   $result1 = mysqli_query($conn, $sql1);
                 while($a=mysqli_fetch_assoc($result1)){
                
                 $l=$a['id'];
               
                  $sql = "SELECT * FROM `question` where `id_axe`=$l;";
        
                    $result = mysqli_query($conn, $sql);
                    ?>
                    
                        <table class="table table-row-bordered gy-5 table-hover table-rounded border gy-9 gs-7">
                            <thead>
                            <tr >
                                <th style="width: 60%;">Question</th>
                                <th style="width: 6%;">Oui</th>
                                <th style="width: 6%;">Plutôt oui</th>
                                <th style="width: 6%;">Plutôt non</th>
                                <th style="width: 6%;">Non</th>
                            </tr>
                            </thead>
                            <tbody>
                            <div class="table-responsive my-2">
                            <?php 
                            echo '<p style="font-size:18px;color:#1A1A80;" >'.$a['nomaxe'].'</p>';
                            
                            if ($result->num_rows > 0): $i = 0;
                                ?>
                                
                                <?php while ($array = mysqli_fetch_row($result)): ;
                               
                                
                                    echo '
                                            <tr>
                                              <td >' . $array[1] . '</td>
                                              <td> <input  type="radio" name="rep' .$l. $i . '" value="3" required checked> </td>
                                              <td><input type="radio" name="rep' .$l. $i . '" value="2" required></td>
                                              <td><input type="radio" name="rep' .$l. $i . '" value="1" required></td>
                                              <td><input type="radio" name="rep'. $l. $i . '" value="0" required></td>
                                              </tr>';
                                    $i += 1;
                                    ?>
                                <?php endwhile; ?>
                               
                            <?php endif; ?>
                            
                            <?php 
                            }?>
                            
                            </tbody>
                           
                        </table>
                        
                     
                     <br>
                    <label for=""> <b>Points forts du cours</b> <br>
                            <textarea rows="6" cols="50" style="background-color:#EFEFEF" name="pointfort" ></textarea>
                            </label>
                            <br>
                            
                            <label for="">
                            <b>Points faibles du cours </b><br>
                            <textarea rows="6" cols="50" style="background-color:#EFEFEF" name="pointfaible"></textarea>
                            </label><br>
                            <label for=""><b>capaciter </b><br>
                            <textarea rows="6" cols="50" style="background-color:#EFEFEF" name="capaciter"></textarea>
                            </label>
                            <br>
                            <button class="btn btn-success" name="submit">Envoyer</button>
                            </div>

                </form>


            </div>
        </div>

    
    </body>
    </html>
   
   
    <?php


?>