<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tabla cel·lular</title>
    <style>
    .center {
  margin-left: auto;
  margin-right: auto;
}
    </style>
</head>
<?php
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
echo "X: " . $ancho . " Y: " . $largo;?>
<body style="background-color:#202020;">
    <h3 class="ti" style="color:white"><center>Marque las cel·lulas vivas</center></h3>
    <table class="center">
        <?php
        for($i = 0;$i<$ancho;$i++){?>
        <tr>
            <?php for($x = 0;$x<$largo;$x++){?>
            <td>
            <input type="checkbox">
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
