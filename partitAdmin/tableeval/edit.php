<?php include("../../connection.php");
session_start();
  $id= $_GET['id'];
  $fin=$_POST['fin'];
  $query="update evaluation set fin='$fin' WHERE id =$id;";
  $sql=mysqli_query($conn,$query);
  if($sql){
    $msg = 2;
    $_SESSION['alert1']=$msg;
 } else {
    $msg = 4;
 }
 header ("Location: index.php?msg=".$msg."");



?>