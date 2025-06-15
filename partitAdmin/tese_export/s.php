<?php
session_start();
if (!isset($_SESSION['matricule'])) {
    header('location:/p2e/index.php');
}
?>
<!DOCTYPE html>
<html>
<?php include "header.php"?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<!-- Sidebar -->
<div class="w3-sidebar w3-bar-block w3-border-right" style="display:none;" id="mySidebar">
  <button onclick="w3_close()" class="w3-bar-item w3-large">Fermer &times;</button>
  <a  href="radar.php?code=<?php echo  $_GET['code']; ?>" class="w3-bar-item w3-button">Radar</a>
  <a href="graphe.php?code=<?php echo  $_GET['code']; ?>" class="w3-bar-item w3-button">Graphe</a>
  <a href="test_export.php?code=<?php echo  $_GET['code']; ?>" class="w3-bar-item w3-button">Qualite</a>
  <a href="ouvert.php?code=<?php echo  $_GET['code']; ?>" class="w3-bar-item w3-button">Question ouvert</a>
</div>

<!-- Page Content -->
<div class="w3-teal" style="background-color:blue !important;">
  <button  style="background-color:blue !important;" class="w3-button w3-teal w3-xlarge" onclick="w3_open()">☰</button>
  <div class="w3-container">
  
  </div>
</div>

<script>
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
}
</script>

</body>
</html> 
