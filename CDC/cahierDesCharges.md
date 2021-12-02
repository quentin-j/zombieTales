# ZombieTales

## Késako ?

C'est un projet qui à pour but de redonner un souffle au jeux de la licence zombicide (jeux de plateau). Ce projet à pour but de donner aux utilisateurs de nouveaux scénario ainsi que la possibilité de poster leurs propres scénarios / règles sur les différentes versions et extension du jeu (black plague / invader / ...).
Le site servira aussi (su le long terme), de blog ou les utilisateurs pourront communiquer et échanger sur les différents jeux **Zombicide**.

## Attentes & objectifs

L'objectif est de créer un site communautaire sur lequel chacun pourra posté son propre scénario avec ces propre régle custom. les utilisateur pourront alors échangé sur leurs expériences acquise en jeu.

Dans un premier temps le site utillisera le **M.V.P** suivant :

- Possibilité des pouvoir ce créer un compte
- Possibilité de pouvoir ce connecter et ce déconnecter
- Avoir accés à la liste des scénarios de la version classique de **Zombicide V1/V2**
- Pouvoir consulter un scénario
- Pouvoir commenter un scénario
- Pouvoir créer un scénario
- site utilisable sur mobile (responsive design)

Puis dans un deuxième temps :

- Ajout des autres versions (black plague / invader / undead or alive / ...)
- Ajout d'un back-office pour les utilisateur connecté pour qu'ils puisse modifier les scénario qu'ils auront posté
- Ajout d'un wiki sur les perso
- Ajout d'une section de fan fiction où les utilisateurs pourront poster leurs fan fiction personnel sur les différents univers du jeu

## Type d'usagers

- **Visiteur** : utilisateur non connecté, il a la possibilité d'accéder aux différent scénario proposé par les autres utilisateurs
- **Survivant (utilisateur connecté)** : il à les même droit que le visiteur, mais il peut en plus de cela ajouter de nouveaux scénraio et peu laisser un commentaire sur les autres scénario
- **Administrator** : il a les même droits que l'utilisateur connecté et il peut en plus de ça effectuer un travail de modération sur le site (supprimer un scénario, commentaire et bannir un compte utilisateur (**Survivant**) ).

## Technologies envisagée

**Front**

- HTML/CSS
- JS
- twig

**Back**

- PHP -> Symfony
- MySQL

**API**

Il faudra effectuer un travail de recherche pour trouver une API permetant de créer les map dse scénario. si cela n'existe pas alors il faudra là créer.