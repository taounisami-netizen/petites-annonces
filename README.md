# Uberbagarre

Une bagarre de prévue ? On commande un combattant qui se bat à votre place.
Site parodique de petites annonces de combattants · Projet Laravel ESGI 2 (projet fil rouge PetitesAnnonces adapté).

Binôme : Taouni, semblanss

## Installation

```bash
git clone https://github.com/taounisami-netizen/petites-annonces.git && cd petites-annonces
cp .env.example .env

composer install && php artisan key:generate
php artisan migrate:fresh --seed
npm install && npm run build
```

Les mails sont envoyés à Mailpit : http://localhost:8025

## Comptes de démonstration

| Email            | Mot de passe | Rôle                                  |
|------------------|--------------|---------------------------------------|
| test@example.com | password     | membre, propose plusieurs combattants |

Les autres utilisateurs créés par le seeder ont aussi le mot de passe `password`.

## Fonctionnalités

- [x] Liste paginée des combattants, recherche par nom, filtres par ville et tarif maximum
- [x] Pages combattant, ville et style de combat
- [x] Tarif avec la commission Uberbagarre et les gains du combattant
- [x] Inscription et connexion (Breeze)
- [x] Publication, modification et suppression de ses combattants (Form Requests + FighterPolicy)
- [x] Page « Mes combattants »
- [x] Contacter le propriétaire d'un combattant, qui reçoit un email (événement MessageSent, Mailpit)
- [x] Cache sur l'accueil et sur les villes de la navigation, vidé à chaque modification
- [x] Données de démo par seeders : 8 villes, 10 utilisateurs, 100 combattants
- [ ] Bonus : photo, favoris, boîte de réception
