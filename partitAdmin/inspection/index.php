<!---------------------------------------- import inspection ---------------------------------->
<?php session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
     header('location:/p2e/index.php');
}?>
<?php
        include "header.php";
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
              $matieres  = $row[0];
              $matricule   = $row[1];
              $annee = $row[2];
              $query1="SELECT id FROM `matieres` WHERE codematieres='$matieres';";
                         $sql1=mysqli_query($conn, $query1);
              $nommatiere = mysqli_fetch_row($sql1);
              $query2="SELECT id FROM `etudiants`WHERE matricule=$matricule ;";
              $sql2=mysqli_query($conn, $query2);
              $etudiant = mysqli_fetch_row($sql2);
              $sql="INSERT INTO `inspection`(`id_mat`, `id_etd`, `annee`) VALUES ($nommatiere[0] ,$etudiant[0],'$annee');";
             
              $query=mysqli_query($conn,$sql);
            }
      
          }
?>

<!---------------------------------------- Fin import etudiants ---------------------------------->
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

    <div class="container" style="margin-top:2%">
        <div class="card card-centered mb-3 mt-25">
            <div class="card-header d-flex justify-content-between">
                <form style="justify-content:space=between; " action="" method="post" enctype="multipart/form-data">
                    <input type="file" class="exl" name="excel" required value="" style="background-color:#4b64ff;">
                    <a href="add.php" style="background-color:#4b64ff;color:#fff;display:none"
                        class="btn btn-dark pluss"><i class="fa-solid fa-plus"></i></a>
                    <button class="exl1" class="btn-get-started" type="submit" name="import"
                        style="background-color:#4b64ff; color:white;border-radius :5%;">Importer</button>
                </form>

                <div class="search-box">
                    <input class="search-txt" class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()"
                        placeholder="type to search..">
                    <a class="search-btn pluss1" href="#"></a>
                    <!-- <i class="fas fa-search"></i> -->
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable">
                <thead>
                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                        <th style="color: white; width: 15%;white;background-color:#4b64ff; ">Nom matiere</th>
                        <th style="color: white; width: 15%;white;background-color:#4b64ff; ">Nom etudiant</th>
                        <th style="color: white; width: 15%;white;background-color:#4b64ff; ">annee</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query="SELECT * FROM `inspection`;";
                        $sql=mysqli_query($conn, $query);
                        if ($sql->num_rows > 0): $i = 0;
                        while ($array = mysqli_fetch_row($sql)): 
                            $query1="SELECT nommatieres FROM `matieres` WHERE id=$array[1];";
                            $sql1=mysqli_query($conn, $query1);
                            $matiere = mysqli_fetch_row($sql1);
                            $query2="SELECT matricule FROM `etudiants`WHERE id=$array[2];";
                            $sql2=mysqli_query($conn, $query2);
                            $etudiant = mysqli_fetch_row($sql2)
                            
                    ?>

                    <tr>
                        <td><?= $matiere[0] ?></td>
                        <td><?= $etudiant[0] ?? 'Unknown' ?></td>
                        <td><?= $array[3] ?></td>
                    </tr>
                </tbody>
                <?php endwhile ?>
                <?php endif ?>

            </table>
        </div>


</body>

</html>
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
        if (td || td1 || td2) {
            txtValue = td.textContent || td.innerText;
            txtValue1 = td1.textContent || td1.innerText;
            txtValue2 = td2.textContent || td2.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 || txtValue2
                .toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>