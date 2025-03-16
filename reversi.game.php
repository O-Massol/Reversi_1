<?php
class ReversiBoard {
    private $arrayOfCells = array();
    
    function __construct() {
        // Initialiser un tableau 8x8 vide
        for ($x = 0; $x < 8; $x++) {
            for ($y = 0; $y < 8; $y++) {
                $this->arrayOfCells[$x][$y] = null;
            }
        }
        
        // Placer les 4 pièces initiales
        $this->arrayOfCells[3][3] = 2; // Blanc
        $this->arrayOfCells[4][4] = 2; // Blanc
        $this->arrayOfCells[3][4] = 1; // Noir
        $this->arrayOfCells[4][3] = 1; // Noir
    }
    
    function asArray() {
        return $this->arrayOfCells;
    }

    function isValidMove($x, $y, $player) {
        // Vérifier si la case est vide
        if ($this->arrayOfCells[$x][$y] !== null) {
            return false;
        }
        
        // Directions pour vérifier (8 directions)
        $directions = array(
            array(-1, -1), array(-1, 0), array(-1, 1),
            array(0, -1),               array(0, 1),
            array(1, -1),  array(1, 0),  array(1, 1)
        );
        
        $opponent = $player == 1 ? 2 : 1;
        $validMove = false;
        
        foreach ($directions as $dir) {
            $dx = $dir[0];
            $dy = $dir[1];
            
            $cx = $x + $dx;
            $cy = $y + $dy;
            
            $foundOpponent = false;
            
            while ($cx >= 0 && $cx < 8 && $cy >= 0 && $cy < 8) {
                if ($this->arrayOfCells[$cx][$cy] === null) {
                    break;
                }
                
                if ($this->arrayOfCells[$cx][$cy] == $opponent) {
                    $foundOpponent = true;
                } elseif ($this->arrayOfCells[$cx][$cy] == $player && $foundOpponent) {
                    $validMove = true;
                    break;
                } else {
                    break;
                }
                
                $cx += $dx;
                $cy += $dy;
            }
            
            if ($validMove) {
                break;
            }
        }
        
        return $validMove;
    }
    
    function getValidMoves($player) {
        $moves = array();
        
        for ($x = 0; $x < 8; $x++) {
            for ($y = 0; $y < 8; $y++) {
                if ($this->isValidMove($x, $y, $player)) {
                    $moves[] = array($x, $y);
                }
            }
        }
        
        return $moves;
    }

    function placeDisc($x, $y, $player) {
        if (!$this->isValidMove($x, $y, $player)) {
            return false;
        }
        
        // Placer le disque
        $this->arrayOfCells[$x][$y] = $player;
        
        // Directions pour vérifier
        $directions = array(
            array(-1, -1), array(-1, 0), array(-1, 1),
            array(0, -1),               array(0, 1),
            array(1, -1),  array(1, 0),  array(1, 1)
        );
        
        $opponent = $player == 1 ? 2 : 1;
        $flipped = array();
        
        foreach ($directions as $dir) {
            $dx = $dir[0];
            $dy = $dir[1];
            
            $cx = $x + $dx;
            $cy = $y + $dy;
            
            $toFlip = array();
            
            while ($cx >= 0 && $cx < 8 && $cy >= 0 && $cy < 8) {
                if ($this->arrayOfCells[$cx][$cy] === null) {
                    break;
                }
                
                if ($this->arrayOfCells[$cx][$cy] == $opponent) {
                    $toFlip[] = array($cx, $cy);
                } elseif ($this->arrayOfCells[$cx][$cy] == $player) {
                    // Retourner les disques
                    foreach ($toFlip as $coord) {
                        $this->arrayOfCells[$coord[0]][$coord[1]] = $player;
                        $flipped[] = $coord;
                    }
                    break;
                } else {
                    break;
                }
                
                $cx += $dx;
                $cy += $dy;
            }
        }
        
        return $flipped;
    }

    function hasValidMoves($player) {
        return count($this->getValidMoves($player)) > 0;
    }
    
    function isGameOver() {
        return !$this->hasValidMoves(1) && !$this->hasValidMoves(2);
    }
    
    function getScores() {
        $scores = array(1 => 0, 2 => 0);
        
        for ($x = 0; $x < 8; $x++) {
            for ($y = 0; $y < 8; $y++) {
                if ($this->arrayOfCells[$x][$y] !== null) {
                    $scores[$this->arrayOfCells[$x][$y]]++;
                }
            }
        }
        
        return $scores;
    }
}

class Reversi {
    private $gameBoard;
    
    function __construct() {
        $this->gameBoard = new ReversiBoard();
    }
    
    function getBoard() {
        return $this->gameBoard->asArray();
    }
}
?>