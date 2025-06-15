<?php 
session_start();
if (!isset($_SESSION['matricule'])) {
  header('location:/p2e/index.php');
}
 include("../../connection.php");
// ################ alert insert #########################
$alert1='';
if(isset($_SESSION['alert'])){
  if($_SESSION['alert']==1){
  $alert1 = '<div class="alert alert-success" id="success-alert">
  <span aria-hidden="true">&times;</span>
  <strong>Anulation avec succes! </strong>
  </div>';
}
elseif($_SESSION['alert']==4){
  $alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong>Ne peut pas Anulation cette Matiere! </strong>
            </div>';
}
}
// ######################################################
// ######################### alert ubdate ###############
if(isset($_SESSION['alert1'])){
  if($_SESSION['alert1'] == 2){
  $alert1 = '<div class="alert alert-success" id="success-alert">
  <span aria-hidden="true">&times;</span>
  <strong>Prolongation avec succes! </strong>
  </div>';
}
elseif($_SESSION['alert1']==4){
  $alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong>Ne peut pas Prolonge cette Matiere! </strong>
            </div>';
}
}
$_SESSION['alert1']=0;
$_SESSION['alert']=0;
// #######################################################
function test($data){
  $data=htmlspecialchars($data) ;
  $data=trim($data) ;
  $data=strtolower($data) ;
return $data ;
}
if (isset($_POST['a'])) {
  include("../../connection.php");
  // recuperation de la id matiere
$code=$_POST['a'];
$query="SELECT id , semester,nommatieres FROM `matieres` WHERE codematieres='$code'";
 $result = mysqli_query($conn, $query);
 $id_mat=mysqli_fetch_row( $result);

// recuperation de la id evaluation
$query1="SELECT id FROM `evaluation` WHERE id_mat=$id_mat[0];";
 $result1 = mysqli_query($conn, $query1);
 $id_eval=mysqli_fetch_row( $result1);
// recuperation de la matricules des etudiants 
$query2="SELECT `matricule` FROM `etudiants` WHERE id in(select id_etd FROM inspection WHERE id_mat=$id_mat[0]) and id not in(SELECT id_etud from reponse WHERE id_evalu=$id_eval[0])";
$result2 = mysqli_query($conn, $query2);
$Liste_etudiant=array();
if ($result2->num_rows > 0 ): 
       while($matricule_etuds=mysqli_fetch_row($result2)):
        $Liste_etudiant[]=$matricule_etuds[0];
        // $Liste_etudiant=$matricule_etuds[0].'--'.$Liste_etudiant;
        
       endwhile;
      endif;

  for ($i=0;$i< sizeof($Liste_etudiant);$i++){
      $email = test($Liste_etudiant[$i]."@supnum.mr");
  //    echo $email;
             $subject = "Prolongation des dates limites pour l'évaluation des enseignments".' '.$id_mat[2];
                $message = "Bonjour chers étudiants, nous avons prolongé le délai pour l'évaluation des leçons. Je vous rappelle que cette évaluation est obligatoire dans toutes les matières, en cas de réponses manquantes vous serez sujets à une pénalité. 
                Bien à vous";
                $sender = "From: eeeevaluation@gmail.com";
                 $url =  "https://script.google.com/macros/s/AKfycbw2MsBGjkJ7hzw_cnE5jW-CmqHZbibaNjrEz_DNXZZgCXfptPo5B1yy7x37kFrwSZkeFg/exec";
                    $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   =>$subject,
                  "body"      =>$message
             ])
          ]);            
         
      
      $result = curl_exec($ch);
}     
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link href="css/style.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <!-- <link rel="stylesheet" href="css/style.css"> -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js">
    </script>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css"
        rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css1/style.css">
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

    <div class="table-responsive" style="width:90%;margin-left:5%;">

        <div class="header">
            <select name="" id="itemperpage">
                <option value="05" selected>05</option>
                <option value="10">10</option>
                <option value="15">15</option>
                <option value="20">20</option>
                <option value="25">25</option>
            </select>

            <select name="" aria-label="Default select example" style="display: inline;font-size:17px;"
                class="form-select" id="" onchange="location.href=this.value">
                <option value="index.php">matieres a evaluées</option>
                <option value="matier_deja_evaluee.php">matieres deja evaluees</option>
                <option value="matiere_date_expire.php" selected>matieres a date expirée</option>

            </select>

            <div class="search">
                <input class="search-txt" class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()"
                    placeholder="type to search..">
                <a class="search-btn" href="#"></a>
            </div>

        </div>

        <?php echo $alert1; ?>
        <form action="" method="post">
            <table class="table table-bordered" id="data_table">
                <thead sclass="header round py-5 my-5">
                    <tr style="background-color:rgb(27, 24, 24);">
                        <th style="color: white; width: 4%; background-color:rgb(0, 0, 224);">id</th>
                        <th style="color: white; width: 7%; background-color:rgb(0, 0, 224);">Code</th>
                        <th style="color: white; width: 23%; background-color:rgb(0, 0, 224);">Nom</th>
                        <th style="color: white; width: 12%; background-color:rgb(0, 0, 224);">debut</th>
                        <th style="color: white; width: 12%; background-color:rgb(0, 0, 224);">Fin</th>
                        <th style="color: white; width: 10%; background-color:rgb(0, 0, 224);">filiere</th>
                        <th style="color: white; width: 7%; background-color:rgb(0, 0, 224);">N.etudiant</th>
                        <th style="color: white; width: 7%; background-color:rgb(0, 0, 224);text-align:center">
                            Statistique</th>
                        <th style="color: white; width: 10%; background-color:rgb(0, 0, 224);text-align:center">Anuller
                        </th>

                    </tr>
                </thead>
                <!-- <tfoot>
      <tr>
        <th colspan='8'>
        Matières envoyées et évaluées par un au minimum
        </th>
      </tr>
    </tfoot> -->
                <tbody>
                    <?php
  
  
      
        $query = "SELECT * FROM matieres WHERE id in (SELECT id_mat from `evaluation` WHERE id  in (SELECT id_evalu from reponse) and fin < NOW() order by id asc);";
        $result = mysqli_query($conn, $query);
       if ($result->num_rows > 0 ): 
       while($array = mysqli_fetch_row($result) ):
        $nb="SELECT count(distinct(id)) FROM etudiants WHERE id in (SELECT distinct (id_etud) FROM reponse where id_evalu in (select id from evaluation where id_mat= $array[0])) ;";
        $k = mysqli_query($conn, $nb);
        $a=mysqli_fetch_row( $k);
        $q="SELECT * FROM `departement` WHERE id = (SELECT dep_id FROM evaluation WHERE id_mat=$array[0]) ;";
        $r = mysqli_query($conn, $q);
        $ar=mysqli_fetch_row($r);
        $date="SELECT * FROM  evaluation where id_mat=$array[0];";
        $l = mysqli_query($conn, $date);
        $arr = mysqli_fetch_row($l) ?>
                    <tr id="<?php echo $arr[0]; ?>"></tr>
                    <td hidden ><?php echo $arr[0];?></td>
                    <td data-title="CODE"><?php echo $array[1]; ?></td>
                    <td data-title="nom"><?php echo $array[2]; ?></td>
                    <td data-title="debut"><?php echo $arr[4]; ?></td>
                    <td data-title="fin"><?php echo $arr[5]; ?></td>

                    <td data-title="deprtement"><?php echo $ar[1]; ?></td>

                    <td data-title="nb" style="text-align:center"><a
                            href="../tese_export/NB_etudiant.php?id=<?php echo $array[0]; ?>"
                            id="btn1"><?php echo $a[0]; ?> </a></td>
                    <td data-title="Statisique" style="text-align:center"><a
                            href="../tese_export/ouvert.php?code=<?php echo $array[1]; ?>"
                            class="btn btn-success">Statisique</a></td>
                    <td data-title="annuler" class='select' style="text-align:center">
                        <a href="delete.php?id=<?php echo $arr[0]; ?>" id="btn1" class="btn btn-danger">Annuler</a>
                    </td>
                    <?php
      
