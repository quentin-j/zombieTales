# Routes du site

## Version 1.0 M.V.P

|Nom de la route|Méthode|contenu|
-- | -- | -- |
|`/`|GET|home page|
|`liste/ {version=[0-9] + extension=[0-9]}`|GET|page liste des scénario trié par Version et extension|
|`scenar/{id=[0-9]}`|GET|page détail d'un scénario|
|`add-scenar`|GET|page formulaire d'ajout de scénario|
|`add-scenar`|POST|Envoie du formulaire d'ajout de connexion|
|`connect`|GET|page du formulaire de connexion|
|`disconnect`|GET|page du formulaire de déconnexion|
|`register`|GET|page du formulaire de création de compte|
|`add-comment`|POST|ajout d'un commentaire|
|`admin-back`|GET|back-office de l'administrator|
|`admin-back/delete-scenar/{id:[0-9]}`|GET|suppression du scénario avec l'id [0-9]|
|`admin-back/delete-comm/{id:[0-9]}`|GET|suppression du commentaire avec l'id [0-9]|
|`admin-back/bann-survivor/{id:[0-9]}`|GET|bannissent de l'utilisateur avec l'id [0-9]|
