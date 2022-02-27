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