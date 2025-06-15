<?php
if(count($_POST)>0){
   session_start();
   include("../../connection.php");
$departement= $_POST['departement'];
// $id_acd=$_POST['semester'];
// $s="SELECT `semestere` FROM `academic` WHERE  `id`= $id_acd and `courant`=1 ;";
// $id_ac=mysqli_query($conn, $s);
$semester=$_POST['semester'];
// $dep="SELECT `id` FROM `departement` WHERE code='$departement' and id_academic=$id_acd[0] ;";
// $id_d=mysqli_query($conn, $dep);
// $id_dep=mysqli_fetch_row($id_d);

$query= "UPDATE `matieres` set codematieres='". $_POST['codematieres'] .
 "',module='" . $_POST['module'] . "', nommatieres='" . $_POST['nommatieres'] .
  "' ,`id_dep`=$departement,`semester`='$semester' WHERE codematieres='" . $_POST['codematieres'] . "'"; 
  // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
    $_SESSION['alert1']=$msg;
 } else {
    $msg = 4;
 }
}
header ("Location: matiere.php?msg=".$msg."");
?>