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
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<?php
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
?>
<body style="background-color:#202020;">
    <button value="atras" onClick="location.href=eljuegodelavida.php" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button value="<<"  />
    <button value="play" />
    <button value=">>0" />
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
