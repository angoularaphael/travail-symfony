-- Données de test à exécuter dans phpMyAdmin après la migration
-- Base de données : tech_blog

-- 1. Insérer les catégories
INSERT INTO category (name) VALUES
('Matériel informatique'),
('Développement'),
('Admin Serveur');

-- 2. Insérer les articles (posts)
INSERT INTO post (title, content) VALUES
('Les meilleurs composants PC en 2024', 'Découvrez notre sélection des meilleurs composants pour monter votre PC. Processeurs, cartes graphiques, mémoires RAM... tout pour construire la machine de vos rêves.'),
('Introduction à Symfony 6', 'Symfony 6 apporte de nombreuses améliorations. Dans cet article, nous explorons les nouveautés et les bonnes pratiques pour démarrer un projet.'),
('Configurer un serveur Linux', 'Guide complet pour configurer un serveur Linux en production : sécurité, performances et bonnes pratiques d''administration système.');

-- 3. Lier les articles aux catégories (post_category)
-- Post 1 -> Matériel informatique (cat 1)
-- Post 2 -> Développement (cat 2)
-- Post 3 -> Admin Serveur (cat 3)
-- Post 1 peut aussi avoir Développement
INSERT INTO post_category (post_id, category_id) VALUES
(1, 1),
(2, 2),
(3, 3),
(1, 2);
