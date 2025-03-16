@echo off
set SOURCE=%CD%
set DEST="C:\xampp\htdocs\reversi"

:: Supprimer l'ancien dossier
rmdir /S /Q %DEST%

:: Recréer le dossier
mkdir %DEST%

echo Copie des fichiers .php, .js et .css...
robocopy "%SOURCE%" "%DEST%" *.php *.js *.css /E /XD .git .vscode /NJH /NJS /NFL /NDL

echo Déploiement terminé !