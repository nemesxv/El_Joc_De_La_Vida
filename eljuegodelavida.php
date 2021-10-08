<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <meta name="viewport" content="width-device-widt,initial-scale=1.0">
    <link rel="stylesheet" href="eljuegodelavida.css">
</head>
<body>
   <div class="contenidorflex">
       <div class="FlexItem descripcion"> Tota cel·la viva amb menys de dos veïns vius mort (de solitud).<br>
Tota cel·la viva amb més de tres veïns vius mort (de sobreconcentració).<br>
Tota cel·la viva amb dos o tres veïns vius, segueix viva per a la següent generació.<br>
Tota cel·la morta amb exactament tres veïns vius torna a la vida.
 <br><br>
       Elija el tamaño del mapa</div>
       <div class="FlexItem FlexContent"> 
           <form action="juego.php">
  <label for="largo">X:</label>
    <input type="number" id="largo" name="largo"  value="<?php echo $_COOKIE[$largo]; ?>"><br><br>
  <label for="ancho">Y:</label>
    <input type="number" id="ancho" name="ancho"  value="<?php echo $_COOKIE[$ancho]; ?>"><br><br>
  <input type="submit" value="Generar">
</form> </div>
       <div class="FlexItem FlexHeader">
           <h1>El juego de la vida</h1>
       </div>
       <div class="FlexItem FlexFooter">Kirill Lupenkov</div>
   </div>
</body>
</html>