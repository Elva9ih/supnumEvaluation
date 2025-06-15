<?php session_start();
if (!isset($_SESSION['matricule'])) {
     header('location:/p2e/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <!-- Favicons -->
  <link href="assets/img/student-grade.png" rel="icon">
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

  <!-- bootstrap cdn link -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- animate css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- aos cdn link -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- custom styles -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="responsive.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style22.css" rel="stylesheet">

  <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title></title>
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<title></title>
	
	<!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>
<body>
<!------------------------------------  sidebar  ---------------------------------------------->
  <?php include "header1.php";?>
<header id="myCarousel" class="carousel slide">
  

        <!------------------------------------------ Images ------------------------------>
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                
                <div class="fill" style="background-image:url('images/1.jpg');"></div>
				<div class="carousel-caption">
                    
                </div>
            </div>
           
            <div class="item">
                <div class="fill" style="background-image:url('images/2.jpg');"></div>
                <div class="carousel-caption">
                   
                </div>
            </div>
			
			 <div class="item">
                <div class="fill" style="background-image:url('images/3.jpg');"></div>
                <div class="carousel-caption">
                   
                </div>
            </div>
			
			
        <!--------------------------- Controles ------------------------------------>
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>	
    <!-- jQuery -->
    <script src="css/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="css/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>L'objectif de L'application</h2><!-- Log on to codeastro.com for more projects! -->
          <p>Objectif</p>
        </div>
        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
            <img src="assets/img/hero.png" style="height:300px;" class="img-fluid" alt="image">
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
            <p style="font-size:15px;">
			<!--------------------------- Objectif ----------------->
      L’objectif du site est d’utiliser un nouveau moyen dans l’évaluation des apprentissages. En permettant aux étudiants concernés de participer dans l’évaluation, en ajoutant les éléments des modules à évaluer, en lançant l’évaluation, en suivant la progression et enfin en récupérant les réponses, l’évaluation facilite le service d’assurance de la qualité de l'apprentissage. Elle procure un sentiment d’engagement et d’interactivité, et permet aux apprenants de s’approprier leurs apprentissages. Une évaluation efficace montre aux apprenants leur niveau actuel de performance et leur permet de savoir ce qu’ils doivent faire pour atteindre un niveau supérieur.
            </p>
          </div>
        </div>

      </div>
    </section><!-- fin About Section -->
    <div id="construction" class="container-lg pt-4 pb-5" data-aos="fade-up" data-aos-duration="700">
        <div class="service-row construction-content pt-4 pb-4">
            <div class="service-row-img">
                <img src="assets/img/R.jpg" alt="image">
            </div>

            <div class="service-row-text construction-text">
                <h2>Notions</h2>
                <h4>Cet article présente une approche de l’évaluation des enseignements par les étudiants (EEE) axée sur le soutien au développement professionnel des enseignants, qui se distingue d’une approche visant le contrôle de la qualité de l’enseignement.</h4>
                
            </div>
        </div>
    </div>
    <!-- service row end -->





    <!-- service row start (interior) -->
    <div id="interior" class="container-lg pt-4 pb-5" data-aos="fade-up" data-aos-duration="700">
        <div class="service-row interior-content pt-4 pb-4">
            <div class="service-row-img">
                <img src="assets/img/R.png" alt="img">
            </div>

            <div class="service-row-text interior-text">
                <h2>Information</h2>
                <h4>En réalité, ce score mesure bien d’autres choses. Alors qu’il n’est pas significativement corrélé avec l’apprentissage (mesuré par le niveau atteint par un étudiant en fin de semestre), il est corrélé avec des biais de genre de la part des étudiants. Il est aussi fortement corrélé avec les notes de contrôle continu.</h4>
            </div>
        </div>
    </div>
    <!-- ======= Coment ca fonctionne ======= -->
    <div class="customer-review">
        <div class="review-title">
            <h1><span>Plus Des</span> Information</h1>
        </div>
        <div class="review-wrap">
            <div class="review-box">
                <p class="review-icon"><span class="icon-quote-left"></span></p>
                <p class="review-description">Les évaluations des enseignements par les étudiants peuvent avoir deux objectifs : améliorer la pédagogie des enseignants et servir de base pour les décisions de recrutement ou de promotion du personnel enseignant dans les établissements d’enseignement supérieur.</p>
              
            </div>

            <div class="review-box">
                <p class="review-icon"><span class="icon-quote-left"></span></p>
                <p class="review-description">Ces évaluations sont souvent composées d’une partie quantitative incluant plusieurs questions fermées, permettant d’aboutir à un score de satisfaction globale. Il peut être alors tentant de confondre ce score avec une mesure de la qualité d’un enseignement.</p>
              
            </div>
        </div>
    </div>
    <section id="counts" class="counts section-bg">
      <div class="container">
      <div class="mb-5 mb-lg-n20 z-index-2">
         <div class="container pb-20">
                <div style="font-size:15px;" class="text-center mb-20">
                    <!--begin::Title-->
                    <h3 class="fs-2hx text-dark mb-5" id="how-it-works" data-kt-scroll-offset="{default: 100, lg: 150}">
                        Comment ça fonctionne</h3>
                    <div class="fs-5 text-muted fw-bold">Vous sélectionnez une matière et sur la base de critères
                        d'évaluation,
                        <br> vous évaluez le travail de votre professeur
                    </div>
                </div>
    </section>
  <!-- ======= Footer ======= -->


  

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; <strong><span>Feedback</span></strong> - <?php echo date('Y');?> - Pour L'institut Superieur Du Numerique
        </div>

  <!-- ============= Fin Footer =================== -->
<!------------------ vers haut --------------------------------->
  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  

  <!--------------------- JavaScript Fichers ----------------->
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
    <!-- jQuery -->
    <script src="css/jquery.js"></script>

    <!-------------------- Bootstrap  JavaScript ---------------->
    <script src="css/bootstrap.min.js"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>

</html>