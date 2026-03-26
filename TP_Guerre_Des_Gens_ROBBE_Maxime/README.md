# TP inspiré de la BD guerre des générations
# Fait par ROBBE Maxime BTS SIO SLAM 1

### Contexte : Création d'un dictionnaire de traduction d'expression pour les différentes générations

* Je vais créer un formulaire qui va afficher des traductions de diverses expressions pour que toutes les générations puissent les comprendre et pouvoir pourquoi pas les utiliser

### Mission 0 : Création de l'arborescence ainsi que de la Base de Donnée sur la VM 

* Avant de commencer le développement de mon projet, je vais d'abord réaliser une arborescence, comme il nous est demandé dans le cahier des charges fourni pour la préparation du TP. Par la suite, je vais créer la base de données de mon projet sur phpMyAdmin.

* Il est important de respecter les arborescences si elles nous sont données au préalable, afin de respecter les demandes de notre client et de ne pas compromettre les installations de ce dernier, si elles sont d'ores et déjà installées et prêtes à recevoir notre application ou formulaire.

### Mission 0.1: Réflexion sur les formulaire sà créer et comment les mettres en places

* Pour la réalisation de ce TP, je décide d'opter pour un choix de formulaire avec liste déroulante qui nous permettra de sélectionner un style d'expression que l'on souhaite utiliser. Selon le choix une liste d'expression correspondant au choix de l'utilisateur apparaitra et l'utilisateur sera libre de les consulter selon son gré.
* Pour ce faire il faudra utiliser un système de catégorie pour classer les expressions et les faires afficher selon la cétegorie sélectionner par l'utilisateur
* Il y aura un bouton pour laisser l'utilisateur réinitialiser son choix et le laisser recommencer.
* On retrouvera aussi un autre formulaire pour pouvoir laisser l'utilisateur rajouter une expression dans notre base de donnée ainsi que son descriptif.
* Et enfin un dernier formulaire qui lui permettra à l'utilisateur de pouvoir consulter toutes les expressions ainsi que leur description sous forme d'une liste

### Mission 0.2 : Création du fichier HTML

* On va donc commencer avec la création de notre fichier HTML afin de poser les bases de nos formulaires et de pouvoir par la suite pouvoir faciliter le développement de notre page web. 
* Je vais faire un formulaire pour chaque spécificité de notre page web, donc un formulaire pour faire afficher une expression selon le thème, un autre formulaire pour pouvoir rajouter une expression dans notre base de donnée et enfin un dernier formulaire pour pouvoir consulter l'intégralité des expressions 

### Mission 1 : Création de la base de données

* On va utiliser la requête PHP pour pouvoir l'exécuter dans phpmyadmin, mais avant ça il y a quelque corrections à faire avant de pouvoir les exécuter.

### Mission 2 : Formulaire HTML pour ajouter des expressions

* Maintenant on s'attaque à la création de notre formulaire d'ajout d'expressions directement dans notre base de donnée, pour ce faire je vais m'aiderr des tp prrécédents pour avoir une base déjà fonctionnel et gagner du temps. On va surtout modifier les noms des variables que ce soit dans le code html et le code php.

### Mission 3 : Afficher les expressions

* Maintenant on va faire le formulaire pour pouvoir afficher toutes les expressions dans notre base de donnée, la ça va être très rapide à faire car il faut uniquement faire une petite requête SQL avec des jointures qui s'effectue quand on clique sur le bouton submit.

### Mission 4 : Modification et suppression d'expression

* Je commence par faire ce qu'il faut pour faire une suppression d'expression en sélectionnant la catégorie dans laquelle elle se situe et ensuite en rentrant son nom.

* Je fais quelque chose d'assez semblable pour la modification des expressions sauf que la je le fais en entrant uniquement le nom de l'expression et on va venir la définition de cette dernière uniquement.

