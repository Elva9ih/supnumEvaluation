<?php include("../../connection.php");
session_start();
$alert='';
$id= $_GET['id'];
$query="DELETE FROM `description` WHERE id_evalu =$id;";
$sql=mysqli_query($conn,$query);
$query="DELETE FROM `reponse` WHERE id_evalu =$id;";
$sql=mysqli_query($conn,$query);
$query="DELETE FROM `evaluation` WHERE id =$id;";
$sql=mysqli_query($conn,$query);


if($sql){
    $msg = 1;
    $_SESSION['alert']=$msg;
 } else {
    $msg = 4;
 }
 
 header ("Location: index.php?msg=".$msg."");

?>
