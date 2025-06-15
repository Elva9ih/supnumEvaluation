


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

html{
  scroll-behavior: smooth;

}

body {
  margin: 0;
  padding: 0;
  font-family: "Montserrat", sans-serif;

  /* background-color: #212c3b; */
}

header {
  background-color: #fff !important;
  width: 100%;
  position: fixed; 
  z-index:2;
  -webkit-box-shadow: -3px 5px 19px 2px rgba(0,0,0,0.29); 
box-shadow: -3px 5px 19px 2px rgba(0,0,0,0.29);

}

.main-nav {
  height: 90px;
  z-index:1;
}

.logo {
  color: #00f;
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
  margin: 0px 15px;
}

.navlinks .ali a {
  color: #333 !important;
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
  background-color: #4b64ff !important;
  padding: 9px 10px;
  border-radius: 50px;
  transition: all 0.3s ease 0s;
  border-bottom: none;
  color:#fff !important
}

.ali a.contact:hover {
  background-color: #00adb5;
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

@media (max-width: 1300px) {

  #button {
  display: inline;
  background-color: #00f;
  width:100%;
  /* height: 20px; */
  text-align: center;
  border-radius: 4px;
  position: fixed;
  /* bottom: 30px; */
  right: 30px;
  transition: background-color .3s, 
    opacity .5s, visibility .5s;
  opacity: 0.9;
  visibility: hidden;
  z-index: 1000;
}
  .navlinks {
    position: fixed;
    width: 100%;
    height: 100vh;
    text-align: center;
    transition: all 0.5s;
    right: -100%;
    background: #fff;
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
    color:blue
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

.mat{
  margin-left:4px;
  display:inline;
  
}
.fas{
  margin-top:30px;
}
.div1 {
  position: absolute;
  top: 70%;
  background-color: rgba(0, 0, 0, 0.8) ;
  left:0;
  right:0;
  width: 20%;
  height: 50vh;
  /* margin:10px;
  padding:10px; */
  margin-left: 75%;
  font-size: large;
  border-radius: 10%;
  color: #fff;
  
 }
.img1{
  border-radius: 60%;
}
/* .div2 {  */
  /* position: absolute; */
  /* top: 15%; */
  /* background-color: rgba(0, 0, 0, 1) ;
  left:0;
  right:0;
  width: 100%; */
  /* height: 50vh;
  
  margin-left: 75%;
  font-size: large;*/
  /* margin:10px; */
  /* padding:10px; */
  /* border-radius: 10%;  */
  /* color: #fff;
  
}
.div3 { */
  /* position: absolute; */
  /* top: 20%;
  background-color: rgba(0, 0, 0, 0.8) ;
  left:0;
  right:0;
  width: 100%;
  height: 40vh;
  padding:10px;
  font-size: large;
  color: #fff;
  
} */


.profile-card-1{
    width: 300px;
    height: 390px;
    background: white;
    margin: 0 auto;
    border-radius: 10px;
    text-align: center;
    box-shadow: 4px 4px 10px #999;
    position: relative;
    box-sizing: border-box;
    overflow: hidden;
}
.profile-card-1 .img img{
    width: 160px;
    height: 160px;
    padding: 3px;
    border-radius: 50%;
    border: 3px solid #000;
    position: absolute;
    left: calc(50% - 84px);
    top: 26px;
}
.profile-card-1 .img {
    height: 130px;
    width: 100%;
    background-image: linear-gradient(#000, #000), url("bac.jpg");
    padding: 20px;
    box-sizing: border-box;
    position: relative;
}

.profile-card-1 .mid-section{
    position: absolute;
    height: 200px;
    width: 100%;
    top: 200px;
    left: 0;
    padding: 10px 20px 0;
    box-sizing: border-box;
    background: white;
}
.profile-card-1 .mid-section .name{
    color: #333333;
    font-size: 1.4em;
    padding-top: 4px;
    background: rgba(255,255,255,0.1);
    font-weight: bold;
}
.profile-card-1 .mid-section .description{
    color: gray;
    text-decoration: none;

    font-size: 0.9em;
}

.profile-card-1 .mid-section .description a{
    color: inherit;
    text-decoration: none;
    font-weight: bold;
}
#e{
  color: red;
  font-size: 1.2em;
}
.profile-card-1 .mid-section .line{
    background: #7ee2a8;
    width: 80%;
    height: 2px;
    margin: 5px auto -3px;
}
.profile-card-1 .mid-section .stats{
    display: flex;
    position: absolute;
    left: 10%;
    padding-top: 10px;
    width: 80%;
    justify-content: space-around;
}
.profile-card-1 .mid-section .stats .stat{
    font-size: 1.3em;
    color: #333333;
    padding: 5px;
    font-weight: bold;
}
.profile-card-1 .mid-section .stats .stat .subtext{
    color: gray;
    font-size: 0.6em;
    font-weight: normal;
}
.profile-card-1 .links .fb{
    position: absolute;
    left: 0;
    width: 25%;
    height: 100%;
    background-color: #000;
}
.profile-card-1 .links .fb:hover{
    background-color: #000;
}
.profile-card-1 .links{
    width: 100%;
    height: 50px;
    background: #000;
    border-top: 1px solid #44d581;
    margin-top: 35px;
    border-radius: 5px;
    color: white;
    font-size: 1.2em;
    line-height: 1.5em;
    position: absolute;
    bottom: 0;
}
.profile-card-1 .links a{
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.profile-card-1 .links .twitter{
    position: absolute;
    left: 25%;
    width: 25%;
    height: 100%;
    background-color: #55acee;
}

.profile-card-1 .links .twitter:hover{
    background-color: #50dcff;
}
.profile-card-1 .links .follow {
    position: absolute;
    left: 50%;
    width: 50%;
    height: 100%;
    background-color: #2ecc71;
}
.profile-card-1 .links .follow:hover{
    background-color: #03cc57;
}
/* image after effect */
.profile-card-1 .img::after{
    content: "";
    position: absolute;
    width: 180px;
    height: 180px;
    border-radius: 50%;
    left:calc(50% - 91.5px);
    top: 20px;
    border: 3px solid rgba(255,255,255,0.4);
}
/* image before effect */
.profile-card-1 .img::before{
    content: "";
    position: absolute;
    width: 190px;
    height: 190px;
    border-radius: 50%;
    left: calc(50% - 95px);
    top: 15.5px;
    border: 2px solid rgba(255,255,255,0.2);
}
.profile-card-1 .view-more{
    position: absolute;
    top: calc(50% - 0.5em);
    left: calc(50% - 0.5em);
    z-index: 2;
    font-size: 2em;
    color: #2ecc71;
}
.profile-card-1 .view-more .fa-plus-circle{
    position: absolute;
    background: white;
    border-radius: 50%;
    width: 1.004em;
}
.archive{
    width: 100%;
    /* height: 100%; */
    background-color: #000;
    color: #fff;
}
</style>





  </head>
  <body>
    <header id="g2">
      <nav class="main-nav">
        <input type="checkbox" id="check" />
        <label for="check" class="menu-btn" style="margin-top:0%">
          <i onclick="f2();" class="fas fa-bars"></i>
        </label>
        <a href="" class="logo">P2E</a>


        <?php

        

     
      


// if (strlen($n_m) > 23) {
//   $n = "";
//   for ($i=0; $i < 20; $i++) { 
//     $n = $n.$n_m[$i];
//   }
//   $n = $n.'<b>....</b>';
// }
// else{
//   $n = $n_m;
// }



?>

<!-- <h1 class="responsive-font-example">I am responsive</h1> -->
        <ul class="navlinks" id="nl">
          <li class="ali" ><a id = "" > <label for="check" class="back" onclick="f('../home.php')">Home</label></a></li>
          <li class="ali" ><a id = ""> <label for="check" onclick="f('../etudiant/etudiant.php')">Etudiants</label></a></li>
          <li class="ali" ><a id = ""> <label for="check" onclick="f('../matiere/matiere.php')">Matiéres</label></a></li>

  
          <select style="border:none;outline:none;width:100px;" name="" id="ev"onchange="loc();">
          <option selected disabled><a href=""><label>Evalution </label></a></option>
          <option value="../evaluation/index.php"><a href=""><label>Evalutions </label></a></option>
          <option value="../tableeval/index.php"><a href=""><label>Evalution Details </label></a></option>
          <option value="../matiere/score_mat.php"><a href=""><label>Scores matieres </label></a></option>
          <option value="../matiere/annees.php"><a href=""><label>Scores annees </label></a></option>

        </select>
    

            
  
          <li class="ali" ><a id = "" > <label for="check" class="back" onclick="f('../axe/axe.php')">Axes</label></a></li>
          <li class="ali" ><a id = "" style="color: #7ebcb9;padding-bottom: 7px;border-bottom: 2px solid #7ebcb9;"> <label for="check" onclick="f('')">Questions</label></a></li>


          <!-- <li class="ali" ><a id = "" > <label for="check" onclick="f('../archive/archive.php')">Archive</label></a></li> -->
          <li class="ali" ><a id = "" > <label for="check" onclick="f('../inspection/')">Inspection</label></a></li>

          <li class="ali" ><a id = ""> <label for="check" onclick="f('../utilisateur/users.php')">utilisateurs</label></a></li>
          <!-- <li class="ali" ><a href="/p2e/deconnection.php" id="de" class="contact">Se deconnecter</a></li> -->
        
          <li class="ali" ><a href="#" id="de"  onclick="myf1()"><img class="img1"  src="https://tinypic.host/images/2022/12/19/img_avatar.png" width="45" height="45"></a></li>
          <li class="ali" ><a href="#" id="de1"   onclick="myf2()" style="display:none" ><img class="img1"  src="https://tinypic.host/images/2022/12/19/img_avatar.png"  width="45" height="45"></a></li>
      </ul>
    </nav>
      <div class="div1" id="back" style="display :none">
      <link href='//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css' rel='stylesheet'/>
      <div class="profile-card-1">
              <!--image-->
              <div class="img">
                  <img src="https://tinypic.host/images/2022/12/19/img_avatar.png"/>
              </div>
              
              <!--text-->
              <div class="mid-section">
                  <div class="name"><?= $_SESSION['matricule']?></div>  
                  <div class="description">
      <a href="#"><?= $_SESSION['email']?></a></div>

            <div class="line"></div>
            <div class="stats">
            <div class="description">
                    <a id = "e" href="../archive/archive.php">Archive</a>
              </div>
              
            </div>
              </div>
              <!--social icons-->
              <div class="links">
                    <a href="/p2e/deconnection.php" id="de" >Se deconnecter</a>
                        
              </div>                  
            </div>
            </div>
    </header>

    <script>
              function f(x){
                location.href = x;
              }
              function loc(){
                x=document.getElementById("ev").value;
                location.href = x;
              }
              

    </script>

    
  </body>


  <!-- <br><br>
<br><br> -->


  <!-- <li class="active"><a href="home.php">Home</a></li>
         
         <li><a href="etudiant/etudiant.php">Etudiants</a></li>
         <li><a href="matiere/matiere.php">Matiéres</a></li>
         <li class="drop-down"><a href="">Evalutions<i class='bx bxs-down-arrow'></i></a> 
           <ul>
           <li><a href="evaluation/index.php">Evalutions</a></li>
           <li><a href="tableeval/index.php">Evalution Details</a></li>
           <li><a href="matiere/score_mat.php">Scores matieres</a></li> -->

       <!-- Log on to codeastro.com for more projects! -->
            
           <!-- </ul>
         </li>
         <li><a href="axe/axe.php">Axes</a></li>
         <li><a href="question/index.php">Questions</a></li>
         <li><a href="utilisateur/users.php">Gestions Des utilisateurs</a></li>
         <li><a href="/p2e/deconnection.php">Quitter</a></li>     -->
         <script>
    function myf1(){
        document.getElementById("back").style.display = "block";
        document.getElementById("de").style.display = "none";
        document.getElementById("de1").style.display = "block";
    }
    function myf2(){
        document.getElementById("back").style.display = "none";
        document.getElementById("de").style.display = "block";
        document.getElementById("de1").style.display = "none";
    }
    </script>