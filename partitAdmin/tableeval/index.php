<?php 
session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
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
?>
<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
    <!-- <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport"> -->

  <title>Statistique</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->


  <meta content="" name="descriptison">
  <meta content="" name="keywords">

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  
<link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>  
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.1/bootstrap3-editable/js/bootstrap-editable.js"></script>
    
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


  <!-- <h1>
Evaluation en Detail
</h1> -->
<?php
include("header.php");
?>





<div class="table-responsive" style="width:90%;margin-left:5%;">


<div class="header">
<select name="" id="itemperpage" >
    <option value="05" selected>05</option>
    <option value="10" >10</option>
    <option value="15" >15</option>
    <option value="20">20</option>
    <option value="25">25</option>
</select>

<select name="" aria-label="Default select example" style="display: inline;font-size:17px;" class="form-select" id="" onchange="location.href=this.value">
<option value="index.php" >matieres a evaluées</option>
<option value="matier_deja_evaluee.php">matieres deja evaluees</option>
<option value="matiere_date_expire.php">matieres a date expirée</option>

</select>

<div class="search" >
            <input class="search-txt"  class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()" placeholder="type to search..">
            <a class="search-btn" href="#"></a>
        </div>	 

</div>
      
<?php echo $alert1; ?>
        <table class="table table-bordered" id="data_table">
            <thead class="round py-5 my-5">
        <tr style="background-color:rgb(27, 24, 24);">
          <th style="color: white; width: 13%; background-color:rgb(0, 0, 224);">Code</th>
          <th style="color: white; width: 13%; background-color:rgb(0, 0, 224);">Nom</th>
          <th style="color: white; width: 14%; background-color:rgb(0, 0, 224);">Dete debut</th>
          <th style="color: white; width: 14%; background-color:rgb(0, 0, 224);">Date Fin</th>
          <th style="color: white; width: 14%; background-color:rgb(0, 0, 224);">filiere</th>
          <th style="color: white; width: 10%; background-color:rgb(0, 0, 224);text-align:center">Annuler</th>  
        </tr>
     
            </thead>
    <!-- <tfoot>
      <tr>
        <th colspan='6'>
         Matières envoyées mais pas encore evaluées
        </th>
      </tr>
    </tfoot> -->
    <tbody>
      <form method="post">
    <?php
  
 
  $query = "SELECT * FROM matieres WHERE id in (SELECT id_mat from `evaluation` WHERE id NOT in (SELECT id_evalu from reponse) order by id asc);";
  $result = mysqli_query($conn, $query);

   if ($result->num_rows > 0 ): 
       while($array = mysqli_fetch_row($result) ):
        $q="SELECT * FROM `departement` WHERE id in (SELECT dep_id FROM evaluation WHERE id_mat=$array[0]) ;";
        $r = mysqli_query($conn, $q);
        $ar=mysqli_fetch_row($r);
        $date="SELECT * FROM  evaluation where id_mat=$array[0];";
        $l = mysqli_query($conn, $date);
        $arr = mysqli_fetch_row($l)
     ?>
          <tr>
                <td ><?php echo $array[1]; ?></td>
                <td ><?php echo $array[2]; ?></td>
                <td ><?php echo $arr[4]; ?></td>
                <td ><?php echo $arr[5]; ?></td>
                <td ><?php echo $ar[1]; ?></td>
        <td class='select' style="text-align:center">
        
       
        <a href="delete.php?id=<?php echo $arr[0]; ?> " 
         id="btn1" class="btn btn-danger" >Annuler</a>
        </td>
        <?php

            
endwhile;


?>

<?php else: ?>
<tr>
    <td colspan="6" rowspan="1" headers="" style="text-align:center;">
        <h2>Aucune donnée disponible</h2>
    </td>
</tr>
<?php endif; ?>

<?php mysqli_free_result($result); 
?>
</tbody>
  
<!-- </main> -->
</table>
<div class="bottom-field">
                <ul class="pagination">
                  <li class="prev"><a href="#" id="prev">&#139;</a></li> 
                    <!-- page number here -->
                   <li class="next"><a href="#" id="next">&#155;</a></li>
                </ul>
            </div>
</main>
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
        td2= tr[i].getElementsByTagName("td")[2];
        td3= tr[i].getElementsByTagName("td")[3];
        td4= tr[i].getElementsByTagName("td")[4];
        if (td || td1 || td2 || td3 || td4 ) {
          txtValue = td.textContent || td.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          txtValue2 = td2.textContent || td2.innerText;
          txtValue3 = td3.textContent || td3.innerText;
          txtValue4 = td4.textContent || td4.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1 || txtValue3.toUpperCase().indexOf(filter) > -1||txtValue4.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
    
<script type="text/javascript" src="js/main.js"></script>

  </body>
  </html>