<?php

?>

<!DOCTYPE html>
<html>

<head>

    <?php        
        $scor1=0; 
        $oui1=0;
        $plutoui1=0;
        $plutnon1=0;
        $non1=0;
        ?>
    <title>Formulaire</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
    .button5 {
        background-color: white;
        color: black;
        border: 2px solid #555555;
    }

    .button5:hover {
        background-color: #555555;
        color: white;
    }

    .table {
        margin: ;
    }
    </style>
    <link rel="stylsheet" href="style.css">
    <?php include("../../connection.php");?>
    <?php include"s.php"?>
</head>

<div style="padding-left: 200px;padding-right: 200px;" class="card-header d-flex justify-content-between">
    <button id="btnExport" onclick="tableToExcel()" class="button button5">Export</button>

</div>

<body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="100"
    class="bg-white position-relative">
    <div class="d-flex flex-column flex-root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg">

                <div class="d-flex flex-column flex-center px-9">
                </div>
            </div>

        </div>

        <div class="mb-5 mb-lg-n20 z-index-2">
            <div class="container my-20 pb-10 mt-n10">


                <form method="POST">

                    <div class="table-responsive my-5">
                        <table class="table table-bordered  table-striped">

                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th></th>
                                <th>Oui</th>
                                <th>Plutôt oui</th>
                                <th>Plutôt non</th>
                                <th>Non</th>
                            </tr>
                            <?php
                                        include "../../connection.php";
                                        $_matiere = $_GET['codematieres'];
                                        $_id_eval=mysqli_query($conn,"SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');");
                                        $id_eval=mysqli_fetch_row($_id_eval);
                                        $sql1= "SELECT * FROM axe WHERE id IN (select id_axe from `question`)";
                                       $result1 = mysqli_query($conn, $sql1);
                                             while($a=mysqli_fetch_assoc($result1)){
                                            
                                                   $l=$a['id']; 
                                                   $sql="SELECT * FROM `question` where `id_axe`=$l;";
                                                   $result = mysqli_query($conn, $sql);
                                 ?>
                            <tr>
                                <th><?php echo $a['nomaxe']; ?></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>

                            <tbody>
                                <?php
                                    if ($result->num_rows > 0): $i = 0;
                                        ?>
                                <?php while ($array = mysqli_fetch_row($result)): 
                                            
                             $sql5 = "SELECT count(*) as oui FROM `reponse` WHERE  `id_question` =$array[0] and score=3 and `id_evalu`=$id_eval[0];";
                              $resul1=mysqli_query($conn, $sql5);
                               $oui=mysqli_fetch_assoc($resul1);
                               

                               include "../../connection.php";            
                            $sql2= "SELECT count(*) as plutoui FROM `reponse` WHERE `id_question` = $array[0] and score=2 and `id_evalu`=$id_eval[0];";
                              $result2=mysqli_query($conn, $sql2);
                              $plutoui=mysqli_fetch_assoc($result2);
                               

                            $sql3= "SELECT count(*) as plutnon FROM `reponse` WHERE `id_question` = $array[0] and score=1 and `id_evalu`=$id_eval[0];";
                               $result3=mysqli_query($conn, $sql3);
                              $plutnon=mysqli_fetch_assoc($result3);
                               


                            $sql4= "SELECT count(*) as non FROM `reponse` WHERE `id_question` = $array[0] and score=0 and `id_evalu`=$id_eval[0];";
                              $result4=mysqli_query($conn, $sql4);
                              $non=mysqli_fetch_assoc($result4);
                               
                              $oui1=$oui1+$oui['oui'];
                              $plutoui1=$plutoui1+$plutoui['plutoui'];
                              $plutnon1=$plutnon1+$plutnon['plutnon'];
                              $non1=$non1+$non['non'];
                            echo '
                                                    <tr>
                                                      <td>' . $array[1] . '</td>
                                                      <td>'.$oui['oui'].'</td>
                                                      <td>'.$plutoui['plutoui'].'</td>
                                                      <td>'.$plutnon['plutnon'].'</td>
                                                      <td>'.$non['non'].'</td>
                                                    </tr>';

                                            
                                            $i += 1;


                                            ?>

                                <?php endwhile; ?>
                                <?php endif; ?>

                                <?php 
                                        }
                                       
                                        $score = round(($oui1*3 + $plutoui1*2 +  $plutnon1)*100/(3*($oui1 + $plutoui1 + $plutnon1 + $non1)),2);
                                        
                                        ?>
                                <th colspan="5" style=" text-align:right;"><?php echo $score; ?></th>
                            </tbody>

                    </div>

                </form>

            </div>
        </div>

    </div>

</body>

</html>

<script type="text/javascript" src="js/table2excel.js"></script>
<script type="text/javascript" src="js/script.js"></script>