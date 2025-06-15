<?php
function unitialation(){
    $a = "Axe";
    $b = "Question";
    $quest="";
}

function inc(){
    include"header.php";
    include"s.php";
    include "../../connection.php";
}
function conf_session(){
    if (!isset($_SESSION["group"])) {
        $_SESSION["group"]="group";
        $_SESSION["c_group"]="";
        $_SESSION["c1_group"]="";
        
      }
      if (isset($_POST["group"])) {
        if ($_POST["group"] != "group") {
          $_SESSION["group"] = $_POST["group"];
          $_SESSION["c_group"] = "and id_etud in(select id from etudiants where `group` = '".$_POST["group"]."')";
        }
        else {
          $_SESSION["group"]="group";
          $_SESSION["c_group"]="";
        }
      }
}
?>