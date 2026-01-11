# foad-php-resavelo

Description
-----------
Application PHP simple de gestion de vélos et de réservations (CRUD vélos, utilisateurs, réservations) accompagnée d'un système d'authentification.

Cette application sert d'exemple pédagogique pour gérer des réservations de vélos avec une organisation légère en MVC-ish (pages + includes + vues).

Structure du projet
-------------------
- `index.php` : page racine (front controller basique).
- `public/` : fichiers accessibles publiquement (alternative pour le webroot).
- `config/` : fichiers de configuration et `db_connect.php`.
- `data/` : dumps SQL (ex. `database.sql`, `database_fill.sql`).
- `includes/` : fonctions PHP réutilisables (`functions_auth.php`, `functions_velo.php`, `functions_reservation.php`, `functions_user.php`, `functions_disponibilites.php`, `functions.php`).
- `views/` : fragments HTML et vues organisées par fonctionnalité (`login/`, `profil/`, `reservations/`, `users/`, `velos/`).
- `login/`, `profil/`, `reservations/`, `users/`, `velos/` : pages d'accès direct pour les opérations CRUD et listes.
- `assets/` : CSS, JS et images.

Fonctionnement (aperçu)
-----------------------
- L'authentification se situe dans `includes/functions_auth.php` et les vues liées sous `views/login/`.
- Les opérations CRUD (Création, Lecture, Mise à jour, Suppression) pour les vélos, utilisateurs et réservations sont réparties entre les dossiers `velos/`, `users/`, `reservations/` et utilisent les fonctions communes dans `includes/`.
- Les vues HTML sont dans `views/` et sont incluses depuis les pages de chaque section. Le fichier `includes/functions.php` contient des helpers partagés.

Prérequis
---------
- PHP 7.4+ ou 8.x avec extensions PDO/MySQL activées.
- MySQL / MariaDB.
- Un serveur web (Apache/Nginx) ou le serveur PHP intégré pour développement.

Installation et mise en route
----------------------------
1. Cloner le dépôt :

```bash
git clone <repo-url>
cd foad-php-resavelo
```

2. Copier le fichier d'exemple d'environnement et éditer les paramètres de connexion à la base :

```bash
cp env_example.php env.php
# Éditer env.php pour renseigner DB_HOST, DB_USER, DB_PASS, DB_NAME
```

3. Importer la base de données :

```bash
mysql -u <user> -p < database/data/database.sql
```
ainsi qu'un ensemble de données cohérentes
```bash
mysql -u <user> -p < database/data/database_fill.sql
```

4. Vérifier `config/db_connect.php` si votre projet s'appuie sur ce fichier pour la connexion.

5. Lancer en local (mode développement) :

```bash
# depuis la racine du projet, servir le dossier public/ comme webroot
php -S localhost:8000 -t public
# ou configurer votre hôte virtuel Apache/Nginx en pointant vers le dossier public/ (recommandé)
```

6. Accéder à l'application via `http://localhost:8000/`
Logger vous avec un compte utilisateur ou administrateur pour accéder aux différentes fonctionnalités.

Notes de déploiement
--------------------
- En production, configurez le serveur web pour pointer le DocumentRoot sur le dossier `public/` si vous souhaitez isoler les fichiers d'application non publics.
- Protégez `env.php` et les fichiers de configuration contre l'accès direct.

Où modifier et étendre
----------------------
- Logique métier et accès DB : `includes/*.php`.
- Templates HTML / partials : `views/partials/`.
- Pages d'administration et formulaires : dossiers `velos/`, `users/`, `reservations/`.

Support et contributions
------------------------
Ce projet est un exemple. Pour améliorer : créer des tests, ajouter validation côté serveur, préparer un système d'ACL et sécuriser les entrées utilisateur.

Fichier ajouté/modifié
----------------------
Le fichier README.md à la racine a été ajouté/mis à jour pour décrire le projet, sa structure et les étapes d'installation.
