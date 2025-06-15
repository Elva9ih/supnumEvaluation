<?php session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['user'])) {
     header('location:/p2e/index.php');
}
include("../connection.php");?>

<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AirTravel</title>
    <link rel="stylesheet" href="./style.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
                                <link href='' rel='stylesheet'>
                                <style>
                                
                                
                                .white-mode {
    text-decoration: none;
    margin-left:80%;
    padding: 17px 40px;
    background-color: yellow;
    border-radius: 3px;
    color: black;
    transition: .35s ease-in-out;
    position: absolute;
    left: 15px;
    bottom: 15px
}
                                body {
    /* background: #B1EA86; */
    padding: 30px 0
}

a {
    text-decoration: none;
}

.pricingTable {
    text-align: center;
    background: #fff;
    margin: 0 -5px;
    box-shadow: 0 0 10px #ababab;
    padding-bottom: 40px;
    border-radius: 10px;
    color: #cad0de;
    transform: scale(1);
    transition: all .5s ease 0s;
    margin: 2%;
    margin-top: 5%;
    z-index: 1;

}

.pricingTable:hover {
    transform: scale(1.05);
    z-index: 1
}

.pricingTable .pricingTable-header {
    padding: 40px 0;
    background: #f5f6f9;
    border-radius: 10px 10px 50% 50%;
    transition: all .5s ease 0s
}

.pricingTable:hover .pricingTable-header {
    background: #ff9624
}

.pricingTable .pricingTable-header i {
    font-size: 50px;
    color: #858c9a;
    margin-bottom: 10px;
    transition: all .5s ease 0s
}

.pricingTable .price-value {
    font-size: 35px;
    color: #ff9624;
    transition: all .5s ease 0s
}

.pricingTable .month {
    display: block;
    font-size: 14px;
    color: #cad0de
}

.pricingTable:hover .month,
.pricingTable:hover .price-value,
.pricingTable:hover .pricingTable-header i {
    color: #fff
}

.pricingTable .heading {
    font-size: 16px;
    height:10%;
    color: #ff9626;
    margin-bottom: 20px;
    /* text-transform: uppercase */
}

.pricingTable .pricing-content ul {
    list-style: none;
    padding: 0;
    margin-bottom: 30px
}

.pricingTable .pricing-content ul li {
    line-height: 30px;
    color: #a7a8aa
}

.pricingTable .pricingTable-signup a {
    display: inline-block;
    font-size: 15px;
    color: #fff;
    padding: 10px 35px;
    border-radius: 20px;
    background: #ffa442;
    /* text-transform: uppercase; */
    transition: all .3s ease 0s
}

.pricingTable .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ffa442
}

.pricingTable.blue .heading,
.pricingTable.blue .price-value {
    color: #4b64ff
}

.pricingTable.blue .pricingTable-signup a,
.pricingTable.blue:hover .pricingTable-header {
    background: #4b64ff
}

.pricingTable.blue .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #4b64ff
}

.pricingTable.red .heading,
.pricingTable.red .price-value {
    color: #fff
}

.pricingTable.red .pricingTable-signup a,
.pricingTable.red:hover .pricingTable-header {
    background: #ff4b4b
}

.pricingTable.red .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #ff4b4b
}

.pricingTable.green .heading,
.pricingTable.green .price-value {
    color: #40c952
}

.pricingTable.green .pricingTable-signup a,
.pricingTable.green:hover .pricingTable-header {
    background: #40c952
}

.pricingTable.green .pricingTable-signup a:hover {
    box-shadow: 0 0 10px #40c952
}
.date{
    color:rgba(255,0,0,0.5);
    display: inline;
}
.pricingTable.blue:hover .price-value,
.pricingTable.green:hover .price-value,
.pricingTable.red:hover .price-value {
    color: #fff
}
.a{
    background-color: rgba(200,64,26,0.7);
}

