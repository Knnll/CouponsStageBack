:: '::' permet de mettre des commentaires
:: '@echo off' sert � ce que les commandes ne s'affichent pas dans la console,
:: (c'est juste pour que ce soit plus joli)
@echo off

:: Avertissement
echo Ce script va mettre a jour le code et la base de donnees en utilisant les fixtures,
echo si vous ne le voulez pas, quitter le script en appuyant sur 'Ctrl + C'.

:: Attend une saisie utilisateur�ice pour continuer
pause

echo.
echo =====================================================================================
echo Suppression de la Base de Donnees... (symfony console doctrine:database:drop --force)
echo =====================================================================================
symfony console doctrine:database:drop --force

echo.
echo ============================================================================
echo Creation de la Base de Donnees... (symfony console doctrine:database:create)
echo ============================================================================
symfony console doctrine:database:create

echo.
echo ===============================================================================================
echo Creation des tables dans la Base de Donnees... (symfony console doctrine:schema:update --force)
echo ===============================================================================================
symfony console doctrine:schema:update --force

:: '--no-interaction' permet de ne pas demander de confirmation
echo.
echo ==================================================================================================================
echo Application des fixtures pour remplir la Base de Donnees (symfony console doctrine:fixtures:load --no-interaction)
echo ==================================================================================================================
symfony console doctrine:fixtures:load --no-interaction

echo.
echo Normalement tout est OK, A+ !