<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Tabla celular</title>
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
$tabla =$_GET["tabla"];
setcookie($ancho, $largo, $tabla);
?>
<body style="background-color:#202020;">
    <a href="eljuegodelavida.php">
  <button>Atras</button>
</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php  
   echo '<script src="Juego.js"></script>
  <button>Play</button>
</a>'; 
    if(!isset($_COOKIES[$cookie_name])) {
            print("Cookie created | ");
        }?>
</body>
</html>
