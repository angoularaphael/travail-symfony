# Tech Blog

Application Symfony 6.4 — Blog technologique avec articles, catégories et commentaires.

**Repository :** [github.com/angoularaphael/travail-symfony](https://github.com/angoularaphael/travail-symfony)

## Fonctionnalités

| Page | URL | Description |
|------|-----|-------------|
| Accueil | `/` | Liste des articles avec catégories et lien « Lire la suite » |
| Recherche | `/search?q=...` | Recherche d'articles par titre ou contenu |
| Catégories | `/categories` | Liste des catégories avec nombre d'articles |
| Catégorie | `/category/{id}` | Articles d'une catégorie |
| À propos | `/about` | Page de présentation du blog |
| Contact | `/contact` | Coordonnées et informations de contact |
| Détail article | `/post/{id}` | Contenu complet + formulaire de commentaire |

### Fonctionnalités transversales

- **Recherche** : Barre de recherche dans le header
- **Thème clair / sombre** : Toggle dans le header (thème clair par défaut, préférence sauvegardée en local)
- **Fil d'Ariane** : Breadcrumbs sur les pages internes
- **Newsletter** : Formulaire d'inscription dans le footer
- **Validation** : Contraintes Assert sur les entités (Post, Category, Comment)
- **Commentaires** : Affichés par ordre chronologique

---

## Prérequis

- PHP 8.1+
- Composer
- MySQL 8.2+
- Symfony CLI (recommandé)

---

## Installation

1. **Cloner le projet**
   ```bash
   git clone https://github.com/angoularaphael/travail-symfony tech_blog
   cd tech_blog
   ```

2. **Installer les dépendances**
   ```bash
   composer install
   ```

3. **Configurer la base de données**
   - Créer la base `tech_blog` dans phpMyAdmin
   - Copier `.env.example` vers `.env.local`
   - Adapter `DATABASE_URL` dans `.env.local` (utilisateur, mot de passe, port, version MySQL)

4. **Exécuter les migrations**
   ```bash
   symfony console doctrine:migrations:migrate
   ```

5. **Ajouter les données de test**
   - Exécuter le script `tech-blog.sql` dans phpMyAdmin (onglet SQL)
   - Ou via ligne de commande : `mysql -u root tech_blog < tech-blog.sql`

6. **Logo** (optionnel)
   - Télécharger le logo : [Google Drive](https://drive.google.com/file/d/13QunMiQZYV-URJOw9rTkbptO7szzfrEE/view?usp=sharing)
   - Le placer dans `public/images/logo.png`

---

## Lancement

```bash
symfony server:start
```

Puis accéder à **http://localhost:8000** (ou l'URL affichée dans le terminal).

---

## Structure du projet

```
tech_blog/
├── config/           # Configuration Symfony
├── migrations/       # Migrations Doctrine
├── public/           # Assets publics (images, etc.)
├── src/
│   ├── Controller/   # PageController, PostController, CategoryController
│   ├── Entity/      # Post, Category, Comment
│   ├── Form/        # CommentType
│   └── Repository/  # PostRepository, CategoryRepository, CommentRepository
├── templates/       # Templates Twig
├── tech-blog.sql    # Données de test
└── .env.example     # Exemple de configuration
```

---

## Commandes utiles

```bash
symfony server:start                    # Démarrer le serveur
symfony server:stop                     # Arrêter le serveur
symfony console cache:clear             # Vider le cache
symfony console debug:router            # Lister les routes
symfony console doctrine:schema:validate # Tester la connexion BDD
```
