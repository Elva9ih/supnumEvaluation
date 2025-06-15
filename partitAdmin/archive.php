<?php
include("../connection.php");
if (isset($_POST['ok']) ){
    $semester=$_POST['semester'];
    $yeur=$_POST['annee'];
$sql="SELECT * FROM `inspection` WHERE id_mat in (SELECT id FROM matieres where codematieres LIKE '___$semester%')and annee='$yeur';";
$query=mysqli_query($conn,$sql);
$r=mysqli_fetch_row($query);
}
$yeurs="SELECT DISTINCT(annee) FROM `inspection`;";
$q=mysqli_query($conn,$yeurs);

?>
<form method="post">
    <select name="annee">
        <?php 
        while ($ry=mysqli_fetch_row($q)){
        ?>
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
    <input type="submit" name="ok" value="archive">
    </<form>