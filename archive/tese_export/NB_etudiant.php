<?php
session_start();
if (!isset($_SESSION['matricule'])) {
    header('location:/p2e/index.php');
}
?>

<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>information sur les evaluations</title>
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
  <br><br><br><br><br>
<div class="col-lg-15">
		<div class="card-header">
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="card card-outline card-info">
							<div class="card-header"><b> etudiant evaluée tout le question par Non  </b></div>
							<div class="card-body">
								<form action="" id="manage-criteria" method="post">
                                <table class="table table-bordered  table-striped">
                                 <thead>
                                    <th>Matricule</th>
                                    <th>Nom</th>
                                    <th>PreNom</th>
                                 </thead>
                                 <tbody>
                                    <?php
                                    include "../../connection.php";
                                        include "header.php";
                                        $_matiere = $_GET['id'];
                                        $query="SELECT * FROM etudiants WHERE id in (SELECT distinct (id_etud) FROM reponse where id_evalu in (select id from evaluation where id_mat=$_matiere)) ;";
                                        $result = mysqli_query($conn, $query);
                                        if ($result->num_rows > 0  ){ 
                                            while($array = mysqli_fetch_row($result)){
                                                        
                                        ?>
                                                    <tr>
                                                    <td data-title="CODE"><?php echo $array[1]; ?></td>
                                                    <td data-title="debut"><?php echo $array[2]; ?></td>
                                                    <td data-title="fin"><?php echo $array[3]; ?></td>
                                                    </tr>
                                        <?php  
                                                    }}
                                        ?>
                                    </tbody>
                                </table>
							</div>
							<div class="card-footer">
								
							</div>
                                   
                            
                            </form>
						</div>
                   </div>
                  