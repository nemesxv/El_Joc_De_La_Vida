<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tabla celular</title>
    <style>
}
        div{
            display: table;
            margin: 0 auto;
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
    <?php if($ancho<4 || $ancho>500 || $ancho==null || $largo<4 || $largo>500 || $largo==null){ 
        echo '<div style="color:red">Tamaño introducido es incorrecto, por favor pulse el boton "atras" y introduzca el tamaño entre 4 y 500 en X e Y</div>';
     }else{ 
    echo '<h3 class="ti" style="color:white"><center>Marque las cel·lulas vivas</center></h3>';
    echo '<form method="get" action="juego.php">';
    echo '<input type="submit" value="Generar">';
    echo "<input type='hidden' name='ancho' value='$ancho'>";
    echo json_encode( $tabla );
    echo "<input type='hidden' name='largo' value='$largo'>";
    echo '<table class="center">';
        for($i = 0;$i<$ancho;$i++){
        echo '<tr>';
            for($x = 0;$x<$largo;$x++){
            echo '<td>';
            echo "<input type='checkbox' name='tabla[$x][$i]'>";
            echo '</td>';
            }
        echo'</tr>';
        } 
   echo '</table>';
    echo '</form>';
 } ?>
</body>
</html>
