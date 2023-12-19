# SAE1.01 SITE WEB LARAVEL
Ce projet concerne la suite de notre projet lié au *RayTracer*. C'est un site web qui permet à l'utilisateur de générer des images liées au RayTracer.

## Technologies
- PhpStorm
- Laravel
- Bootstrap

## Commandes utiles
1. Récuperer le projet
``` bash
git clone https://gitlab.univ-artois.fr/louis_karamucki/poc-sae3-01-grp13.git
```

2. Installer les dépendences
``` bash
composer install
npm install 
```

3. Copier le fichier .env.example en .env et modifier les informations de connexion à la base de données
``` bash
cp .env.example .env
```

4. Générer la clé de l'application
``` bash
php artisan key:generate
```

5. Créer un lien symbolique pour rendre visible le storage aux utilisateurs
``` bash
php artisan storage:link
```

6. Créer la base de données
``` bash
touch database/database.sqlite
```

7. Lancer les migrations
``` bash
php artisan migrate:fresh
```

8. Lancer les Seeders
``` bash
php artisan db:seed
```
9. Build le css
``` bash
npm run build
```

10. Démarrer le serveur
``` bash
php artisan serve
```
## Connexion
2 comptes sont à votre disposition :
- normaluser@test.fr
- adminuser@test.fr

**Tous les comptes créés avec le Seeder ont comme mot de passe `password`**