endwhile;
  

?>

                    <?php else: ?>

                    <?php endif; ?>

                    <?php mysqli_free_result($result); 
?>
                </tbody>
            </table>
        </form>
        <div class="bottom-field">
            <ul class="pagination">
                <li class="prev"><a href="#" id="prev">&#139;</a></li>
                <!-- page number here -->
                <li class="next"><a href="#" id="next">&#155;</a></li>
            </ul>
        </div>

        <script>
        function myFunction() {
            // Declare variables
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("data_table");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                td1 = tr[i].getElementsByTagName("td")[1];
                td2 = tr[i].getElementsByTagName("td")[2];
                td3 = tr[i].getElementsByTagName("td")[3];
                td4 = tr[i].getElementsByTagName("td")[4];
                if (td || td1 || td2 || td3 || td4) {
                    txtValue = td.textContent || td.innerText;
                    txtValue1 = td1.textContent || td1.innerText;
                    txtValue2 = td2.textContent || td2.innerText;
                    txtValue3 = td3.textContent || td3.innerText;
                    txtValue4 = td4.textContent || td4.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1 ||
                        txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1 ||
                        txtValue4.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
        </script>

        <script type="text/javascript" src="custom_table_edit.js"></script>
        <script type="text/javascript" src="dist/jquery.tabledit.js"></script>
        <!-- <script type="text/javascript" src="js/main.js"></script> -->

</body>

</html>