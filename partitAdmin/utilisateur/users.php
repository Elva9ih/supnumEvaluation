<?php include("../../connection.php"); ?>
<?php
session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin']))  {
     header('location:/p2e/index.php');
}
if (isset($_POST["sub"])){
  $email=$_POST["login"];
  $sql=" DELETE  FROM users WHERE `login` ='$email';";
  mysqli_query($conn, $sql);
  $sql1=" DELETE  FROM utilisateurs WHERE `email` ='$email';";
  mysqli_query($conn, $sql1);
  $alert= '<div class="alert alert-danger" id="success-alert">
        <span aria-hidden="true">&times;</span>
        <strong>suppression avec succès</strong>
             </div>';
            }

?>
<?php
$alert = "";
if (isset($_POST['Save'])){
 if(empty($_POST['Email']) || empty($_POST['Droit']) ){
	$alert = '<div class="alert alert-success" id="success-alert">
	<span aria-hidden="true">&times;</span>
	<strong>Il faut selectionner tous les chemps! </strong>"
  </div>';
 }
 else{
 $Email=$_POST['Email'];
 $Droit=$_POST['Droit'];
 mysqli_query($conn,"INSERT INTO `utilisateurs`(`email`, `droit`) VALUES ('$Email','$Droit')");
 $alert = '<div class="alert alert-success" id="success-alert">
 <span aria-hidden="true">&times;</span>
 <strong>Ajouter avec succes! </strong>"
</div>';
}
}?>

 
<head>
<meta charset="UTF-8">

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
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>gestion d'utilisateurs</title>
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
</head>
<?php include "header.php";?>
<br><br>
<!---------------------------------------- import users ---------------------------------->
<br>
<!-- <hr style="color:black; hight:999px;"> -->
      <div class="mb-5 mb-lg-n20 z-index-2">
         <div class="container pb-20">
              
         <form  style ="display:flex;justify-content:space=between;margin-left:11%;" action="" method="post" enctype="multipart/form-data" >
			<input type="file" name="excel" required value="">
			<button class="btn-get-started" type="submit" name="import" style="background-color:black; color:white;border-radius :5%; width:109px;">Importer</button>
          </form>
                </div>
                <!-- <hr style="color:black; hight:999px;"> -->
 <br>
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
              $Email  = $row[0];
              $droit   = $row[1];
              $sql="INSERT INTO `utilisateurs`(`email`, `droit`) VALUES ('$Email','$droit');";
              $query=mysqli_query($conn,$sql);
            }
      
            echo
            "
            <script>
            alert('importer avec succes');
            document.location.href = users.php'';
            </script>
            ";
          }
          ?>
		
<!---------------------------------------- Fin import users ---------------------------------->
<div class="col-lg-12 text-right justify-content-center d-flex">
	
</div>
<center>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">
			<form action="" id="manage_user" method="POST">
				<input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
				<div class="row">
				        <?php echo $alert ;?>
						<div class="form-group">
							<label for="" class="control-label">Email</label>
							<input type="text" name="Email" class="form-control  form-control-sm" required placeholder="Email" >
						</div>
						<div class="form-group">
							<label for="" class="control-label">Droit</label>
							<select name="Droit" class="form-select">
								<option selected disabled>Droit</option>
								<option name="a" value="admin">Admin</option>
								<option name="a" value="user">User</option>
							</select>
						</div>
					
					
				</div>
				
				<!-- <hr> -->
				<div class="col-lg-12 text-right justify-content-center d-flex">
					<button class="btn btn-primary mr-2" name="Save">Save</button>
					<button class="btn btn-secondary" type="button" onclick="location.href = 'users.php'">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="mb-5 mb-lg-n20 z-index-2">
         <div class="container pb-20">
              
                </div>
                <br><br>
                
<center>
<div class="col-lg-8">
	<div class="card">
		<div class="card-body">
			
				<div class="row">
        <table  class="table">
            <thead>
              <tr>
                <th>Prenom</th>
                <th>Nom</th>
                <th>email</th>
                <th>suprimer</th>
              </tr>
            </thead>
            <?php
        $sql="SELECT * FROM users WHERE `droit` = 'admin'";
        $id_admin=mysqli_query($conn, $sql); 
        while ($admin = mysqli_fetch_row($id_admin)){
          ?>
        
            <tbody>
              <tr>
                <td><?php echo $admin[2];?> </td>
                <td><?php echo $admin[3];?> </td>
                <td ><?php echo $admin[4];?></td>
                <td> 
                <form method="POST">
                <input name="login" type="hidden" value="<?php echo $admin[4];?>">
                <input name="sub" class="btn-danger" type="submit" value="supprimer">
                </form>
              </td>
              </tr>
            </tbody>
            <?php }?>
          </table>
					
				</div>
				
				
			
		</div>
	</div>
</div>