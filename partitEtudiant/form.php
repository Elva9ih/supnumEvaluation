<?php
session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['user'])) {
     header('location:/p2e/index.php');
}

$alert = "";
include("../connection.php");
$matiere=$_GET["codematieres"];
$n_m =  mysqli_fetch_assoc(mysqli_query($conn, "SELECT nommatieres from matieres where id=$matiere"))["nommatieres"];
if(!empty($_POST['pointfort']) && !empty($_POST['pointfaible']) && !empty($_POST['capaciter'])){
if (isset($_POST["submit"])) {
    $matricule=$_SESSION['matricule'];
    $question=0;
             $id_etd="SELECT id from etudiants where matricule=$matricule";
             $r=mysqli_query($conn, $id_etd);
             $etudiant= mysqli_fetch_row($r);
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

             $verify="SELECT id_etud from reponse where id_etud = $etudiant[0] and id_evalu= $e[0]";
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
             
             $group="SELECT `group` from etudiants where matricule=$matricule";
             $query=mysqli_query($conn, $group);
             $G= mysqli_fetch_row($query);

             $pointfort=$_POST['pointfort'];
             $pointfaible=$_POST['pointfaible'];
             $capaciter=$_POST['capaciter'];
             $sql1 ="INSERT INTO `description`(`id_evalu`,`pointfort`, `pointfaible`, `connaissance`,`group`,`id_etud`) VALUES ($e[0],'$pointfort','$pointfaible','$capaciter','$G[0]',$etudiant[0])";
              mysqli_query($conn,$sql1);
            }
             header("location:index.php") ;
               
                
            }
        }
      
}elseif(isset($_POST["submit"]) && ( empty($_POST['pointfort']) || empty($_POST['pointfaible']) || empty($_POST['capaciter'] ))){
                 
    $alert = '<div class="alert alert-success" id="success-alert">
    <span aria-hidden="true">&times;</span>
    <strong><center> <b>Il faut répondre à toutes les questions123456789!</b> </center></strong>
    </div>';
}
            
 
        


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
            float: left;
            width: 100%;
            min-height: 75px;
            outline: none;
            resize: none;
            border: 1px solid grey;
            padding:5px;
            
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
    background: #0094D7;
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
        <br><br>
     
  
        <br>
       

    <div class="mb-5 mb-lg-n20 z-index-2">
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
                               
                                
                                    echo '
                                            <tr>
                                              <td style="width:70%">' . $array[1] . '</td>
                                              <td style="width:30%">
                        
<nav class="nav">
    <input id="a' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="3" required checked>
    <label for="a' .$l. $i . '">Oui</label>
    
    <input id="b' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="2" required>
    <label for="b' .$l. $i . '">Plutôt oui</label>
    
    <input id="c' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="1" required>
    <label for="c' .$l. $i . '">Plutôt non</label>
    
    <input id="d' .$l. $i . '" type="radio" name="rep' .$l. $i . '" value="0" required>
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
                        
                     
                 
            <table class="shadow table gy-5 table-hover gy-9 gs-7">
          <tbody>
          <div class="table-responsive my-1" >

          <tr style="border-radius: 40px 40px 0px 0px;"><td colspan="2" style="border-radius: 40px 40px 0px 0px; font-size:18px;text-align: center;background: #20639B;color: #fff;" >Evaluation de Comp et Conn</td></tr>

<tr><td>
<div class="containe">
        <div class="comment">
            <textarea class="textinput" name="pointfort" placeholder="Points forts du cours"></textarea>
        </div>
</td></tr>

<tr><td>
<div class="containe">
        <div class="comment">
            <textarea class="textinput" name="pointfaible" placeholder="Points faibles du cours"></textarea>
        </div>
</td></tr>
<tr><td>
<div class="containe">
        <div class="comment">
            <textarea class="textinput" name="capaciter" placeholder="capaciter"></textarea>
        </div>
</td></tr>

          </div>
          </tbody>
          </table>


                            <br>
                            <button class="btn btn-success" name="submit">Envoyer</button>
                            </div>

                </form>


            </div>
        </div>

    
  <script>
    $(document).ready(function() {
  $("#success-alert").hide();

    $("#success-alert").slideDown(300).delay(2000).slideUp(400);
});

$('#success-alert .close').click(function() {
  $(this).parent().hide();
});
  </script>
    <?php


?>