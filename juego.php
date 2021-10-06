<!doctype html>
<?php
$ancho = $_GET["ancho"];
$largo = $_GET["largo"];
$tabla = $_GET["tabla"];
?>
<html>
    <style>
        #grid{
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
<body style="background-color:#202020;">
    <a href="eljuegodelavida.php">
  <button>Atras</button>
</a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <button id="run">Auto run</button>
    <button id="next">&gt;&gt;</button>
    <?php if($ancho<4 || $ancho>500 || $ancho==null || $largo<4 || $largo>500 || $largo==null){ 
        echo '<div style="color:red">Tamaño introducido es incorrecto, por favor pulse el boton "atras" y introduzca el tamaño entre 4 y 500 en X e Y</div>';
     }else{ ?>
    <h3 class="ti" style="color:white"><center>Marque las cel·lulas vivas</center></h3>
<script src="code/promise.js"></script>

<div id="grid"></div>


<script>
  var width = "<?php echo"$ancho"?>";
  var height = "<?php echo"$largo"?>";

  // I will represent the grid as an array of booleans.

  var gridNode = document.querySelector("#grid");
  // This holds the checkboxes that display the grid in the document.
  var checkboxes = [];
  for (var y = 0; y < height; y++) {
    for (var x = 0; x < width; x++) {
      var box = document.createElement("input");
      box.type = "checkbox";
      gridNode.appendChild(box);
      checkboxes.push(box);
    }
    gridNode.appendChild(document.createElement("br"));
  }

  function gridFromCheckboxes() {
    return checkboxes.map(function(box) { return box.checked; });
  }
  function checkboxesFromGrid(grid) {
    return grid.forEach(function(value, i) { checkboxes[i].checked = value; });
  }
  function randomGrid() {
    var result = [];
    return result;
  }

  checkboxesFromGrid(randomGrid());

  // This does a two-dimensional loop over the square around the given
  // x,y position, counting all fields that have a cell but are not the
  // center field.
  function countNeighbors(grid, x, y) {
    var count = 0;
    for (var y1 = Math.max(0, y - 1); y1 <= Math.min(height, y + 1); y1++) {
      for (var x1 = Math.max(0, x - 1); x1 <= Math.min(width, x + 1); x1++) {
        if ((x1 != x || y1 != y) && grid[x1 + y1 * width])
          count +=1 ;
      }
    }
    return count;
  }

  function nextGeneration(grid) {
    var newGrid = new Array(width * height);
    for (var y = 0; y < height; y++) {
      for (var x = 0; x < width; x++) {
        var neighbors = countNeighbors(grid, x, y);
        var offset = x + y * width;
        if (neighbors < 2 || neighbors > 3)
          newGrid[offset] = false;
        else if (neighbors == 2)
          newGrid[offset] = grid[offset];
        else
          newGrid[offset] = true;
      }
    }
    return newGrid;
  }

  function turn() {
    checkboxesFromGrid(nextGeneration(gridFromCheckboxes()));
  }

  document.querySelector("#next").addEventListener("click", turn);

  var running = null;
  document.querySelector("#run").addEventListener("click", function() {
    if (running) {
      clearInterval(running);
      running = null;
    } else {
      running = setInterval(turn, 400);
    }
  });
</script>
    <?php } ?>
</body>
</html>