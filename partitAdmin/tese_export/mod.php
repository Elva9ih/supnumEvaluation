<?php

include "../../connection.php";


$cont_eval = "SELECT id FROM evaluation WHERE id_mat=(SELECT id FROM matieres WHERE codematieres='$_matiere');" ;
$_id_eval=mysqli_query($conn,$cont_eval);
$id_eval=mysqli_fetch_row($_id_eval);
$sql_score = "SELECT score FROM reponse where `id_evalu`=$id_eval[0] ".$_SESSION["c_group"]." ;";
$sql_score1 = "SELECT score FROM reponse WHERE id_question in (SELECT id from question where id_axe=".$_POST["axe"].") ".$_SESSION["c_group"]." and id_evalu=$id_eval[0];";

?>