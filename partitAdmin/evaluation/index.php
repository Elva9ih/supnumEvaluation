<?php

 session_start();
 if  (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
      header('location:/p2e/index.php');
 }

include("../../connection.php");
if(isset($_POST["ok"])){
    if( $_POST['matiere']=="" || $_POST['deppartement']=="" || $_POST["debut"]=="" || $_POST["fin"]=="" ){?>
<script>
alert("Pardon Saisir tous les champs");
</script>
<?php  }
    else{
        
         $matiere=$_POST['matiere'];
         $deppartement=$_POST['deppartement'];
         $debut=$_POST["debut"];
         $fin=$_POST["fin"];
         $f=explode("-",$fin);
         $d=explode("-",$debut);
         $today=date("Y-m-d");
         strval($today);
         if($f[0]>=$d[0]){
              if($f[1]>=$d[1] ){
                   if($f[2]>$d[2]){
                    $sql= "INSERT INTO `evaluation`( `dep_id`, `id_mat`, `debut`, `fin`) VALUES ($deppartement,$matiere,'$debut','$fin')";
                     $sqli= mysqli_query($conn, $sql);
                     header ("Location:../tableeval/index.php");
                  
                   }
              }
         }  
        
    }
    
}
     
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Evaluation</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js"
        integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css"
        integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />


    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="shortcut icon" href="../assets/img/ronk1.jpg" />
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet"> -->
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style22.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v2.0.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<?php include "header.php";?>

<body>


    <?php
include("../../connection.php");

$academic = "SELECT * FROM academic ";
$academic_qry = mysqli_query($conn, $academic);
$row = mysqli_fetch_assoc($academic_qry);

if($row['courant']==1){
    $s=['S1','S3','S5'];
}else{
    $s=['S2','S4','S6'];
}

include 'include_common/header.php' ?>

    <div class="d-flex justify-content-center align-items-center shadow"
        style="width:80%;margin-left:10%;margin-top:8%;">
        <div class="container my-5">
            <h1 class="text-center my-0">Envoyer une matiere</h1>
            <br><br>
            <form method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <select class="form-select" id="academic" name="academic">
                                <option selected disabled> Semester</option>
                                <?php for($i=0;$i < sizeof($s) ;$i++) : ?>
                                <option value="<?php echo $s[$i]; ?>"> <?php echo $s[$i]; ?> </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="deppartement" name='deppartement'>
                                <option selected disabled>deppartements</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="matiere" name="matiere">
                                <option selected disabled>matiéres</option>
                            </select>
                        </div>
                    </div>
                    <div>




                        <b style="margin-left:15px">Date debut:</b> <input type="date" class='btn' name="debut"
                            style="border:blue solid 1px;margin-left:5px">
                        <b style="margin-left:59px">Date fin:</b> <input type="date" class='btn' name="fin"
                            style="border:blue solid 1px;margin-left:5px">
                    </div>
                    <br> <input type="submit" name="ok" style="background-color:green;color:#fff;">

            </form>

        </div>
    </div>
    </div>
</body>

</html>
<script>
// County State

$('#academic').on('change', function() {
    var academic_id = this.value;
    // console.log(country_id);
    $.ajax({
        url: 'ajax/deppartement.php',
        type: "POST",
        data: {
            academic_data: academic_id
        },
        success: function(result) {
            $('#deppartement').html(result);
            // console.log(result);
            // alert(result);
        }
    })
});
// deppartement matiere
$('#deppartement').on('change', function() {
    var deppartement_id = this.value;
    var academic_id = academic.value;
    // console.log(academic_id);
    $.ajax({
        url: 'ajax/matiere.php',
        type: "POST",
        data: {
            deppartement_data: deppartement_id,
            academic_data: academic_id
        },
        success: function(data) {
            $('#matiere').html(data);
            // console.log(data);
        }
    })
});
</script>

<script>
$(document).ready(function() {
    $('select').selectize({
        sortField: 'academic'
    });
});
</script>