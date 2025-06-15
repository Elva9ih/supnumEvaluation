<?php
include("../../connection.php");
include 'include_common/header.php' ;
// $academic = "SELECT * FROM academic ";
// $academic_qry = mysqli_query($conn, $academic);
    $deper='SELECT * FROM departement';
    $dep= mysqli_query($conn, $deper);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  
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
</head>
<body>

<?php include "header.php";?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="">
                <form action="insert.php" method="post" class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                
                <center><h4 class="mb-4 text-secondary">Ajouter un étudiant</h4></center>
                   
                        <div class="mb-3 col-md-12">
                           
                            <input type="text" name="matricule" class="form-control" placeholder="matricule" required="">
                        </div>
                        <div class="mb-3 col-md-12">
                           
                            <input type="text" name="prenom" class="form-control" placeholder="prenom" required="">
                        </div>
                        <div class="mb-3 col-md-12">
                            <input type="text" name="nom" class="form-control" placeholder="nom" required="">
                        </div>
                       
                        <div class="mb-3 col-md-12">
                            <select class="form-select"  name="semester">
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
                            <input type="text" name="group" class="form-control" placeholder="groupe" required="">
                        </div>
                        <div class=" mb-3 col-md-12  ">
                           <center> <input type="submit" id="btn" class="btn-get-started" name="submit" value="Enregistrer"></center>
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
            }
        })
    });
   
</script>