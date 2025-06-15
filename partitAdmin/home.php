<?php
 session_start();
 if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
      header('location:/p2e/index.php');
 }
include "../connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link rel="shortcut icon" href="assets/img/ronk1.jpg" />
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet"> -->
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style22.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor - v2.0.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php include "header.php";?>
<body>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex justify-content-center align-items-center" style="background-image: url('assets/img/bch.jpg');">
    <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
      <h1>Feedback<br>Institut Superieur du Numerique</h1>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
 
<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>L'objectif de L'application</h2><!-- Log on to codeastro.com for more projects! -->
          <p>Objectif</p>
        </div>
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/hero.png" style="height:400px;" class="img-fluid" alt="image">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p>
			<!--------------------------- Objectif ----------------->
      L’objectif du site est d’utiliser un nouveau moyen dans l’évaluation des apprentissages. En permettant aux étudiants concernés de participer dans l’évaluation, en ajoutant les éléments des modules à évaluer, en lançant l’évaluation, en suivant la progression et enfin en récupérant les réponses,
l’évaluation facilite le service d’assurance de la qualité de l'apprentissage. 
Elle procure un sentiment d’engagement et d’interactivité, et permet aux apprenants de s’approprier leurs apprentissages.
Une évaluation efficace montre aux apprenants leur niveau actuel de performance et leur permet de savoir ce qu’ils doivent faire pour atteindre un niveau supérieur.
 </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">
<?php $query="SELECT count(*) FROM `etudiants`;";
      $sql=mysqli_query($conn, $query);
      $a=mysqli_fetch_row($sql);
      
      ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color:blue"><?php echo $a[0];?></span>
            <p>Etudiants</p>
          </div>
          <?php $query="SELECT count(*) FROM `departement`;";
      $sql=mysqli_query($conn, $query);
      $b=mysqli_fetch_row($sql);
      
      ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color:blue"><?php echo $b[0];?></span>
            <p>Departments</p>
          </div>
          <?php $query="SELECT count(*) FROM `matieres`;";
      $sql=mysqli_query($conn, $query);
      $c=mysqli_fetch_row($sql);
      
      ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color:blue"><?php echo $c[0];?></span>
            <p>Matieres</p>
          </div>
          <?php $query="SELECT count(*) FROM `academic`;";
      $sql=mysqli_query($conn, $query);
      $d=mysqli_fetch_row($sql);
      
      ?>
          <div class="col-lg-3 col-6 text-center">
            <span data-toggle="counter-up" style="color:blue"><?php echo $d[0];?></span>
            <p>Semestere</p><!-- Log on to codeastro.com for more projects! -->
          </div>

        </div>

      </div>
    </section>
    <!-- ======= Footer ======= -->
    <footer id="footer">

<div class="container d-md-flex py-4">

  <div class="mr-md-auto text-center text-md-left">
    <div class="copyright">
      &copy; <strong><span>P2E</span></strong> - <?php echo date('Y');?> - Pour L'institut Superieur Du Numerique
    </div>
</footer>
<!-- ============= Fin Footer =================== -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt" style="background-color:blue"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>