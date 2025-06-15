<?php
$file_src = "dbconfig.txt";
$file_dsts = array("partitEtudiant\dbconfig.txt", "partitAdmin\dbconfig.txt", "partitAdmin\Etudiant\dbconfig.txt","partitAdmin\\evaluation\dbconfig.txt","partitAdmin\matiere\dbconfig.txt","partitAdmin\question\dbconfig.txt","partitAdmin\\tableeval\dbconfig.txt","partitAdmin\\tese_export\dbconfig.txt","partitAdmin\utilisateur\dbconfig.txt","partitAdmin\axe\dbconfig.txt","partitAdmin\\evaluation\ajax\dbconfig.txt","partitAdmin\matiere\ajax\dbconfig.txt","partitAdmin\Etudiant\ajax\dbconfig.txt");
$data = file_get_contents($file_src);
foreach ($file_dsts as $file_dst) {
$file = fopen($file_dst, "w");
fwrite($file, $data);
fclose($file);
}

?>