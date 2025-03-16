<?php
require_once('reversi.game.php');
$game = new Reversi();
$board = $game->getBoard();

// Afficher le plateau
echo "<pre>";
for ($y = 0; $y < 8; $y++) {
    for ($x = 0; $x < 8; $x++) {
        echo $board[$x][$y] ?: '.';
    }
    echo "\n";
}
echo "</pre>";

// Afficher les mouvements valides pour le joueur 1 (Noir)
$reversiBoard = new ReversiBoard();
$validMoves = $reversiBoard->getValidMoves(1);
echo "Mouvements valides pour Noir (1) :\n";
foreach ($validMoves as $move) {
    echo "({$move[0]}, {$move[1]})\n";
}
?>