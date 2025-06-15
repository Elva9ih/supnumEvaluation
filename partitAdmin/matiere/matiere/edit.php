<?php 

include("../../connection.php");
include 'include_common/header.php' ;
$academic =['S1','S2','S3','S4','S5','S6'];

// $module = "SELECT distinct(module) FROM matieres";
// $module_qry = mysqli_query($conn,$module);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
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

    
</head>
<body>

<?php include "header.php";?>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php
        include("../../connection.php");

            $query = "SELECT * FROM `matieres` WHERE id ='" . $_GET["codematieres"] . "';";
            $result = mysqli_query($conn, $query);
            $student = mysqli_fetch_assoc($result);
            $dep="select  * from departement where id= (select id_dep from matieres where id='" . $student["id"] . "'); ";
            $res= mysqli_query($conn, $dep);
            $dep_code=mysqli_fetch_row($res);
            ?>
            <br>
            <form action="update.php" method="POST"
                  class="mt10 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                <input type="hidden" name="codematieres" value="<?php echo $_GET["codematieres"]; ?>"
                       class="form-control" required="">
                       <center><h4 class="mb-4 text-secondary"> Modifier une Matiére </h4></center>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="codematieres">codematieres<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['codematieres']; ?>" name="codematieres"
                               class="form-control" required="">
                    </div>
                    <div class="mb-3 col-md-12">
                       <label for="nommatieres">nom De Matiere<span class="text-danger">*</span></label>
                       <input type="text" value="<?php echo $student['nommatieres']; ?>" name="nommatieres" class="form-control" required="">
                    </div>
                    
                                   
                         <div class="mb-3 col-md-12">
                            <select class="form-select" id="academic" name="semester">
                                <option selected disabled> Semester</option>
                                <?php for ($i=0; $i< 6;$i++): ?>
                                    <option value="<?php echo $academic[$i] ?>"> <?php echo $academic[$i]; ?> </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="mb-3 col-md-12">
                            <select class="form-select" id="deppartement" name="departement">
                                <option selected disabled>deppartement</option>
                            </select>
                        </div>

                        <div class="mb-3 col-md-12">
                        <input type="text" value="<?php echo $student['module']; ?>" class="form-control col-md-11" placeholder="New module" name="module" id="add" style="display:none;">
                            <select class="form-select col-md-11" name="module" id="module">
                                <option selected disabled>Module</option>
                            </select><img src="new.png" alt="" onclick="myf1()" id="back" style="display:none;margin-left:95%;margin-top:-13.5%;width: 17px;height: 17px;"><img src="edit.jpeg" id="addn" alt="" onclick="myf()" style="margin-left:95%;margin-top:-13.5%;width: 17px;height: 17px;" >
                       </div>

                    <div class="col-md-12">
                        <input type="submit" id="btn" class="btn-get-started" name="submit" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
<script>
    function myf(){
        document.getElementById("module").style.display = "none";
        document.getElementById("back").style.display = "inline";
        document.getElementById("add").style.display = "block";
        document.getElementById("addn").style.display = "none";
    }
    function myf1(){
        document.getElementById("module").style.display = "block";
        document.getElementById("back").style.display = "none";
        document.getElementById("add").style.display = "none";
        document.getElementById("addn").style.display = "inline";
    }
    document.getElementById("mod").value ="<?php echo $student['module']; ?>";
</script>

<script>
    // County State
    
    $('#academic').on('change',function() {
        var academic_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/deppartement.php',
            type: "POST",
            data: {
                academic_data: academic_id
            },
            success: function(result) {
                $('#deppartement').html(result);
                // console.log(result);
                // alert(result);
            }
        })
    });

       // County State  
       $('#academic').on('change',function() {
        var academic_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/module.php',
            type: "POST",
            data: {
                academic_data: academic_id
            },
            success: function(result) {
                $('#module').html(result);
                // console.log(result);
                // alert(result);
            }
        })
    });
    </script>