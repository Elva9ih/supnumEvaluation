<?php session_start();
if (!isset($_SESSION['matricule'])) {
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
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Matieres</title>
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
  <script>
    $(document).ready(function() {
  $("#success-alert").hide();

    $("#success-alert").slideDown(300).delay(2000).slideUp(400);
});

$('#success-alert .close').click(function() {
  $(this).parent().hide();
});
  </script>


<style>
@import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");
.pluss{
      display:none;
    }
  @media (max-width: 1300px) {
    .exl,.exl1 {
          display :none;
    }
    .pluss{
      display:inline;
    }
    .pluss1{
      display:none;
    }
  }

  </style>
</head>
<body>

<?php include "header.php";?>
<br>
<br>
<br>
<body style="background:white;">
            
    
	 <div  class="container" style="width:100% ">
        <div class="row" style="width:100%">
            <div class="col-20" style="width:100%">
            <div class="data_table" style="margin-top: -4%;margin-bottom: -3%;margin-left: 1.5%;width:200%">
          
          <!-- <hr style=" hight:999px;"> -->
	
          <!-- <br> -->
          
		<hr style="color:white; hight:7000px;">
          
        
          </div>
		<?php
          
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
				$code  = $row[0];
				$nom   = $row[1];
				$module= $row[2];
        $departement = $row[3];
        $semester = $row[4];
        $dep="SELECT `id` FROM `departement` WHERE code='$departement';";
        $id_d=mysqli_query($conn, $dep);
        $id_dep=mysqli_fetch_row($id_d);
				$sql="INSERT INTO `matieres`(`codematieres`, `nommatieres`, `module`, `semester`, `id_dep`) VALUES ('$code','$nom','$module','$semester', $id_dep[0]);";
				$query=mysqli_query($conn,$sql);
			}
      $alert = '<div class="alert alert-success" id="success-alert">
        <span aria-hidden="true">&times;</span>
        <strong>Importer avec succes! </strong>
       </div>';
			echo $alert ;
		}
		?>

<?php
     if(isset($_POST['ins']))  
     {  
          $code = $_POST['code'];
          $nom =  $_POST['nom'];
          $Module = $_POST['Module'];


          $query = "INSERT INTO `matieres`(`codematieres`, `nommatieres`,`Module`)

          VALUES ('$code','$nom','$Module')";

          mysqli_query($conn, $query);
     }
 ?>
  
 <!-- fin -->
 <div class="container" style="width:100%">
    <div class="card card-centered mb-3 mt-10" style="width:100%">
    <?php echo $alert1; ?>
        <div class="card-header d-flex justify-content-between" style="width:100%">
	<form  style ="djustify-content:space=between;"class="" action="" method="post" enctype="multipart/form-data" >
			<input type="file" name="excel" required value="" class="exl" style="background-color:#4b64ff; color:white;border-radius :5%;">
			<button class="exl1" style="background-color:#4b64ff; color:white;border-radius :5%;" type="submit" name="import">Importer</button>
      <a href="add.php"  class="btn btn-blue pluss" style="background-color:#4b64ff;color:#fff"><i class="fa-solid fa-plus"></i></a>

          </form>
            
    <div class="search-box">
            <input class="search-txt"  class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()" placeholder="type to search..">
            <a class="search-btn" href="#"></a>
            <!-- <i class="fas fa-search"></i> -->
        </div>
            <a href="add.php"  class="btn btn-blue pluss1" style="background-color:#4b64ff;color:#fff"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="table-responsive" style="width:100%">
        <table class="table table-bordered" id="myTable" style="width:100%">
            <thead class="header round py-5 my-5">
            <tr style="background-color:rgb(27, 24, 24);">
                <th style="color: white; width: 13%; background-color:#4b64ff">Code </th>
                <th style="color: white; width: 20%; background-color:#4b64ff;">Nom</th>
                <th style="color: white; width: 20%; background-color:#4b64ff;">Modules</th>
                <th style="color: white; width: 20%; background-color:#4b64ff;">Departements</th>
                <th style="color: white; width: 10%; background-color:#4b64ff;">Semesteres</th>
                <th style="color: white; width: 30%; background-color:#4b64ff;">Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $query = "select * from matieres ";
            $result = mysqli_query($conn, $query);

            ?>

            <?php if ($result->num_rows > 0): 
             $i=0;
               ?>
                <?php while ($array = mysqli_fetch_row($result)):
               $dep="select  `code` from departement where id= (select id_dep from matieres where id=$array[0]); ";
               $res= mysqli_query($conn, $dep);
               $dep_code=mysqli_fetch_row($res);
           
                    ?>
                    <tr>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        <td><?php echo $array[3]; ?></td>
                        <td><?php echo $dep_code[0]; ?></td>
                        <td><?php echo $array[5]; ?></td>
                        <td class="text-center">
                        <a href="edit.php?codematieres=<?php echo $array[0];?>"
                               class="btn btn-secondar" id="btn1" class="edit" style="color:#00f"><i class="fa-solid fa-pen"></i></a>


                                <a href="delete.php?codematieres=<?php echo $array[0]; ?>"
                                   class="btn btn-dange" id="btn" ><i class="fa-solid fa-trash"style="color:#ff0000"></i></a>
                            
                               </td>
                    </tr>
                <?php 
               $i++; 
               endwhile; 
              ?>
   