@media screen and (max-width:800px) {
    
    .pricingTable {
        margin: 0 0 20px
    }

    .pricingTable .pricingTable-header i {
    font-size: 25px;
    }
    .pricingTable .pricingTable-header i {
    font-size: 25px;
    color: #858c9a;
    margin-bottom: 10px;
    transition: all .5s ease 0s
}
.pricingTable .pricing-content ul li {
    line-height: 15px;
    color: #a7a8aa
}

.pricingTable .price-value {
    font-size: 17.5px;
    color: #ff9624;
    transition: all .5s ease 0s
}

.pricingTable .month {
    display: block;
    font-size: 7px;
    color: #cad0de
}
.pricingTable .heading {
    font-size: 8px;
    height:10%;
    color: #ff9626;
    margin-bottom: 20px;
    /* text-transform: uppercase */
}
.pricingTable .pricingTable-signup a {
    display: inline-block;
    font-size: 7.5px;
}
}

.icon{
  margin-left: auto;
  margin-right: auto;
  width: 20%;
  margin-top:8%;
  margin-bottom:8%;

}

.row{
    margin-top:0px;
    padding-top: 0px;
}


.trigger {
  position: absolute;
  top: 100px;
  right: 0;
  height: 1px;
  left: 0;
  pointer-events: none;
  opacity: 0;
}

.scroll-button {
  display: flex;
  align-items: center;
  justify-content: center;
  pointer-events: none;
  color: #f2f2f2;
  background-color: #24A0ED;
  text-decoration: none;
  border-radius: 1.5rem;
  position: fixed;
  outline: none;
  z-index: 100;
  opacity: 0;
  inset: auto 2em 2em auto;
  height: 3rem;
  width: 3rem;
  transition: all 250ms ease-in-out;
}

.scroll-button--visible {
  opacity: 1;
  pointer-events: auto;
}

</style>

<?php include "header.php"?><br><br>

                                <script type='text/javascript' src=''></script>
                                <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
                                <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
                                <script type='text/javascript'></script> 
                                <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css">
                                <script type='text/javascript' src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
                                <span class="trigger"></span>
<a href="#" class="scroll-button">⬆</a>
<div class="demo" style="margin-top:70px;">
    <div class="container">
    

        <section class="row" id="w" style="box-shadow: 0 0 10px #ababab;padding-top:1.5%;padding-bottom:1.5%">
        <b style="text-align:center">Matières à évaluer</b>
             <?php
            $matricule=$_SESSION['matricule'];
             $i1=0;
                $query = "SELECT * FROM matieres WHERE id in (SELECT id_mat FROM `inspection` WHERE id_mat in (SELECT id_mat FROM evaluation WHERE debut<=NOW() and fin >=NOW() and id not in (select id_evalu from reponse WHERE id_etud=(SELECT id from etudiants WHERE matricule=$matricule)))  and id_etd=(SELECT id from etudiants WHERE matricule=$matricule));";
                $result = mysqli_query($conn, $query);
             if ($result->num_rows > 0  ): 
                
                 while($array = mysqli_fetch_row($result)):
                          $f = "SELECT fin FROM evaluation where id_mat = ".$array[0];
                          $fi = mysqli_fetch_assoc(mysqli_query($conn,$f))["fin"];
                           $i1++;
                
                        ?>
           
            <div class="col-md-3 col-sm-6" id="a<?php echo $i1 ;?>" style="margin-top:1%;margin-bottom:2%;" >
                <div class="pricingTable blue">
                    <div class="pricingTable-header" >
                        <!-- <i class="fa fa-diamond"></i> -->
                        <div class="price-value"> <?php echo $array[1]; ?> <span class="month"></span> </div>
                    </div>
                    <h3 class="heading"><?php echo $array[2]; ?></h3>
                    <!-- <div class="pricing-content">
                    </div> -->
                    <div class="pricingTable-signup">
                    <b>Date limit : <div class="date"><?php echo $fi ;?></div></b><br><br>
                   
                        <a href="form.php?codematieres=<?php echo $array[0]; ?>">evalue</a>
                    </div>

                </div>
            </div>
            
            <?php endwhile;?>
          
             
          <?php
        else:?>
        <img src="np.png" id="icon1" class="icon" alt=""  />

        <?php
        
        
        endif; ?>
          
          <?php  mysqli_free_result($result); 
            
          ?>
           

        </section>
<br>
<hr><br>

