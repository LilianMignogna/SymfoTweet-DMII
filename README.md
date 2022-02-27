# SymfoTweet

## Concept

Symfotweet est un ~~clone du réseau social Twitter~~ un réseau social innovant permettant de poster des SymfoTweets, de SymfoRT les SymfoTweets qui vous appréciez. Il est bien sur possible de moderer les SymfoTweets postés via un compte Admin ~~pas comme sur Twitter :/~~

## Technologie et version
- PHP : 8.1.2
- Symfony : 6.0.4 
- Composer : 2.1.12
- npm : 6.14.13

## Installation

Installer les dépendences composer 

> composer install

Créer les tables dans la base de données

> php bin/console d:s:u --force

Inserer des données de test

> php bin/console d:f:l

Installer les dépendences npm

> npm install

Compiler les merveilleux fichiers de style pour obtenir une interface moderne et intuitive

> npm run build

Lancer le projet pour faire le buzz sur internet

> php -S 0.0.0.0:8000 -t public

## Autoévaluation
Auto évaluation : 4/5

Je sais ou chercher les informations dont j'ai besoin. J'ai déjà pu travailler sur des projets symfony dans le passé (version 3, 4 et 5). Le problème est que je travaille très rarement sur ce genre de projet, que les versions évoluent assez vite. Je n'ai pas le temps d'appréhender toutes les évolutions et je perds les automatismes même si les concepts restent fondamentalement les mêmes.