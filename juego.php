<html>
<head>
    <title>Conway's game of life</title>
    <style type="text/css">
        h1 {
            margin-top : 50px;
            font-family : Cardo;
        }
        #world{
            width : 800px;
            height : 400px;
            margin : 0 auto;
            margin-top :100px;
            padding : 0px;
        }

        input[type="checkbox"] {
            margin : 0px;
            margin-top : 5px;
            margin-left : 5px;
        }


    </style>
</head>

<body>
    <center>
        <h1>Conway's game of life</h1>
    </center>
    <div id="world">
    </div>
    <script type = "text/javascript">
        'use strict';
        // World is represented by a div and cells in the world are represented by checkboxes 

        // As defined by the browser default styles at zoom level of 100%
        var WIDTH_CELL = 17;
        var HEIGHT_CELL  = 17;

        // Div that holds the world of the cells
        var world = document.querySelector("#world");
        var HEIGHT_WORLD = world.getBoundingClientRect().height;
        var WIDTH_WORLD = world.getBoundingClientRect().width;


        var NUM_ROWS = Math.floor(HEIGHT_WORLD / HEIGHT_CELL);
        var NUM_COLS = Math.floor(WIDTH_WORLD / WIDTH_CELL);
        var NUM_CELLS = NUM_ROWS * NUM_COLS;

        // Holds every cell element that exists in the DOM 
        var cells = []; 
        // Fill the world with cells 
        for (var i = 0 ; i < NUM_CELLS ; i++) {
            var newCell = getNewCell();
            addNewCellToWorld(world, newCell);
            cells.push(newCell);
        }

        /*
         The rules are as follows
         1 . Any live cell with fewer than two or more than three live neighbors dies
         2 . Any live cell with two or three live neighbors lives on to the next generation
         3 . Any dead cell with three live neighbors becomes alive
        */

        function incrementGeneration() {
            var cellsThatLive = [];
            var cellsThatDie = [];
            for(var currentCell = 0 ; currentCell < cells.length ; currentCell++){
                var numLiveNeighbors = getLiveNeighborsCount(currentCell);
                if(isAlive(currentCell)) {
                    if(numLiveNeighbors < 2 || numLiveNeighbors > 3)
                        cellsThatDie.push(currentCell);
                    else if(numLiveNeighbors === 2 || numLiveNeighbors === 3)
                        cellsThatLive.push(currentCell);
                }else{
                    if(numLiveNeighbors === 3)
                        cellsThatLive.push(currentCell);
                }
            }

            for(var i  = 0 ;i < cellsThatLive.length ; i++)
                cells[cellsThatLive[i]].checked = true;
            for(var j  = 0 ;j < cellsThatDie.length ; j++)
                cells[cellsThatDie[j]].checked = false;

        }

        setInterval(function(){
            incrementGeneration();
        }, 150);


        // Vector that holds the position of the cell in form of x and y coordinates in the world
        function Vector(x, y) {
            this.x = x;
            this.y = y;
        }

        Vector.prototype.add = function(otherVector) {
            return (new Vector(this.x + otherVector.x, this.y + otherVector.y));
        }
        Vector.prototype.subtract = function(otherVector) {
            return (new Vector(this.x - otherVector.x, this.y - otherVectory.y));
        }

        var neighborDirections = {
            "n" : new Vector(0, 1),
            "e" : new Vector(1, 0),
            "s" : new Vector(0, -1),
            "w" : new Vector(-1, 0),
            "ne" : new Vector(1, 1),
            "nw" : new Vector(-1, 1),
            "se" : new Vector(1, -1),
            "sw" : new Vector(-1, -1)
        };

        /*
        * Function : getLiveNeighborsCount(one dimensional index of the cell whose neighbors are to be found)
        * ------------------------------------------------------------------------------------------
        * Returns the neighboring (directly touching even the diagonal ones) cells of the cell whose
        * neighbors are asked for. 
        * Returns the number of live neighbors the current cell under consideration has
        */
        function getLiveNeighborsCount(cellIndex) {
            var neighbors = [];
            var currentCellVector = getVectorFromIndex(cellIndex);
            for(var direction in neighborDirections) {
                addNeighborIfValid(neighbors, currentCellVector.add(neighborDirections[direction]));
            }
            return neighbors.length;
        }


        /*
        * Function : addNeighborIfValid(list of neighbors(array), the vector containing position of the passed neighbor)
        * --------------------------------------------------------------------------------------------------------------
        * Checks if the passed in neighbor is a valid neighbor. A valid neighbor is one which is inside the bounds of 
        * the world and not outside of it and the one that is alive is only considered a neighbor.
        * If the neighbor is a valid one then adds it to the list of neighbors and does nothing otherwise
        */
        function addNeighborIfValid(neighborsList, neighborVector) {
            if(isInBounds(neighborVector) && isAlive(getIndexFromVector(neighborVector)))
                neighborsList.push(getIndexFromVector(neighborVector));
        }

        function isAlive(cellIndex) {
            return (cells[cellIndex].checked);
        }

        /*
        * Function : isInBounds(vector on which the check is to be applied)
        * -----------------------------------------------------------------
        * 
        */
        function isInBounds(vector) {
            return ((vector.x >= 0 && vector.x <= NUM_COLS - 1) && (vector.y >= 0 && vector.y <= NUM_ROWS - 1));
        }

        /*
        * Function : getVectorFromIndex(index of the element in the array i.e flatIndex)
        * --------------------------------------------------------------------------------
        * Converts a simple flat index into coordinates in two dimensions and returns a 
        * vector object of with those parameters.
        */
        function getVectorFromIndex(flatIndex) {
            var xCoord = flatIndex % NUM_COLS;
            var yCoord = (flatIndex - xCoord) / NUM_COLS;
            return (new Vector(xCoord, yCoord));
        }

        /*
        * Function : getIndexFromVector(vector which is to be converted to a one dimensional index)
        * -----------------------------------------------------------------------------------------
        */
        function getIndexFromVector(vector) {
            return (NUM_COLS * vector.y + vector.x);
        }

        /*
        * Function : addNewCellToWorld(div element that acts like world, checkbox element that acts as a cell)
        * -----------------------------------------------------------------------------------------------------
        */
        function addNewCellToWorld(world, cell) {
            world.appendChild(cell);
        }

        /*
        * Function : getNewCell()
        * Usage    : world.appendChild(newCell());
        * --------------------------------------------
        * Creates and returns a checkbox element that 
        * is considered as a cell in the program.
        * Returns on random, checked or unchecked cell
        * checked means alive and unchecked means dead
        */
        function getNewCell() {
            var newCell = document.createElement("input");
            newCell.type = "checkbox";
            newCell.checked = (Math.random() > 0.5)
            return newCell;
        }
    </script>
</body>
</html>
