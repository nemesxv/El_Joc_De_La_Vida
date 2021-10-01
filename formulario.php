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
            line-height: 11px;
        }
        input{
            padding: 0;
            margin: 0;
        }
    </style>
</head>
<?php
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
?>
<body style="background-color:#202020;">
    <a href="eljuegodelavida.php">
  <button>Atras</button>
</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <body style="background-color:#202020;">
    <a href="eljuegodelavida.php">
  <button>Play</button>
</a>

    <h3 class="ti" style="color:white"><center>Marque las cel·lulas vivas</center></h3>
    <table class="center">
        <?php
        for($i = 0;$i<$ancho;$i++){?>
        <tr>
            <?php for($x = 0;$x<$largo;$x++){?>
            <td>
            <input type="checkbox" name="tabla[<?=$x;?>][<?=$i;?>]">
            </td>
            <?php } ?>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
