<?php

session_start();

if (!isset($_SESSION['matricule'])) {
     header('location:/p2e/index.php');
}
include("../../connection.php");
include 'include_common/header.php' ;
$academic = "SELECT distinct(semester) FROM etudiants ";
$academic_qry = mysqli_query($conn, $academic);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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

    
</head>
<body>

<?php include "header.php";?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php
          include("../../connection.php");

            $query = "SELECT * FROM `etudiants` WHERE id ='" . $_GET["matricule"] . "';";
            $result = mysqli_query($conn, $query);
            $student = mysqli_fetch_assoc($result);
            $dep="select  `code` from departement where id= (select dep_id from etudiants where id='" . $student["id"] . "'); ";
            $res= mysqli_query($conn, $dep);
            $dep_code=mysqli_fetch_row($res);
        //     $semester="SELECT  `semestere` FROM `academic` WHERE id= (select `academic_id` from etudiants where id='" . $student["id"] . "'); ";
        //    $sol= mysqli_query($conn, $semester);
        //    $semestere=mysqli_fetch_row($sol);
            $deper='SELECT * FROM departement';
            $dep= mysqli_query($conn, $deper);
            ?>
            <form action="update.php" method="POST"
                  class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                <input type="hidden" name="matricule" value="<?php echo $_GET["matricule"]; ?>"
                       class="form-control" required="">
                       <h4 class="mb-3 text-secondary">Modifier un étudiant</h4>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="matricule">Matricule<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['matricule']; ?>" name="matricule"
                               class="form-control" required="">
                    </div>
                    <div class="mb-3 col-md-12">
                       <label for="prenom">Prénom<span class="text-danger">*</span></label>
                       <input type="text" value="<?php echo $student['prenom']; ?>" name="prenom" class="form-control" required="">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="nom">Nom<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['nom']; ?>" name="nom" class="form-control"
                               required="">
                    </div>
                    <div class="mb-3 col-md-12">
                            <select class="form-select" name="semester">
                                <option selected disabled> Semester</option>
                                    <option value="S1"> S1 </option>
                                    <option value="S2"> S2 </option>
                                    <option value="S3"> S3 </option>
                                    <option value="S4"> S4 </option>
                                    <option value="S5"> S5 </option>
                                    <option value="S6"> S6 </option>
                                
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <select class="form-select" id="deppartement" name="departement">
                                <option selected disabled>deppartement</option>
                                <?php while ($row = mysqli_fetch_assoc($dep)) : ?>
                                    <option value="<?= $row['id']; ?>"> <?= $row['code']; ?> </option>
                                    <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                       <label for="prenom">Groupe<span class="text-danger">*</span></label>
                       <input type="text" value="<?php echo $student['group']; ?>" name="group" class="form-control" required="">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" id="btn" class="btn-get-started" name="submit" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>


<script>
    // County State
    
    $('#academic').on('change',function() {
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
    
</script>

