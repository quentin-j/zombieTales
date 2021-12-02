# Dictionnaire de données

## TABLE : utilisateur

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de notre utilisateur|
|name|VARCHAR(64)|NOT NULL|Le nom de l'utilisateur|
|email|VARCHAR(254)|NOT NULL, UNIQUE|L'e-mail de l'utilisateur|
|password|VARCHAR(254)|NOT NULL|mot de passe de l'utilisateur|
|etat|TINYINT(3)|NOT NULL, UNSIGNED|etat de l'utilisateur si 0 utilisateur admi si 1 ou plus alors banni|
|rôle_id|TINYINT|NOT NULL, UNSIGNED|détermine le rôle de l'utilisateur|

## TABLE : role

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du rôle|
|name|VARCHAR(64)|NOT NULL|Le nom du rôle|

## TABLE : remark

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du commentaire|
|content|VARCHAR(255)|NOT NULL|contenu du commentaire|
|author_id|INT(10)|NOT NULL|identifiant de l'auteur du commentaire|
|scenario_id|INT|NOT NULL|id du scénrio auquel le commentaire est rataché|
|published_date|DATETIME|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de publication du commentaire (heure comprise)|

## TABLE : scenario

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant du scénario|
|title|VARCHAR(64)|NOT NULL|Le titre de l'article|
|history|TEXT|NOT NULL|histoire du scénario|
|objectifs_id|INT(10)|NOT NULL, UNSIGNED|objectifs du scénario|
|specialRules_id|INT(10)|NOT NULL, UNSIGNED|règles spécial du scénario|
|map|VARCHAR(255)|NULL|image de la map du scénario|
|author_id|INT(10)|NOT NULL|identifiant de l'auteur du scénario|
|difficulty_id|TINYINT(3)|NOT NULL, UNSIGNED|niveau de difficulté du scénario|
|nb_survivor|TINYINT(3)|NOT NULL|nombre de survivants nécessaire pour le scénario|
|time|TINYINT|NOT NULL, UNSIGNED|durée du scénario|
|published_date|DATETIME|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de publication du scénario (heure comprise)|
|updat_date|DATETIME|NOT NULL, DEFAULT CURRENT_TIMESTAMP|La date de la dernière mise à jour du scénario (heure comprise)|

## TABLE : difficulty

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la difficulté |
|level|VARCHAR(64)|NOT NULL|nom de la difficulté|

## TABLE : version

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de la version|
|name|VARCHAR(64)|NOT NULL|Le nom de la version|

## TABLE : addons

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de l'extension|
|name|VARCHAR(64)|NOT NULL|Le nom de l'extension|
|version_id|INT|NOT NULL, UNSIGNED|id de la version à laquelle appartient l'extension|

## TABLE : objectifs

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de l'extension|
|title|TEXT|NULL|titre des objectifs|
|objectif|TEXT|NOT NULL|objectif du scenario|

## TABLE : specialRules

|Champ|Type|Spécificités|Description|
--| -- | -- | -- |
|id|INT(10)|PRIMARY KEY , NOT NULL, UNSIGNED, AUTO_INCREMENT|L'identifiant de l'extension|
|rule|TEXT|NOT NULL|règle du scenario|