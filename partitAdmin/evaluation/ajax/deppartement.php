<?php

include("../../../connection.php");

$semester_row['semestere']=$_POST['academic_data'];
if($semester_row['semestere'] != 'S1' && $semester_row['semestere'] != 'S6'){
    $deppartement = "SELECT * FROM `departement`;";
    $deppartement_qry = mysqli_query($conn, $deppartement);
    $output = '<option value="" selected disabled> departement</option>';
    while ($deppartement_row = mysqli_fetch_assoc($deppartement_qry)) {
        $output .= '<option value="' . $deppartement_row['id'] . '">' . $deppartement_row['code'] .'</option>';
    }
    echo $output;
}elseif($semester_row['semestere'] == 'S1'){

    $deppartement = "SELECT * FROM `departement` where `code` = 'TC'";
    $deppartement_qry = mysqli_query($conn, $deppartement);
    $output = '<option value="" selected disabled> departement</option>';
    while ($deppartement_row = mysqli_fetch_assoc($deppartement_qry)) {
        $output .= '<option value="' . $deppartement_row['id'] . '">' . $deppartement_row['code'] .'</option>';
    }
    echo $output;

}
else{
    $deppartement = "SELECT * FROM `departement` where `code` != 'TC'";
    $deppartement_qry = mysqli_query($conn, $deppartement);
    $output = '<option value="" selected disabled> departement</option>';
    while ($deppartement_row = mysqli_fetch_assoc($deppartement_qry)) {
        $output .= '<option value="' . $deppartement_row['id'] . '">' . $deppartement_row['code'] .'</option>';
    }
    echo $output;
}

?>