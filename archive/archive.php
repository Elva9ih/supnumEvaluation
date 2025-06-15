<?php
session_start();
include("../connection.php");
if (isset($_POST['ok']) ){
    $semester=$_POST['semester'];
    $yeur=$_POST['annee'];
$sql="SELECT * FROM `inspection` WHERE id_mat in (SELECT id FROM matieres where codematieres LIKE '___$semester%')and annee='$yeur';";
echo $sql;
$query=mysqli_query($conn,$sql);
$r=mysqli_fetch_row($query);
}
$yeurs="SELECT DISTINCT(annee) FROM `inspection`;";
$q=mysqli_query($conn,$yeurs);

?>
<form method="post" action="index.php">
    <select name="annee">
        <?php 
        while ($ry=mysqli_fetch_row($q)){ ?>
        <option value="<?php echo $ry[0];?>"><?php echo $ry[0];?></option>

        <?php }?>
    </select>
    <select name="semester">
        <option>Semester</option>
        <option value="1">S1</option>
        <option value="2">S2</option>
        <option value="3">S3</option>
        <option value="4">S4</option>
        <option value="5">S5</option>
        <option value="6">S6</option>

    </select>
    <input type="submit" name='ok' value="archive">
    </<form>
    <div class="d-flex justify-content-center align-items-center shadow"
        style="width:80%;margin-left:10%;margin-top:10%;">
        <div class="container my-5">
            <h1 class="text-center my-0">Envoyer une matiere</h1>
            <br><br>
            <form method="POST">
                <div class="card">
                    <div class="card-body">
                        <div class="input-group mb-3">
                            <select class="form-select" id="academic" name="academic">
                                <option selected disabled> Semester</option>
                                <?php for($i=0;$i < sizeof($s) ;$i++) : ?>
                                <option value="<?php echo $s[$i]; ?>"> <?php echo $s[$i]; ?> </option>
                                <?php endfor; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="deppartement" name='deppartement'>
                                <option selected disabled>deppartements</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select class="form-select" id="matiere" name="matiere">
                                <option selected disabled>matiéres</option>
                            </select>
                        </div>
                    </div>
                    <div>