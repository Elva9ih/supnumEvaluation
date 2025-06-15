<?php
// syntax
// mysqli_connect("server" , "username" , "password" , "database");


$file = fopen("dbconfig.txt", "r");
$l=array();
$k=array();
$m=array();
if ($file) {
    while (!feof($file)) {
        array_push($l,explode(":",fgets($file)));
    }
    fclose($file);
} else {
    echo "Impossible d'ouvrir le fichier example.txt";
}
foreach ($l as $key => $value) {
    
    array_push($k,$value[1]);
}

foreach ($k as $key => $value) {
    array_push($m,explode(',',"$value"));
}
$server= str_replace("'",'"', $m[0][0]);
$username=$m[1][0];
$database=$m[3][0];
$pass=$m[2][0];
// if($m[2][0]=""){
//     $pass=""; 
$conn =mysqli_connect("$server" ,"$username","$pass", "$database")or die("Connection Failed");
// $conn =mysqli_connect("localhost" ,"root","", "evaluation")
// }
// else{
// $conn = mysqli_connect("$server" ,"$username","$pass", "$database") or die("Connection Failed");
// }


?>