<section class="row" id="w1" style="box-shadow: 0 0 10px #ababab;margin-top:2%;padding-top:1.5%;">
<b style="text-align:center">Matières déja évaluées</b>
             

           <?php
            // $query_sem = "SELECT academic_id FROM etudiants where matricule= $matricule";
            // $result_sem  = mysqli_query($conn, $query_sem );
            // $semester_etud=mysqli_fetch_row($result_sem);
            // $semester = 'S' . strval($semester_etud[0]);
            
            $i2=0;
            $query ="SELECT * FROM matieres WHERE id in (SELECT id_mat FROM `inspection` WHERE id_mat in (SELECT id_mat FROM evaluation WHERE id in (select id_evalu from reponse WHERE id_etud=(SELECT id from etudiants WHERE matricule=$matricule))) and semester=(SELECT semester FROM etudiants where matricule= $matricule));" ;
            // Fetch all the data from the table customers
           $result = mysqli_query($conn, $query);
             if ($result->num_rows > 0) : ?>
                <?php while ($array = mysqli_fetch_row($result)):
                $i2++;
               ?>

                   <div class="col-md-3 col-sm-6" id="b<?php echo $i2;?>"  style="margin-top:1%;">
                        <div class="pricingTable green">
                            <div class="pricingTable-header">
                                <!-- <i class="fa fa-briefcase"></i> -->
                                <div class="price-value"><?php echo $array[1]; ?><span class="month"></span> </div>
                            </div>
                            <h3 class="heading"><?php echo $array[2]; ?></h3>
                            <div class="pricing-content">
                               
                            </div>
                            <div class="pricingTable-signup">
                                <a href="rep.php?codematieres=<?php echo $array[1]; ?>">voir reponse</a>
                            </div>
                        </div>
                    </div> 

                    <?php
                 endwhile; ?>
            <?php 
        else:
        ?>
        
        <img src="np.png" id="icon2" class="icon" alt=""  style="margin-top:8%;" />

        
        <?php
        endif; ?>

            <?php  mysqli_free_result($result); 
                 ?>
</section>
<br>
<hr><br>
<section class="row" id="w2" style="box-shadow: 0 0 10px #ababab;padding-top:1.5%;">
<b style="text-align:center">Durée d'évaluation expirée</b>

                    <?php


                            $i3=0;
                    $query1 = "SELECT * FROM matieres WHERE id in (SELECT id_mat FROM `inspection` WHERE id_mat in (SELECT id_mat FROM evaluation WHERE fin <=NOW() and id not in (select id_evalu from reponse WHERE id_etud=(SELECT id from etudiants WHERE matricule=$matricule)))  and id_etd=(SELECT id from etudiants WHERE matricule=$matricule)and semester=(SELECT semester FROM etudiants where matricule= $matricule));";
                    // Fetch all the data from the table customers

                    $result = mysqli_query($conn, $query1);
                    if ($result->num_rows > 0) : ?>

                        <?php while ($array = mysqli_fetch_row($result)):
                        $i3++;
                    ?>
                <div class="col-md-3 col-sm-6" id="c<?php echo $i3;?>" style="margin-top:1%;">
                                <div class="pricingTable">
                                    <div class="pricingTable-header">
                                        <!-- <i class="fa fa-adjust"></i> -->
                                        <div class="price-value"> <?php echo $array[1]; ?> <span class="month"></span> </div>
                               </div>
                                    <h3 class="heading"><?php echo $array[2]; ?></h3>
                                    <div class="pricing-content">
                            
                                    </div>
                                    <div class="pricingTable-signup a" style="height:auto;padding:3.87%">
                                        Retarde
                                    </div>
                                </div>
                            </div>
                            <?php  
            endwhile; ?>

            <?php
            else:
            ?>
            <img src="np.png" id="icon3" class="icon" alt=""  style="margin-top:8%;" />

            <?php endif; ?>



           <?php mysqli_free_result($result); ?>


        </section>
    </div>
</div>

