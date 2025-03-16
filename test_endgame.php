<?php
require_once('reversi.game.php');

$board = new ReversiBoard();

// Afficher l'état initial
echo "<h3>État initial</h3>";
echo "Noir (1) a des mouvements valides : " . ($board->hasValidMoves(1) ? "Oui" : "Non") . "<br>";
echo "Blanc (2) a des mouvements valides : " . ($board->hasValidMoves(2) ? "Oui" : "Non") . "<br>";
echo "Partie terminée : " . ($board->isGameOver() ? "Oui" : "Non") . "<br>";

$scores = $board->getScores();
echo "Score Noir (1) : " . $scores[1] . "<br>";
echo "Score Blanc (2) : " . $scores[2] . "<br>";
?>