<?php
session_start();
if(count($_POST)>0){

   include("../../connection.php");
$departement= $_POST['departement'];
$query = "UPDATE `etudiants` set matricule='". $_POST['matricule'] .
 "',nom='" . $_POST['nom'] . "', prenom='" . $_POST['prenom'] .
  "' ,`dep_id`='$departement',`semester`='" . $_POST['semester'] . "',`group`='" . $_POST['group'] . "' WHERE matricule='" . $_POST['matricule'] . "'"; 
  // update form data from the database
  echo $query ;
 if (mysqli_query($conn, $query)) {
    $msg = 2;
    $_SESSION['alert1']=$msg;
 } else {
    $msg = 4;
 }
}
header ("Location: etudiant.php?msg=".$msg."");
?>