<!-- Remove the container if you want to extend the Footer to full width. -->

  <!-- Footer -->
  <footer class="text-center text-white" style="background-color: blue" id="g">
    <!-- Grid container -->
    <div class="container">
      <!-- Section: Links -->
      <section class="mt-5" style="padding-top:0px;padding-bottom:11px">
        <!-- Grid row-->
        <div class="row text-center d-flex justify-content-center pt-5 " style="margin-top: -20px; ">
          <!-- Grid column -->
          
          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white" id = "z1" onclick="f1('z1')" >Objectif</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white" id = "z2" onclick="f1('z2')">NOTIONS</a>
            </h6>
          </div>
          <!-- Grid column -->

          <!-- Grid column -->
          <div class="col-md-2">
            <h6 class="text-uppercase font-weight-bold">
              <a href="#!" class="text-white" id = "z3" onclick="f1('z3')">INFORMATION</a>
            </h6>
          </div>
          <!-- Grid column -->
        </div>
        <!-- Grid row-->
      </section>
      <!-- Section: Links -->

      <hr class="my-2" />

      <!-- Section: Text -->
      <section class="mb-5" style="padding-top:20px;padding-bottom:11px">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-10">




            <p style="font-family:Arial;padding-top: 0px;" id = "y1">
            L’objectif du site est d’utiliser un nouveau moyen dans l’évaluation des apprentissages. 
             En permettant aux étudiants concernés de participer dans l’évaluation, en ajoutant les éléments
              des modules à évaluer, en lançant l’évaluation, en suivant la progression et enfin en récupérant
               les réponses, l’évaluation facilite le service d’assurance de la qualité de l'apprentissage. Elle 
               procure un sentiment
             d’engagement et d’interactivité, et permet aux apprenants de s’approprier leurs 
             apprentissages. Une évaluation efficace montre aux apprenants leur niveau actuel de performance
              et leur permet de savoir ce qu’ils doivent faire pour atteindre un niveau supérieur. 
           </p>


           <p style="padding-top: 0px;font-family:Arial;" id = "y2">
           Cet article présente une approche de l’évaluation des enseignements par les étudiants (EEE) axée sur le soutien au développement professionnel des enseignants, qui se distingue d’une approche visant le contrôle de la qualité de l’enseignement.
           </p>

           <p style="padding-top: 0px;font-family:Arial;" id = "y3">
           En réalité, ce score mesure bien d’autres choses. Alors qu’il n’est pas significativement corrélé avec l’apprentissage (mesuré par le niveau atteint par un étudiant en fin de semestre), il est corrélé avec des biais de genre de la part des étudiants. Il est aussi fortement corrélé avec les notes de contrôle continu.
           </p>

          </div>
        </div>
      </section style="margin-buttom:12%;">
      <!-- Section: Text -->

      <!-- Section: Social -->
 <img src="login.jpg" alt="" style="width:100px;border-radius:100%;margin-top:0%;">

      </section>
      <br><br><br>
      <!-- Section: Social -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div
         class="text-center p-3"
         style="background-color: black"
         >
         Copyright © 2023 |
      <a class="text-white" style="background-color: black" href=""
         >  SupNum Tous droits réservés .</a
        >
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->

<!-- End of .container -->

<!-- <a target="_blank" href="https://gosnippets.com" class="white-mode">MORE</a> -->
<?php
 $dep="SELECT dep_id ,id from etudiants where matricule=$matricule";
 $result1=mysqli_query($conn, $dep);
 if ($result1->num_rows > 0  ){
 $departement=mysqli_fetch_row($result1);
 $sql1="select id from departement where code ='TC';";
 $r = mysqli_query($conn, $sql1);
 $m=mysqli_fetch_row($r);
 if($m[0]==$departement[0]){
    $m[0]=9;}
 $l=[$departement[0],$m[0]];
 $i=0;
 foreach ($l as $key => $value) {
    
$query = "SELECT * FROM matieres NATURAL JOIN evaluation WHERE id in (SELECT id_mat FROM `inspection` WHERE id_mat in (SELECT id_mat FROM evaluation  WHERE debut<=NOW() and fin >=NOW() and id_etd=(SELECT id from etudiants WHERE matricule= $matricule) and id not in (select id_evalu from reponse)));";
$result = mysqli_query($conn, $query);
 if ($result->num_rows > 0  ){
    $i++;
     while($array = mysqli_fetch_row($result)){
               
                    $date_fin = date( $array[11] );
                    $date_debut = date( $array[10] );
                    $time = date('23:59');
                    $date_today_fin = $date_fin ;

    ?>
                    <script>
                        var count_id_fin = "<?php echo $date_today_fin; ?>";
                        document.getElementById("<?php echo $array[1]; ?>").innerHTML = count_id_fin;
                    </script>
       
<?php
}}}}
?>

<script>

//     function f(x){
   



//   for(var h = 1;h<=3; h++){
//     a = document.getElementById("x" + h);

