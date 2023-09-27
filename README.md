# symfony-warehouse

Projet sous Symfony 6 / PHP 8.1 pour gérer des produits avec tailles différentes dans des entrepots.

## Installation
- Cloner le projet
- Installer les dépendances PHP : ```composer update```
- Installer les dépendances JS : ```npm install```
- Pour builder les assets : ```npm run build```
- Copier le .env en .env.local et renseigner DATABASE_URL
- Exécuter la migration : ```php bin/console doctrine:migrations:migrate``` ou utiliser [app_tables_mariadb.sql](/app_tables_mariadb.sql) pour créer la base de données
- Importer le jeu d'essai [app_data_mariadb.sql](/app_data_mariadb.sql)
- Démarrer le serveur symfony server:start

## Méthodologie et choix
- J'ai fait un premier brouillon de mon schéma de base de données sur papier
- Initialisation du projet Symfony 6 à l'aide l'outil symfony
- Require de l'ORM/maker-bundle
- Création de la base de données
- Création des entitées
- Création des migrations
- Migration pour créer la base côté MariaDB
- Création des controllers
- Création du jeu d'essai à la main dans PhpMyAdmin (je sais qu'il existe le paquet Faker, mais j'ai voulu m'assurer des différents exemples possibles en prenant le thème des chaussures)
- Dans les Repository je défini mes méthodes :
  - Dans ProductSizeRepository, je crée ma requête avec Doctrine en partant des tailles produits pour vérifier si elles sont disponibles ou non avec un paramètre dans la fonction, j'utilise COALESCE en SQL pour renvoyer les produits qui n'ont pas de stock si c'est null
  - Dans ProductRepository, je crée ma requête avec Doctrine pour récupérer les produits n'ayant aucune disponibilité (aucun stock sur aucune taille du produit) grâce à COUNT(r.id) = 0
  - Dans ReceptionRepository, je crée ma requête avec Doctrine pour récupérer le détail des réceptions par Produit en passant en paramètre l'id du Produit
- Dans les Controllers, j'appelle ces méthodes dans des fonctions liées à des routes définies nommées, ces fonctions renvoient les données ensuite à un template défini
  - Dans ProductController, la route product_detail prend en paramètre l'id du produit
  - J'ai mis les méthodes concernants les Produits dans ProductController, et les méthodes concernant les stocks dans ReceptionController
- J'ai construit des templates répartis dans plusieurs dossiers :
  - product, reception correspondants aux controller ci-dessus
  - home pour la page d'accueil
  - _partials pour les éléments réutilisables comme le menu
  - Les templates sont globalement constitutés d'un tableau HTML avec une fonction Twig bouclants sur les résultats des requêtes
- Pour ce qui est du menu, j'ai créé un Service ainsi qu'un EventListener
  - une class MenuBuilder dans le Service permet de créer le contenu du menu, elle va contenir les différents éléments (label, routes)
  - un EventListener est un événement Symfony qui se déclenche à chaque demande pour construire le menu à chaque requête, on récupère le contenu du menu que l'on stocke dans un attribut "global_menu"
  - Le menu est ensuite affiché dans un template situé dans _partials/_menu.html.twig
  - Ce menu est inclu dans toutes les vues via la clause {{ include('_partials/_menu.html.twig') }} de Twig
- Pour amélioré le visuel de l'application, j'ai installé webpack-encore puis bootstrap
  - webpack-encore permet de gérer les assets js/css et importer des bibliothèques
  - sass-loader permet de gérer des assets scss
  - Bootstrap permet d'avoir un meilleur rendu visuel
  - J'ai utilisé le composant navbar de Bootstrap pour le menu global
- Le projet a été développé avec Visual Studio Code sous Ubuntu, avec l'aide d'XDebug, PhpMyAdmin,  GitHub pour la plateforme d'hébergement de code