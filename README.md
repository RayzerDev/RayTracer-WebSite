# SAE1.01 SITE WEB LARAVEL
Ce projet concerne la suite de notre projet lié au *RayTracer*. C'est un site web qui permet à l'utilisateur

## Technologies
- PhpStorm
- Laravel
- Tailwind CSS
- Bootstrap

## Commandes utiles
1. Récuperer le projet
``` bash
git clone https://gitlab.univ-artois.fr/louis_karamucki/poc-sae3-01-grp13.git
```

2. Installer les dépendences
``` bash
composer install
```

3. Copier le fichier .env.example en .env et modifier les informations de connexion à la base de données
``` bash
cp .env.example .env
```
Modifier la ligne 11 par *DB_CONNECTION=sqlite*

4. Générer la clé de l'application
``` bash
php artisan key:generate
```

5. Créer la base de données
``` bash
vim database/database.sqlite
```

6. Lancer les migrations
``` bash
php artisan migrate
```

7. Démarrer le serveur
``` bash
php artisan serve
npm run dev
```

  
