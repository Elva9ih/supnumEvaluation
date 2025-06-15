<?php
   //session_start();
   include_once ("controller.php");
   include_once ("cree.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

  

<link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <link rel="shortcut icon" href="../assets/img/ronk1.jpg" />
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

  <link href="../assets/css/style22.css" rel="stylesheet">

</head>
<body >
 


        <div class="signin-signup">
        <div id="line">
        <form action="index.php" method="POST" autocomplete="off" class="sign-in-form">
        <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?>
            <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    
            <input type="email" name="email" placeholder="Email"><br>
            </div>
            <div class="input-field">
                    <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password"><br>
            </div>
            <input type="submit" name="login" value="Login" class="btn">
            <a href="forgot.php" id="forgot">Mot de passe oublier?</a>
            <p style="margin-top: 10px;">Cree un compte <a href="registration.php" id="sign-up-btn2">Sign Up</a></p>
        
        </form> 
</body>
</html>
