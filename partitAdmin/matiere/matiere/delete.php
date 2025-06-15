<?php

include("../../connection.php");

$query = "DELETE FROM `matieres` WHERE id='". $_GET["codematieres"]."'"; 
// Delete data from the table students using id

 if (mysqli_query($conn, $query)) {
   $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: matiere.php?msg=".$msg."");
?>
