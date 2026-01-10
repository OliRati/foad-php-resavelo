# RESAVELO — Location de vélos (FOAD)

Projet PHP pour gérer la location de vélos de ville (catalogue public + administration).

**But** : afficher un catalogue de vélos, permettre la réservation par plage de dates, et fournir un espace d'administration pour gérer vélos et réservations.

**Prérequis**
- PHP 7.4+ (module PDO)
- MySQL / MariaDB
- Serveur web (Apache, Nginx) ou `php -S` pour test local

**Installation rapide**
1. Cloner le dépôt dans votre environnement de travail.
2. Copier `config/env_sample.php` → `config/env.php` et renseigner les identifiants de la base de données.
3. Importer la base de données :

```bash
mysql -u USER -p DATABASE_NAME < data/database.sql
```

4. Vérifier la connexion PDO dans [config/db_connect.php](config/db_connect.php).  
5. Ouvrir le projet dans un navigateur via votre serveur web ou via :

```bash
php -S localhost:8000 -t public
```

**Structure principale du projet**
- `config/` : configuration et connexion PDO.
- `includes/` : fonctions PHP (velos, réservations, auth, calculs).
- `public/` : pages accessibles au public (catalogue, formulaire de réservation, mes réservations).
- `admin/` : interface d'administration (gestion vélos, réservations).
- `views/` : templates/partial pour affichage.
- `assets/` : CSS, JS et images.
- `data/` : dump SQL pour peupler la base.

Fichiers utiles :
- [config/env_sample.php](config/env_sample.php) — exemple de configuration.
- [config/db_connect.php](config/db_connect.php) — connexion PDO.
- [data/database.sql](data/database.sql) — schéma + données de test.

**Pages importantes**
- Page publique d'accueil / catalogue : [public/index.php](public/index.php)
- Formulaire de réservation : [public/reservation_form.php](public/reservation_form.php)
- Mes réservations (client) : [public/mes_reservations.php](public/mes_reservations.php)
- Administration : [admin/index.php](admin/index.php), [admin/velos.php](admin/velos.php), [admin/reservations.php](admin/reservations.php)

**Fonctions clés (dans `includes/`)**
- Vélos : `getAllVelos($pdo)`, `getVeloById($pdo,$id)`, `addVelo()`, `updateVelo()`, `deleteVelo()`
- Réservations : `createReservation()`, `getAllReservations()`, `updateReservationStatus()`, `cancelReservation()`, `checkAvailability()`
- Calculs : `calculatePrice($price_per_day, $start_date, $end_date)`

Conseil : adapter la logique de disponibilité (`checkAvailability`) pour exclure les réservations qui se chevauchent.

**Configuration & sécurité**
- Ne jamais committer vos identifiants réels : utilisez `config/env.php` en local uniquement.
- Pour la production, configurer HTTPS et restreindre l'accès au dossier `admin/` (authentification + rôles).

**Tests manuels rapides**
1. Importer `data/database.sql` pour le shema.
   et `data/database_fill.sql` pour un ensemble de données permettant de tester le projet.
2. Ouvrir `public/index.php` et vérifier l'affichage du catalogue.
3. Tester la réservation via `public/reservation_form.php` puis vérifier la création en base et l'affichage dans `public/mes_reservations.php`.
