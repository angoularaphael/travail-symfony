# Tech Blog

Application Symfony 6.4 - Blog technologique avec articles, catégories et commentaires.

## Prérequis

- PHP 8.1+
- Composer
- MySQL 8.2+
- Symfony CLI (optionnel)

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/angoularaphael/travail-symfony
   cd travail-symfony
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer la base de données**
   - Créer la base `tech_blog` dans phpMyAdmin
   - Adapter le fichier `.env.local` selon votre configuration (utilisateur, mot de passe, port)

4. **Exécuter les migrations**
   ```bash
   php bin/console doctrine:migrations:migrate
   ```

5. **Ajouter les données de test**
   - Exécuter le script `data/sample_data.sql` dans phpMyAdmin (onglet SQL)
   - Ou via ligne de commande : `mysql -u root tech_blog < data/sample_data.sql`

6. **Logo**
   - Télécharger le logo depuis le lien fourni et le placer dans `public/images/logo.png`
   - Ou garder le logo SVG placeholder actuel

## Lancement

```bash
symfony server:start
# ou
php -S localhost:8000 -t public
```

Accéder à http://localhost:8000

## Fonctionnalités

- **Page d'accueil** (`/`) : Liste des articles avec catégories, triés du plus récent au plus ancien
- **À propos** (`/about`) : Page de présentation
- **Détail article** (`/post/{id}`) : Contenu complet + formulaire de commentaire avec validation
- **Validation** : Contraintes Assert sur les entités (Comment, Post, Category)
- **Commentaires** : Affichés par ordre chronologique

## Commandes utiles

```bash
symfony server:start          # Démarrer le serveur
symfony server:stop           # Arrêter le serveur
php bin/console cache:clear   # Vider le cache
php bin/console debug:router # Lister les routes
```
