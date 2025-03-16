<?php
require_once('reversi.game.php');

$board = new ReversiBoard();

// Afficher le plateau initial
echo "<h3>Plateau initial</h3>";
echo "<pre>";
for ($y = 0; $y < 8; $y++) {
    for ($x = 0; $x < 8; $x++) {
        $value = $board->asArray()[$x][$y];
        echo $value !== null ? $value : '.';
    }
    echo "\n";
}
echo "</pre>";

// Placer une pièce noire (joueur 1) à (2,3)
$flipped = $board->placeDisc(2, 3, 1);

// Afficher le plateau après le placement
echo "<h3>Après placement à (2,3)</h3>";
echo "<pre>";
for ($y = 0; $y < 8; $y++) {
    for ($x = 0; $x < 8; $x++) {
        $value = $board->asArray()[$x][$y];
        echo $value !== null ? $value : '.';
    }
    echo "\n";
}
echo "</pre>";

echo "Disques retournés : ";
foreach ($flipped as $coord) {
    echo "({$coord[0]}, {$coord[1]}) ";
}
?>