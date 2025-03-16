<?php
require_once('reversi.game.php');
$game = new Reversi();
$board = $game->getBoard();

echo "<pre>";
for ($y = 0; $y < 8; $y++) {
    for ($x = 0; $x < 8; $x++) {
        echo $board[$x][$y] ?: '.';
    }
    echo "\n";
}
echo "</pre>";
?>