</div>
    </div>
</div>
</div>
   <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="" class="text-center">
                        <h2>Aucune donnée disponible</h2>
                    </td>
                </tr>
                
            <?php endif;?>

            <?php mysqli_free_result($result); ?>

            </tbody>
            
        </table>
    </div>
</div>

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" >  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<?php
 
?>
                          

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
</body>
</html>
<?php include("../../connection.php");?>

<?php if(isset($_POST['next'])){
    $query="SELECT semestere FROM `academic`;";
    $courant="SELECT semestere FROM `academic` limit 1;";
    $sq=mysqli_query($conn,$courant);
    $pre=mysqli_fetch_row($sq);
    $arr2 = str_split($pre[0]);
    $sql=mysqli_query($conn,$query);
    $anne="SELECT `anne` FROM `academic`;";
    $r=mysqli_query($conn,$anne);
    $annee=mysqli_fetch_row($r);
    $an=explode("-",$annee[0]);
    $an0=$an[0]+1;
    $an1=$an[1]+1;
    $an2="$an0"."-"."$an1";
    while($sem=mysqli_fetch_row($sql)){
    $arr1 = str_split($sem[0]);
 
    if($arr2[1]%2==1){
    if($arr1 [1]%2==1){
        $k=$arr1[1]+1;
    $semeste="S"."$k";
    $a="UPDATE `academic` SET `semestere`='$semeste' WHERE `semestere`='$sem[0]' and courant=1;";
    
   $s=mysqli_query($conn,$a);
    
    }else{
        $k=$arr1[1]-1;
        $semeste="S"."$k";
        $b="UPDATE `academic` SET `semestere`='$semeste' WHERE `semestere`='$sem[0]' and courant=0;";
        $s=mysqli_query($conn,$b);
      
      
    }
    
 
}
else{
    if($arr1 [1]%2==1){
        $k=$arr1[1]+1;
    $semeste="S"."$k";
    $a="UPDATE `academic` SET `semestere`='$semeste' WHERE `semestere`='$sem[0]' and courant=0;";
   $s=mysqli_query($conn,$a);
    
    }else{
        $k=$arr1[1]-1;
        $semeste="S"."$k";
        $b="UPDATE `academic` SET `semestere`='$semeste' WHERE `semestere`='$sem[0]' and courant=1;";
        $s=mysqli_query($conn,$b);
        $b="update `academic` SET  `anne`='$an2';";
        $res=mysqli_query($conn,$b);
         
        
    }
}    

}



}?>