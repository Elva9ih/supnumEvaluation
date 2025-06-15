<?php
session_start();
if(count($_POST)>0)
{    include("../../connection.php");
     $alert1='';
     $codematieres = $_POST['codematieres'];
     $module = $_POST['module'];
     $nommatieres = $_POST['nommatieres'];
     $departement= $_POST['departement'];
     $semester=$_POST['semester'];
   //   $s="SELECT `semestere` FROM `academic` WHERE  `id`= $id_acd and `courant`=1 ;";
   //   $id_ac=mysqli_query($conn, $s);
   //   $semester=mysqli_fetch_row($id_ac);
   
   $query= "INSERT INTO `matieres`(`codematieres`, `nommatieres`, `module`, `semester`, `id_dep`)
     VALUES ('$codematieres','$nommatieres' ,'$module','$semester',$departement)";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
        $_SESSION['alert']=$msg;
        
     } else {
        $msg = 4;
     }
}
  #Redirect to list students
  
 header ("Location: matiere.php?msg=".$msg."");
?>