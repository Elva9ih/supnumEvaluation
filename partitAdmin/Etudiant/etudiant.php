<?php 
session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
     header('location:/p2e/index.php');
}
include("../../connection.php");
$alert='';
// ################ alert insert #########################
$alert1='';
if(isset($_SESSION['alert'])){
  if($_SESSION['alert']==1){
    
  $alert1 = '<div class="alert alert-success" id="success-alert">
  <span aria-hidden="true">&times;</span>
  <strong>Ajouter avec succes! </strong>
  </div>';
}
elseif($_SESSION['alert']==4){
  $alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong>Ne peut pas Ajouter cette Matiere! </strong>
            </div>';
}
}
// ######################################################
// ######################### alert ubdate ###############
if(isset($_SESSION['alert1'])){
  if($_SESSION['alert1'] == 2){
  $alert1 = '<div class="alert alert-success" id="success-alert">
  <span aria-hidden="true">&times;</span>
  <strong>Edit avec succes! </strong>
  </div>';
}
elseif($_SESSION['alert1']==4){
  $alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong>Ne peut pas Edit cette Matiere! </strong>
            </div>';
}
}
$_SESSION['alert1']=0;
$_SESSION['alert']=0;
// #######################################################




 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");

    .pluss {
        display: none;
    }

    @media (max-width: 1300px) {

        .exl,
        .exl1 {
            display: none;
        }

        .pluss {
            display: inline !important;
        }

        .pluss1 {
            display: none !important;
        }
    }
    </style>
    <title>Etudiants</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
    $(document).ready(function() {
        $("#success-alert").hide();

        $("#success-alert").slideDown(300).delay(2000).slideUp(400);
    });

    $('#success-alert .close').click(function() {
        $(this).parent().hide();
    });
    </script>
</head>

<body>

    <?php include "header.php";?>
    <br>
    <!---------------------------------------- import etudiants ---------------------------------->
    <br>
    <!-- <hr style="color:black; hight:999px;"> -->
    <div class="mb-5 mb-lg-n20 z-index-2">
        <div class="container pb-20">


        </div>
        <!-- <hr style="color:black; hight:999px;"> -->

        <?php
           include("../../connection.php");
          if(isset($_POST["import"])){
            $fileName = $_FILES["excel"]["name"];
            $fileExtension = explode('.', $fileName);
            $fileExtension = strtolower(end($fileExtension));
            $newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;
            $targetDirectory = "uploads/" . $newFileName;
            move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);
      
            error_reporting(0);
            ini_set('display_errors', 0);
      
            require 'excelReader/excel_reader2.php';
            require 'excelReader/SpreadsheetReader.php';
      
            $reader = new SpreadsheetReader($targetDirectory);
            foreach($reader as $key => $row){
              $matricule  = $row[0];
              $prenom   = $row[1];
              $nom = $row[2];
              $departement = $row[3];
              $dep="SELECT `id` FROM `departement` WHERE code='$departement';";
              $id_d=mysqli_query($conn, $dep);
              $id_dep=mysqli_fetch_row($id_d);
              $sql="INSERT INTO `etudiants`(`matricule`, `prenom`, `nom`, `dep_id`,`group`) VALUES ( $matricule,'$prenom','$nom',$id_dep[0],'$row[3]');";
              $query=mysqli_query($conn,$sql);
            }
      
            $alert = '<div class="alert alert-success" id="success-alert">
            <span aria-hidden="true">&times;</span>
            <strong>Importer avec succes! </strong>
           </div>';
            echo $alert ;
          }
          ?>

        <!---------------------------------------- Fin import etudiants ---------------------------------->
        <div class="container">
            <div class="card card-centered mb-3 mt-10">
                <?php echo $alert1;?>
                <div class="card-header d-flex justify-content-between">
                    <form style="justify-content:space=between; " action="" method="post" enctype="multipart/form-data">
                        <input type="file" class="exl" name="excel" required value="" style="background-color:#4b64ff;">
                        <a href="add.php" style="background-color:#4b64ff;color:#fff;display:none"
                            class="btn btn-dark pluss"><i class="fa-solid fa-plus"></i></a>
                        <button class="exl1" class="btn-get-started" type="submit" name="import"
                            style="background-color:#4b64ff; color:white;border-radius :5%;">Importer</button>
                    </form>

                    <div class="search-box">
                        <input class="search-txt" class="btn btn-primary" type="text" id="myInput"
                            onkeyup="myFunction()" placeholder="type to search..">
                        <a class="search-btn pluss1" href="#"></a>
                        <!-- <i class="fas fa-search"></i> -->
                    </div>
                    <a href="add.php" style="background-color:#4b64ff;color:#fff" class="btn btn-dark pluss1"><i
                            class="fa-solid fa-plus"></i></a>
                </div>

            </div>
            <div class="table-responsive">
                <table class="table table-bordered" id="myTable">
                    <thead class="header round py-5 my-5">
                        <tr style="background-color:rgb(27, 24, 24);">
                            <th style="color: white; width: 15%;color:white;background-color:#4b64ff; ">Matricules</th>
                            <th style="width: 20%; color: white;background-color:#4b64ff;">Prénoms</th>
                            <th style="width: 20%;color: white;background-color:#4b64ff;">Noms</th>
                            <th style="width: 10%;color: white;background-color:#4b64ff;">Departements</th>
                            <th style="width: 10%;color: white;background-color:#4b64ff;">Groupe</th>
                            <th style="width: 10%;color: white;background-color:#4b64ff;">Semester</th>
                            <th style="width: 15%;color: white;background-color:#4b64ff;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    include("../../connection.php");
            $query = "select * from etudiants ";
            $result = mysqli_query($conn, $query);
         
            ?>

                        <?php if ($result->num_rows > 0): ?>

                        <?php while ($array = mysqli_fetch_row($result)): 
                          $dep="select  `code` from departement where id= (select dep_id from etudiants where id=$array[0]); ";
                         
               $res= mysqli_query($conn, $dep);
               $dep_code=mysqli_fetch_row($res);
                    ?>
                        <tr>

                            <td><?php echo $array[1]; ?></td>
                            <td><?php echo $array[2]; ?></td>
                            <td><?php echo $array[3]; ?></td>
                            <td><?php echo $dep_code[0]; ?></td>
                            <td><?php echo $array[4]; ?></td>
                            <td><?php echo $array[5]; ?></td>

                            <td class="text-center">
                                <a href="edit.php?matricule=<?php echo $array[0]; ?>" class="btn btn-dange"><i
                                        class="fa-solid fa-pen" style="color:#0000ff"></i></a>
                                <a href="delete.php?matricule=<?php echo $array[0]; ?>"
                                class="btn btn-dange" id="btn"><i class="fa-solid fa-trash" style="color:#ff0000"></i></a>




                            </td>
                        </tr>
                        <?php endwhile; ?>

                        <?php else: ?>
                        <tr>
                            <td colspan="4" rowspan="1" headers="" class="text-center">
                                <h2>Aucune donnée disponible</h2>
                            </td>
                        </tr>
                        <?php endif; ?>

                        <?php mysqli_free_result($result); ?>

                    </tbody>
                </table>
            </div>
        </div>
        <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                td4 = tr[i].getElementsByTagName("td")[4];
                td5 = tr[i].getElementsByTagName("td")[5];
                if (td || td1 || td2 || td3 || td4 || td5) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;
                    txtValue5 = td5.textContent || td5.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 ||
                        txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 ||
                         txtValue4.toUpperCase().indexOf(filter) > -1 || txtValue5.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>
</body>

</html>
<?php 