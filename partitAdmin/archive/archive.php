<?php session_start();?>
<!DOCTYPE html>
<html>

<head>
    <title>Archive</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">  

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
    <!-- <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
</head>
<?php
// session_start();
include("header.php");
?>
<br><br>
<body>
    <br /><br />
    <div class="container"><?php
// session_start();
include("../../connection.php");

if (isset($_POST['ok']) ){
    $semester=$_POST['semester'];
    $yeur=$_POST['annee'];
 
$sql="SELECT * FROM `inspection` WHERE id_mat in (SELECT id FROM matieres where codematieres LIKE '___$semester%')and annee='$yeur';";
echo $sql;
$query=mysqli_query($conn,$sql);
$r=mysqli_fetch_row($query);
}
$yeurs="SELECT DISTINCT(annee) FROM `inspection`;";
$q=mysqli_query($conn,$yeurs);

?><br><br><br>
        <form method="post" action="index.php" id="multiple_select_form">
        <select name="annee" aria-label="Default select example" style="display: inline;font-size:17px;" class="form-select" id="" required>
            <!-- <select name="annee" class="form-select"  style="margin-top:7%;" required> -->
                <?php 
        while ($ry=mysqli_fetch_row($q)){ ?> <option value="<?php echo $ry[0];?>"><?php echo $ry[0];?></option>

                <?php }?>
            </select><br><hr>
            <select name="semester" id="semester" style="margin-top:2%;" class="form-select" required>
                <option value="1">S1</option>
                <option value="2">S2</option>
                <option value="3">S3</option>
                <option value="4">S4</option>
                <option value="5">S5</option>
                <option value="6">S6</option>

            </select><br>
            <input type="hidden" name="hidden_semester" id="hidden_semester" />
            <input type="submit" name="ok" value="ok" style="margin-left:92%;background-color:green;color:white;height:40px;width:100px;border-radius:4px;margin-top:24px">

            </<form>

            <script>
            $(document).ready(function() {
                        $(' .selectpicker').selectpicker();
                        $('#semester').change(function() {
                            $('#hidden_semester').val($('#semester').val());
                        });
                        $('#multiple_select_form').on('ok',
                                function(event) {
                                    event.preventDefault();
                                    if ($('#semester').val() != '') {
                                        var
                                            form_data = $(this).serialize();
                                        $.ajax({
                                            url: " index.php",
                                            method: "POST",
                                            data: form_data,
                                            success: function(
                                                data) { //console.log(data); $('#hidden_semester').val('');
                                                $('.selectpicker').selectpicker('val', '');
                                                alert(data);
                                            }
                                        })
                                    } else {
                                        alert("Please select framework "); return false; } }); }); 
            </script>