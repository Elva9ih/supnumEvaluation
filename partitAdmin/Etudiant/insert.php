<?php
session_start();
if(count($_POST)>0)
{    
   include("../../connection.php");

     $matricule = $_POST['matricule'];
     $nom = $_POST['nom'];
     $prenom = $_POST['prenom'];
     $departement= $_POST['departement'];
     $semester=$_POST['semester'];
     $groupe=$_POST['group'];
   //   $s="SELECT `id` FROM `academic` WHERE  `semestere`='$semester' and `courant`=1 ;";
   //   $id_ac=mysqli_query($conn, $s);
   //   $id_acd=mysqli_fetch_row($id_ac);
   //   $dep="SELECT `id` FROM `departement` WHERE code='$departement' and id_academic=$id_acd[0] ;";
   //   $id_d=mysqli_query($conn, $dep);
   //   $id_dep=mysqli_fetch_row($id_d);
   $query="INSERT INTO `etudiants`(`matricule`, `prenom`, `nom`, `dep_id`,`semester`,`group`)
     VALUES ('$matricule','$prenom' ,'$nom',$departement,'$semester','$groupe')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
        $_SESSION['alert']=$msg;
     } else {
        $msg = 4;
     }
}
  #Redirect to list students
 header ("Location: etudiant.php?msg=".$msg."");
?>