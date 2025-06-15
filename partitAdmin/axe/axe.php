<?php include("../../connection.php");

session_start();
if (!isset($_SESSION['matricule']) || !isset($_SESSION['admin'])) {
    header('location:/p2e/index.php');
}
?> 
<?php
$alert = "";
$alert1 = "";

if (isset($_POST["bt"])) {
      if(empty($_POST["id"])) {

        mysqli_query($conn,"INSERT INTO axe(nomaxe) value ('".$_POST['criteria']."')");
        $alert = '<div class="alert alert-success" id="success-alert">
        <span aria-hidden="true">&times;</span>
        <strong>Ajouter avec succes! </strong>"
      </div>';
      }
      else {
        mysqli_query($conn,"UPDATE axe SET nomaxe = '".$_POST['criteria']."' WHERE id=".$_POST['id']);
        $alert = '<div class="alert alert-success" id="success-alert">
        <span aria-hidden="true">&times;</span>
        <strong>Editer avec succes! </strong>
      </div>';

      }
		
	}
	if (isset($_POST["del"])) {
         $sq = mysqli_query($conn,"SELECT id FROM question WHERE id_axe =".$_POST["del"]) ;
		 if (mysqli_num_rows($sq) > 0) {
			
			$alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong>Ne peut pas suprimer cet axe! </strong>
            </div>';
			 
		}
		else{
			mysqli_query($conn,"DELETE from axe where id=".$_POST['del']);
			$alert1 = '<div class="alert alert-danger" id="success-alert">
			<span aria-hidden="true">&times;</span>
			<strong> supression avec succes! </strong>
            </div>';
			 
		}
		
	}
    
?>


<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Axe</title>
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

  <br><br><br>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		</div>
		<div class="card-body">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-4">
						<div class="card card-outline card-info">
							<div class="card-header"><b> Forme D'axe</b></div>
							<div class="card-body">
								<form action="" id="manage-criteria" method="post">
									<div class="form-group">
										<label for="">Axe</label>
                                        <?php echo $alert ;?>
										<input type="text" name="criteria" class="form-control form-control-sm" id="demo">
                                        <input type="hidden" name="id" id="dem">                                       
                                        
									</div>
							
							</div>
							<div class="card-footer">
								<div class="d-flex justify-content-end w-100">
									<button class="btn btn-sm btn-primary btn-flat bg-gradient-primary mx-1" form="manage-criteria" name="bt" value="bt" id="aj">Ajouter</button>
									<button class="btn btn-sm btn-flat btn-secondary bg-gradient-secondary mx-1" form="manage-criteria" onclick="getElementById('aj').innerHTML = 'Ajouter';" type="reset">Annuler</button>

								</div>
							</div>
                            </form>
						</div>
					</div>
					<div class="col-md-8">
						<div class="callout callout-info">
							<?php 
								$qry = $conn->query("SELECT * FROM axe order by abs(id) asc ");
								if($qry->num_rows > 0):
							?>
							<div class="d-flex justify-content-between w-100">
							
								<label for=""><b>Les Axes</b></label>	
									
							</div>
							<hr>
					
							<ul class="list-group btn col-md-8" id="ui-sortable-list">
							<?php echo $alert1 ;?>
								<?php
								$criteria = array();
								while($row= $qry->fetch_assoc()):
									$criteria[$row['id']] = $row; 
								?>
								<li class="list-group-item text-left ">
									
				
									</span>
									 <?php echo ucwords($row['nomaxe']) ?>
									<input type="hidden" name="criteria_id[]" value="<?php echo $row['id'] ?>">
                                   <img class="float-end" src="points.png" style="width:14px;height:14px" alt="" onclick="myf(<?php  echo $row['id'] ?>)">
                                   <div clss="dropdown-menu show flex"style="display:none;" id="<?php  echo $row['id'] ?>">
                                   <form class="float-end" action="" method="post">
                                   <img class="float-end" src="edit.png" alt="" style="width:19px;height:14px;" onclick="getElementById('aj').innerHTML = 'Etiter';getElementById('dem').value = '<?php echo $row['id']?>';getElementById('demo').value = '<?php echo $row['nomaxe']?>'"><br>
								   <input type="hidden" name="del" value ="<?php echo $row['id'];?>">
                                   <button style="border:none;background-color:white;" class="float-end"><img src="delete.png" alt="" style="width:14px;height:14px;margin-left:30px;" class="float-end"></button>
                                   </form>
								  
                                   </div> 
                                  
                                			</li>
								<?php endwhile; ?>
							
							</ul>
				
							<?php else: ?>
								<center>Pas des Axes</center>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<style>
	.dropright a:hover{
		color:black !important;
	}
</style>
<script>
   function myf(a){
  var x = document.getElementById(a);
  if (x.style.display === "none") {
    x.style.display = "block";

  } else {
    x.style.display = "none";
  }
}
</script>