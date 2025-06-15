<?php
include("../../../connection.php");

$deppartement_id =  $_POST['deppartement_data'];
$academic_semestere =   $_POST['academic_data'];
$matiere= "SELECT * FROM matieres WHERE id_dep = $deppartement_id AND semester ='$academic_semestere'  and id NOT IN (SELECT id_mat FROM evaluation where statut=1)";
$matiere_qry = mysqli_query($conn, $matiere);


$output = '<option value="" selected disabled>matieres</option>';
while ($matiere_row = mysqli_fetch_assoc($matiere_qry)) {
    $output .= '<option value="' . $matiere_row['id'] . '">' . $matiere_row['codematieres'] . '==>'. $matiere_row['nommatieres'] . '</option>';
}
echo $output;
