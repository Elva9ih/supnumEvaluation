<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
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
    <link rel="stylesheet" href="styles/styles.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>

<style>

@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");

@font-face {
  font-family: AstroSpace;
  src: url(/fonts/AstroSpace.ttf);
}

body {
  margin: 0;
  padding: 0;
  font-family: "Montserrat", sans-serif;
  /* background-color: #212c3b; */
}

header {
  background-color: #010194;
  width: 100%;
  position: fixed; 
  z-index:2;

}

.main-nav {
  height: 90px;
  z-index:1;
}

.logo {
  color: white;
  line-height: 90px;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  margin-left: 30px;
  font-family: "AstroSpace", sans-serif;
}

.navlinks {
  list-style: none;
  float: right;
  line-height: 90px;
  margin: 0;
  padding: 0;
  z-index:2;
}

.navlinks .ali {
  display: inline-block;
  margin: 0px 20px;
}

.navlinks .ali a {
  color: white;
  text-decoration: none;
  font-size: 18px;
  transition: all 0.3s linear 0s;
  /* text-transform: uppercase; */
}

.navlinks .ali a:hover {
  color: #7ebcb9;
  padding-bottom: 7px;
  border-bottom: 2px solid #7ebcb9;
}

.ali a.contact {
  background-color: #00adb5;
  padding: 9px 20px;
  border-radius: 50px;
  transition: all 0.3s ease 0s;
  border-bottom: none;
}

.ali a.contact:hover {
  background-color: #047e85;
  color: white;
  border-bottom: none;
}

#check {
  display: none;
}

.menu-btn {
  font-size: 25px;
  color: white;
  float: right;
  line-height: 90px;
  margin-right: 40px;
  display: none;
  cursor: pointer;
}

@media (max-width: 800px) {
  .navlinks {
    position: fixed;
    width: 100%;
    height: 100vh;
    text-align: center;
    transition: all 0.5s;
    right: -100%;
    background: #222831;
  }

  .navlinks .ali {
    display: block;
  }

  .navlinks .ali a {
    font-size: 20px;
  }

  .navlinks .ali a:hover {
    border-bottom: none;
  }

  .menu-btn {
    display: block;
  }

  #check:checked ~ .navlinks {
    right: 0;
  }


}

@media (max-width: 360px) {
  .logo {
    margin-left: 10px;
    font-size: 25px;
  }

  .menu-btn {
    margin-right: 10px;
    font-size: 25px;
  }

  .menu-btn:focus {
    color: blue;
  }
}
</style>





  </head>
  <body>
    <header>
      <nav class="main-nav">
        <input type="checkbox" id="check" />
        <label for="check" class="menu-btn" style="margin-top:7%">
          <i class="fas fa-bars"></i>
        </label>
        <a href="index.php" class="logo">P2E</a>
        <ul class="navlinks">
   
          <li class="ali" ><a href="../../deconnection.php" class="contact">Se deconnecter</a></li>
        </ul>
      </nav>
    </header>
  </body>