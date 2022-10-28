# Pré-requis
- PHP 7.4 ou 8.0+
- Base de données MySQL 5.7+

# Instructions
- Ce projet consiste en un backoffice de gestion de produits pour un entrepôt. 
- Ce backoffice est en cours de développement: seuls la liste des produits et l'ajout d'un produit sont implémentés. Pour terminer le développement de ce backoffice, une liste de tâches est présente à la fin de ce fichier.
- Votre objectif est d'implémenter ces tâches.
- Pour soumettre ce test, zippez les dossiers `src` et `templates` et envoyez le zip à une adresse qui vous sera communiquée.
- La durée maximale recommandée est de 2 heures. Si vous n'avez pas terminé au bout de ce temps, il est acceptable d'écrire des commentaires expliquant en détails comment vous auriez implémenté les tâches restantes.

# Installation
- Cloner le projet
- Lancer `composer install` (Si PHP 7.4, lancer plutôt `composer update`)
- Créer un fichier `.env.local` à la racine du projet, ajouter la variable `DATABASE_URL` et la configurer en fonction de votre environnement local
- Lancer les commandes `php bin/console doctrine:database:create` puis `php bin/console doctrine:schema:create`
- Lancer la commande `php bin/console doctrine:fixtures:load` pour initialiser la BDD avec des données de test.
- Lancer un web server et le relier à cette application (en utilisant le server local de Symfony où en créant un virtual host par exemple)
- Le projet est prêt: la liste des produits est accessible sur l'URL `/product`.

# Tâches
- Afficher la date de création des produits sous le format `JJ/MM/AAAA` (par exemple: `26/03/2004`)
- Le lien `Ajouter un produit` n'est pas fonctionnel. Faire pointer ce lien vers la route de création de produits.
- Ajouter les contraintes suivantes sur l'entité `Product`:
  - Les champs nom, stock, référence, date de création, catégorie ne doivent pas être nuls
  - La référence doit être unique
  - La référence doit être une chaîne de caractères de longueur 7 composée d'une une lettre majuscule suivie de 6 chiffres
  - Le stock doit être un nombre entier positif (ou zéro)
- Dans le formulaire de création de produit, ajouter un champ `category` (qui correspond à la catégorie du produit)
- Trier la liste des produits selon les critères suivants:
  - Afficher les produits par ordre d'affichage des catégories croissant (champ `displayOrder` de l'entité `Category`): afficher en premier les boissons, puis les viandes, ...
  - Parmi les produits de la même catégorie, les trier par ordre alphabétique croissant.
- Implémenter la suppression d'un produit
- Implémenter la modification d'un produit
