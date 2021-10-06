<!doctype html>
<?php
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
$tabla = $_GET["tabla"];
setcookie($ancho, $largo, $tabla, time() + (86400 * 30));
?>
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

<body style="background-color:#202020;">
    <a href="eljuegodelavida.php">
  <button>Atras</button>
</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php  
   echo '<script src="Juego.js"></script>
  <button>Play</button>
</a>'; 
        echo '<div class="center">';?>
    <?php
if(!isset($_COOKIE[$cookie_name])) {
  echo "Cookie named '" . $cookie_name . "' is not set!";
} else {
  echo "Cookie '" . $cookie_name . "' is set!<br>";
  echo "Value is: " . $_COOKIE[$cookie_name];
}
?>
</body>
</html>
