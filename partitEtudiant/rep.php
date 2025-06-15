<?php
session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['user'])) {
     header('location:/p2e/index.php');
}
$matiere=$_GET["codematieres"];
$matricule = $_SESSION['matricule'] ;

$alert = "";
include("../connection.php");

$n_m =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT nommatieres from matieres where codematieres='$matiere'"))["nommatieres"];



    ?>


    <style>
        .containe {
            max-width: 820px;
            margin: 0px auto;
        }
        .comment {
            float: left;
            width: 100%;
            height: auto;
        }
        .commente {
            float: left;
        }
        .commente img {
            width: 35px;
            height: 35px;
        }
        .comment-text-area {
            float: left;
            width: 100%;
            height: auto;
        }

        .textinput {
            color:#32de84;
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
            padding: 4px;
        }



textarea:focus {
  outline: none;
}

textarea{
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
}
.arr{
            float: left;
            width: 100%;
            height: auto;
}

.arr-text-area {
            float: left;
            width: 100%;
            height: auto;
        }


.nav{
    margin-right:0%;
    width: fit-content;
    border: 1px solid #666;
    border-radius: 4px;
    overflow: hidden;
    display: flex;
    flex-direction: row;
    flex-wrap: no-wrap;
}
.nav input{ display: none; }
.nav label{
  
    font-size:12px;
    font-family: sans-serif;
    padding: 10px 16px;
    border-right: 1px solid #ccc;
    cursor: pointer;
    transition: all 0.3s;
}
.nav label:last-of-type{ border-right: 0; }
.nav label:hover{
    background: #eee;
}
.nav input:checked + label{
    background: #32de84;
    margin:0px;
    color: #fff;
}

</style>



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
        <?php include "header1.php";?>
        <br>
        <br>
     <br>
   
   
        <br>

    <div class="mb-5 mb-lg-n20 z-index-2" >
            <div class="container my-20 pb-10 mt-n1">
                <form method="POST" class="shadow p-5 rounded border border-top">
                    <?php
                    echo $alert ; 
                    $sql1= "SELECT * FROM `axe` WHERE `id` IN (SELECT `id_axe` from `question`); ";
                   $result1 = mysqli_query($conn, $sql1);
                 while($a=mysqli_fetch_assoc($result1)){
                
                 $l=$a['id'];
               
                  $sql = "SELECT * FROM `question` where `id_axe`=$l;";
        


                    $result = mysqli_query($conn, $sql);
                    ?>
        
                        <table class="shadow table gy-5 table-hover gy-9 gs-7">
          
                            <tbody>
                            <div class="table-responsive my-1" >
                            <?php 
                            echo '<tr style="border-radius: 40px 40px 0px 0px;"><td colspan="2" style="border-radius: 40px 40px 0px 0px; font-size:18px;text-align: center;background: #20639B;color: #fff;" >'.$a['nomaxe'].'</td></tr>';
                            
                            if ($result->num_rows > 0): $i = 0;
                                ?>
                                
                                <?php while ($array = mysqli_fetch_row($result)): ;
                               
                               $disabled = "SELECT score from reponse where id_etud in(select id from etudiants where matricule=".$matricule.") and id_evalu in (select id from evaluation where id_mat in (select id from matieres where codematieres = '".$matiere."')) and id_question = ".$array[0];
                               $q_dis=mysqli_query($conn, $disabled);
                               $disab = mysqli_fetch_row($q_dis)[0];
                               $d = ["disabled","disabled","disabled","disabled"];
                               
                                $d[$disab] = "checked";
                                    echo '
                                            <tr>
                                              <td style="width:70%">' . $array[1] . '</td>
                                              <td style="width:30%">
                        
<nav class="nav">
    <input id="a' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="3" required '.$d[3].'>
    <label for="a' .$l. $i . '">Oui</label>
    
    <input id="b' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="2" required '.$d[2].'>
    <label for="b' .$l. $i . '">Plutôt oui</label>
    
    <input id="c' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="1" required '.$d[1].'>
    <label for="c' .$l. $i . '">Plutôt non</label>
    
    <input id="d' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="0" required '.$d[0].'>
    <label for="d' .$l. $i . '" >Non</label>
    
    <!-- as many choices as you like -->
</nav>
                                              
                                              
                                              </td>

                                              </tr>';
                                    $i += 1;
                                    ?>
                                <?php endwhile; ?>
                       
                            <?php endif; ?>
                            </table><br>
                            <?php 
                            }?>
                            
                            </tbody>
                           
                        </table>
                       <?php
                       $matieres = "SELECT id from `matieres` where  codematieres = '".$matiere."' ";
                       $matiere=mysqli_query($conn, $matieres);
                       $id_mat = mysqli_fetch_row($matiere);

                       $desc = "SELECT * from `description` where ( id_etud in (select id from etudiants where matricule=".$matricule.") and `id_evalu` in ( select id from evaluation where id_mat=$id_mat[0])) ";
                       $q_des=mysqli_query($conn, $desc);
                       $rep = mysqli_fetch_row($q_des);

                       
                       ?>       
            <table class="shadow table gy-5 table-hover gy-9 gs-7">
          <tbody>
          <div class="table-responsive my-1" >

          <tr style="border-radius: 40px 40px 0px 0px;"><td colspan="2" style="border-radius: 40px 40px 0px 0px; font-size:18px;text-align: center;background: #20639B ;color: #fff;" >Evaluation de Comp et Conn</td></tr>




<tr><td>
<div class="containe">
        <div class="comment">
        
            <div class="textinput" style="color:green;"name="pointfort" placeholder=""><nav style="color:black ;display:inline">Points forts du cours: </nav><i><?=  $rep[2];?></i></div>
        </div>
</td></tr>





<tr><td>
<div class="containe">
        <div class="comment">
            <div class="textinput" style="color:green;" name="pointfaible" placeholder=""><nav style="color:black ;display:inline">Points faibles du cours: </nav><i><?php  echo $rep[3];?></i></div>
        </div>
</td></tr>
<tr><td>
<div class="containe">
        <div class="comment">
            <div class="textinput" style="color:green;" name="capaciter" placeholder=""><nav style="color:black ;display:inline">capaciter: </nav><i><?php  echo $rep[4];?></i></div>
        </div>
</td></tr>

          </div>
          </tbody>
          </table>
          <a href="index.php" style="background-color:#4b64ff;" class="btn btn-success"> << </a>
 
                            </div>

                </form>


            </div>
        </div>

        
 
   
    <?php


?>