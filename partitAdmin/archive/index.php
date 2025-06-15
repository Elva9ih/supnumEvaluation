<?php 
include("../../connection.php");?>
<?php session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
     header('location:/p2e/index.php');
}?>
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
    margin-left: 80%;
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
    height: 10%;
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

.date {
    color: rgba(255, 0, 0, 0.5);
    display: inline;
}

.pricingTable.blue:hover .price-value,
.pricingTable.green:hover .price-value,
.pricingTable.red:hover .price-value {
    color: #fff
}

.a {
    background-color: rgba(200, 64, 26, 0.7);
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
        height: 10%;
        color: #ff9626;
        margin-bottom: 20px;
        /* text-transform: uppercase */
    }

    .pricingTable .pricingTable-signup a {
        display: inline-block;
        font-size: 7.5px;
    }
}

.icon {
    margin-left: auto;
    margin-right: auto;
    width: 20%;
    margin-top: 8%;
    margin-bottom: 8%;

}

.row {
    margin-top: 0px;
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


.hr1 {
    border: 0;
    border-top: 3px double #00f;
    background-color: #00f;
}

.hr2 {
    border: 0;
    border-top: 3px double #0f0;
    background-color: #0f0;
}

.hr3 {
    border: 0;
    border-top: 3px double orange;
    background-color: orange;
}

hr.hr-14 {
    border: 0;
    height: 1px;
    background-image: -webkit-linear-gradient(left, #f0f0f0, #8c8c8c, #f0f0f0);
    background-image: -moz-linear-gradient(left, #f0f0f0, #8c8c8c, #f0f0f0);
    background-image: -ms-linear-gradient(left, #f0f0f0, #8c8c8c, #f0f0f0);
    background-image: -o-linear-gradient(left, #f0f0f0, #8c8c8c, #f0f0f0);
}
</style>

<?php include "header.php"?>

<script type='text/javascript' src=''></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
<script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'>
</script>
<script type='text/javascript'></script>
<link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.6.3/font-awesome.min.css">
<script type='text/javascript' src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<span class="trigger"></span>
<a href="#" class="scroll-button">⬆</a>
<div class="demo" style="margin-top:70px;">
    <div class="container">


        <section class="row" id="w" style="-webkit-box-shadow: -1px 0px 26px 3px rgba(19,15,255,0.26); 
box-shadow: -1px 0px 26px 3px rgba(19,15,255,0.26);padding-top:1.5%;padding-bottom:1.5%">
            <b style="text-align:center;color:blue;margin-bottom:1.5%;font-size:20px">Les Matières de Semester
                <?php
                if (isset($_POST['annee'])) {
                    $_SESSION['annee'] = $_POST['annee'];
                    $_SESSION['semester'] = $_POST['semester'];
                }
                $a=$_SESSION['annee'];
                $s=$_SESSION['semester'];
               
                 echo "S".$s; echo " et d'annee "; echo  $a; ?> </b>
            <hr class="hr1">
            <!-- <img src="np.png" id="icon1" class="icon" alt="" /> -->
            <?php
             $query = "SELECT * FROM matieres WHERE  codematieres LIKE '___$s%' and id in (SELECT id_mat from `inspection` WHERE annee='$a');";
            //  echo $query;
        $result = mysqli_query($conn, $query);
             if ($result->num_rows > 0  ): 
                 while($array = mysqli_fetch_row($result)):
                         
                          
                
                        ?>

            <div class="col-md-3 col-sm-6" id="a<?php echo $i1 ;?>" style="margin-top:1%;margin-bottom:2%;">
                <div class="pricingTable blue">
                    <div class="pricingTable-header">
                        <!-- <i class="fa fa-diamond"></i> -->
                        <div class="price-value"> <?php echo $array[1]; ?> <span class="month"></span> </div>
                    </div>
                    <h3 class="heading"><?php echo $array[2]; ?></h3>
                    <!-- <div class="pricing-content">
                    </div> -->
                    <div class="pricingTable-signup">
                    </div></b><br><br>
                    <?php $ann = [$a,$array[1]] ;?>
                    <a href="statistique/ouvert.php?codematieres=<?php echo $array[1]; ?>">statistique</a>
                </div>

         
    </div>

    <?php endwhile;?>


    <?php else: 
    ?>
    
    <img src="../../partitEtudiant/np.png" id="icon1" class="icon" alt="" />
    
    <?php
    
    endif; ?>

    <?php  mysqli_free_result($result); 
            
          ?>


    </section>
    <br>
    <hr class="hr-14">
    <br>


    <script>
    var count_id_fin = "<?php echo $date_today_fin; ?>";
    document.getElementById("<?php echo $array[1]; ?>").innerHTML = count_id_fin;
    </script>

    <?php

?>

    <script>
    const triggerLine = document.querySelector(".trigger");
    const scrollToTopBtn = document.querySelector(".scroll-button");

    const callback = ([entry]) => scrollToTopBtn.classList.toggle("scroll-button--visible", !entry.isIntersecting);

    const observer = new IntersectionObserver(callback);
    observer.observe(triggerLine);



    function f1(x) {

        for (var h = 1; h <= 3; h++) {
            a = document.getElementById("y" + h);
            b = document.getElementById("z" + h);

            if (x == 'z' + h) {

                a.style.display = "inline";
                b.style.color = "#7ebcb9";
                b.style.borderBottom = "2px solid #7ebcb9";
                b.style.bottom = "7px";
            } else {
                b.style.color = "white";
                b.style.border = "none";
                a.style.display = "none";
            }


        }
    }
    f1("z1");


    if (<?php echo $i1;?> == 0) {
        document.getElementById('icon1').style.display = "block";
    } else {
        document.getElementById('icon1').style.display = "none";
    }
    if (<?php echo $i2;?> == 0) {
        document.getElementById('icon2').style.display = "block";
    } else {
        document.getElementById('icon2').style.display = "none";
    }
    if (<?php echo $i3;?> == 0) {
        document.getElementById('icon3').style.display = "block";
    } else {
        document.getElementById('icon3').style.display = "none";
    }
    </script>