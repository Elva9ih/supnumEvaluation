<?php

include '../../../connection.php';
$semester_row =   $_POST['academic_data'];
// $semester_qry= "SELECT semestere FROM `academic` where id = $academic_id";
// $semester = mysqli_query($conn, $semester_qry);
// $semester_row = mysqli_fetch_assoc($semester);

    $module = "SELECT distinct(module) FROM `matieres` WHERE `semester` ='$semester_row ';";
    $module_qry = mysqli_query($conn, $module);
    $output = '<option value="" selected disabled> module</option>';
    while ($module_row = mysqli_fetch_assoc($module_qry)) {
        $output .= '<option value="' . $module_row['module'] . '">' . $module_row['module'] .'</option>';

    }
    echo $output;


?>