//       if (x == ''+h) {
//         a.style.color= "#7ebcb9";
//         a.style.borderBottom = "2px solid #7ebcb9";
//         a.style.bottom = "7px";
//       }
//       else{
//         a.style.color= "white";
//         a.style.border = "none";
//       }

//   }

const triggerLine = document.querySelector(".trigger");
const scrollToTopBtn = document.querySelector(".scroll-button");

const callback = ([entry]) => scrollToTopBtn.classList.toggle("scroll-button--visible", !entry.isIntersecting);

const observer = new IntersectionObserver(callback);
observer.observe(triggerLine);

//     if(x == "1"){
//         document.getElementById('g').style.backgroundColor="#fff";
//         document.getElementById('g2').style.backgroundColor="#20639B";
//         document.getElementById('de').style.backgroundColor="#00adb5";

//         a = document.getElementById("x1");


//         if(<?php echo $i1;?> == 0){
//             document.getElementById('icon').style.display ="block";
//         }
//         else{
//             document.getElementById('icon').style.display ="none";
//         }
     

//         for (var i = 1 ; i <= <?php echo $i2;?>;i++){
//         document.getElementById('b' + i).style.display = "none";
//     }
//     for (var i = 1 ; i <= <?php echo $i3;?>;i++){
//         document.getElementById('c' + i).style.display = "none";
//     }  
//     for (var i = 1 ; i <= <?php echo $i1;?>;i++){
//         document.getElementById('a' + i).style.display = "inline";
//     }  
//     }

//  if(x == "2"){

//     document.getElementById('g').style.backgroundColor="#006600";
//     document.getElementById('g2').style.backgroundColor="#006600";
//     document.getElementById('de').style.backgroundColor="green";

//     if(<?php echo $i2;?> == 0){
//             document.getElementById('icon').style.display ="block";
//         }
//         else{
//             document.getElementById('icon').style.display ="none";
//         }


//     for (var i = 1 ; i <= <?php echo $i2;?>;i++){
//         document.getElementById('b' + i).style.display = "inline";
//     }
//     for (var i = 1 ; i <= <?php echo $i3;?>;i++){
//         document.getElementById('c' + i).style.display = "none";
//     }  
//     for (var i = 1 ; i <= <?php echo $i1;?>;i++){
//         document.getElementById('a' + i).style.display = "none";
//     }  
//     }

//  if(x == "3"){

//     document.getElementById('g').style.backgroundColor="#e67e22";
//     document.getElementById('g2').style.backgroundColor="#e67e22";
//     document.getElementById('de').style.backgroundColor="ff8f00";

//     if(<?php echo $i3;?> == 0){
//             document.getElementById('icon').style.display ="block";
//         }
//         else{
//             document.getElementById('icon').style.display ="none";
//         }

//     for (var i = 1 ; i <= <?php echo $i2;?>;i++){
//         document.getElementById('b' + i).style.display = "none";
//     }
//     for (var i = 1 ; i <= <?php echo $i3;?>;i++){
//         document.getElementById('c' + i).style.display = "inline";
//     }  
//     for (var i = 1 ; i <= <?php echo $i1;?>;i++){
//         document.getElementById('a' + i).style.display = "none";
//     }  
//     }
//     }
//     f("1");

  function f1(x){
           
    for(var h = 1;h<=3; h++){
    a = document.getElementById("y" + h);
    b = document.getElementById("z" + h);

      if (x == 'z'+h) {
 
        a.style.display="inline";
        b.style.color= "#7ebcb9";
        b.style.borderBottom = "2px solid #7ebcb9";
        b.style.bottom = "7px";
      }
      else{
        b.style.color= "white";
        b.style.border = "none";
        a.style.display="none";
      }


  }
    }
f1("z1");


if(<?php echo $i1;?> == 0){
            document.getElementById('icon1').style.display ="block";
        }
        else{
            document.getElementById('icon1').style.display ="none";
        }
        if(<?php echo $i2;?> == 0){
            document.getElementById('icon2').style.display ="block";
        }
        else{
            document.getElementById('icon2').style.display ="none";
        }
        if(<?php echo $i3;?> == 0){
            document.getElementById('icon3').style.display ="block";
        }
        else{
            document.getElementById('icon3').style.display ="none";
        }




</script>


