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
    <?php if($ancho<4 || $ancho>500 || $ancho==null || $largo<4 || $largo<500 || $largo==null){ 
        echo '<div>test</div>';
     }else{ 
   echo '<a href="eljuegodelavida.php">
  <button>Play</button>
</a>';

    echo '<h3 class="ti" style="color:white"><center>Marque las cel·lulas vivas</center></h3>';
    echo '<table class="center">';
        for($i = 0;$i<$ancho;$i++){
        echo '<tr>';
            for($x = 0;$x<$largo;$x++){
            echo '<td>
            <input type="checkbox" name="tabla[$x][$i]">
            </td>';
            }
        echo'</tr>';
        } 
   echo '</table>';
 } ?>
</body>
</html>
