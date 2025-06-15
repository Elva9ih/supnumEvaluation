<?php
include "../../../connection.php";
$_matiere = $_GET['codematieres'];
$xr1 = "group";
if(isset($_POST["group"])){
    $xr1 = $_POST["group"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>questions ouverts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>

<body>
    
    <?php include "s.php"; ?>
    <br>
    <center>
        <div class="card-header d-flex justify-content-between" style="width:90%;text-align:center;margin-left:0%">
            <h4 class="card-header-title">Questions Ouverts</h4>

            <form action="" method="post" style="display:inline;width:74%">
        <select class="form-select" onchange="this.form.submit()" aria-label="Default select example" name="group"
            id="s" style="display: inline;">
            <?php
if(isset($_POST["group"])){
    if($_POST["group"] != "group"){
        echo '<option value="'.$_POST["group"].'">'.$_POST["group"].'</option>';
    }
}
echo '<option value="group">group</option>';
 $s_g = "SELECT DISTINCT(`group`) FROM `description` where id_evalu in(select id from evaluation where id_mat in(select id from matieres where codematieres='$_matiere') and id_mat in (select id_mat from inspection where annee = '".$_SESSION["annee"]."'))";
 echo  $s_g;
 $q_g = mysqli_query($conn,$s_g);
 while($r_g = mysqli_fetch_assoc($q_g)){
   if($r_g["group"] != $xr1)
         echo "<option value='".$r_g["group"]."'>".$r_g["group"]."</option>";
 }
?>
        </select>

    </form>

            <button id="btnExport" onclick="tableToExcel()" class="button button5">Export</button>
        </div>
    </center>
  
    <br>
    <form method="POST" style="width:90%;text-align:center;margin-left:5%">
        <table class="table table-bordered" id="myTable" >
            <thead>
                <tr>
                    <th>points forts du cours</th>
                    <th>points faibles du cours</th>
                    <th>connaissances</th>
                </tr>
            </thead>
            <tbody>


                <?php
$_id_eval=mysqli_query($conn,"SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');");

$id_eval=mysqli_fetch_row($_id_eval);

            $query = "SELECT * FROM `description` where id_evalu=$id_eval[0] ";
            if(isset($_POST["group"])){
    if($_POST["group"] != "group"){
        $query = "SELECT * FROM `description` where id_evalu=$id_eval[0] and `group` = '".$_POST["group"]."'";

    }}
            $result = mysqli_query($conn, $query);
            if ($result->num_rows > 0  ){ 
            while($array = mysqli_fetch_row($result)){
                  
?>
                <tr>
                    <td data-title="CODE"><?php echo $array[2]; ?></td>
                    <td data-title="debut"><?php echo $array[3]; ?></td>
                    <td data-title="fin"><?php echo $array[4]; ?></td>
                </tr>
                <?php  
            }}
?>

            </tbody>
        </table>
    </form>
</body>

</html>

<script type="text/javascript" src="js/table2excel.js"></script>
<script type="text/javascript" src="js/script.js"></script>