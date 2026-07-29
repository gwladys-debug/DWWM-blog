# 🚀 Documentation Technique & Récapitulatif : Blog Laravel

## 📋 Présentation du Projet

Ce projet est un blog moderne développé avec **Laravel**, conçu spécifiquement pour la publication et le partage d'articles orientés développement web. L'application intègre une interface utilisateur sur mesure adoptant une esthétique **Dark Mode / IDE Terminal** (tons sombre, slate, cyan, typographie monospace).

---

## 🛠️ Stack Technique & Environnement

| Composant                  | Technologie / Outil        | Description & Rôle                                          |
| :------------------------- | :------------------------- | :---------------------------------------------------------- |
| **Framework Back-end**     | Laravel 13.16.1            | Framework PHP principal (Routing, MVC, Eloquent ORM, Auth)  |
| **Langage**                | PHP 8.x                    | Programmation Orientée Objet (POO)                          |
| **Front-end / Templating** | Laravel Blade              | Moteur de templates HTML avec injection dynamique           |
| **Stylisation UI**         | Tailwind CSS               | Framework CSS utilitaire (Design Dark Theme / IDE Terminal) |
| **Parsing Contenu**        | Markdown (`Str::markdown`) | Conversion du contenu rédigé en HTML propre                 |
| **Base de Données**        | MySQL / PostgreSQL         | Stockage relationnel des entités et pivots                  |

---

## 🗄️ Architecture de la Base de Données (Modèles & Relations)

### 1. Utilisateurs (`User`)

- **Champs spécifiques** : `firstname`, `lastname`, `email`, `password`, `is_admin` (boolean), `role`.
- **Relations** :
    - `hasMany(Article::class)` : Un utilisateur peut rédiger plusieurs articles.
    - `hasMany(Comment::class)` : Un utilisateur peut poster plusieurs commentaires.

### 2. Articles (`Article`)

- **Champs clés** : `id`, `user_id`, `category_id`, `title`, `slug`, `excerpt`, `content` (Markdown), `status` (`PUBLISHED`, `DRAFT`), `image`.
- **Relations** :
    - `belongsTo(User::class)` : Appartient à un auteur.
    - `belongsTo(Category::class)` : Appartient à une catégorie.
    - `belongsToMany(Tag::class, 'articles_tags', 'id_article', 'id_tag')` : Associé à plusieurs tags (pivot).
    - `hasMany(Comment::class)` : Contient plusieurs commentaires.

### 3. Tags (`Tag`) & Table Pivot (`articles_tags`)

- **Champs Tag** : `id`, `name`.
- **Table Pivot** : `articles_tags` avec les clés `id_article` et `id_tag`.
- **Relation** : `belongsToMany(Article::class, 'articles_tags', 'id_tag', 'id_article')`.

### 4. Commentaires (`Comment`)

- **Champs clés** : `id`, `user_id`, `article_id`, `content`, `created_at`, `updated_at`.
- **Relations** :
    - `belongsTo(User::class)` : Appartient à l'auteur du commentaire.
    - `belongsTo(Article::class)` : Rattaché à un article spécifique.
- **Contraintes clés étrangères** : `onDelete('cascade')` pour supprimer automatiquement les commentaires en cas de suppression de l'utilisateur ou de l'article.

---

## ⚙️ Méthodes Employées & Bonnes Pratiques

1. **Authentification & Contrôle d'Accès** :
    - Validation assouplie du mot de passe (`min:4`).
    - Vérification des privilèges administrateur (`is_admin`) pour l'accès aux fonctionnalités d'édition/suppression.
    - Utilisation du helper `Auth::id()` pour garantir la compatibilité et éviter les avertissements d'analyse statique.

2. **Gestion des Tags (Relations Beaucoup-à-Beaucoup)** :
    - Utilisation de `$article->tags()->sync($request->tags)` pour ajouter, mettre à jour ou supprimer facilement les associations de tags lors de l'enregistrement d'un article.

3. **Optimisation des Requêtes (Anti N+1)** :
    - Chargement lié des relations (_Eager Loading_) dans les contrôleurs :
      `Article::with(['category', 'user', 'tags', 'comments.user'])`.

4. **Expérience d'Écriture & Rendu** :
    - Support complet de la syntaxe Markdown dans les zones de saisie pour une rédaction fluide d'articles techniques.
    - Rendu sécurisé dans Blade via `{!! Str::markdown($article->content) !!}`.

---

## 🎨 Composants Vues Blade Implémentés

- **`articles-create.blade.php`** :
    - Formulaire dynamique réutilisable pour la création et l'édition d'articles.
    - Champs : Titre, Slug (auto-généré ou personnalisé), Extrait, Catégorie (liste déroulante), Statut de publication, Image de couverture, Zone d'édition Markdown.
    - Grille de cases à cocher (_checkboxes_) dynamiques pour la sélection multiple des tags.

- **`article-show.blade.php`** :
    - Affichage détaillé d'un article avec en-tête meta (catégorie, date, auteur).
    - Zone d'actions administratives réservées (`[ÉDITER]`, `[SUPPRIMER]`) conditionnée par `@if(auth()->check() && auth()->user()->is_admin)`.
    - Rendu Markdown du contenu.
    - Liste des tags associés sous forme de badges `#tag`.
    - Section **Commentaires** :
        - Zone de saisie conditionnée par l'état de connexion (`@auth` / `@else`).
        - Formulaire de soumission direct vers `CommentController`.
        - Fil d'affichage chronologique des commentaires avec auteur et date relative (`diffForHumans()`).

---

## 🚦 Routes & Contrôleurs

- **Authentification** : `RegisterController`, `LoginController` (action POST `login.store`).
- **Gestion des Articles** : `ArticleController` (routes d'affichage public et routes réservées à l'administration `/admin/articles/*`).
- **Traitement des Commentaires** : `CommentController@store` protégé par le middleware `auth` avec redirection dynamique `return back()`.

---

## 📝 Check-list des Prochaines Étape (To-Do List)

- [ ] **Filtrage par Tag/Catégorie** : Rendre les badges `#tag` cliquables pour afficher la liste filtrée d'articles.
- [ ] **Moteur de Recherche** : Ajouter un champ de recherche par mot-clé dans les articles.
- [ ] **Pagination** : Ajouter `paginate()` sur les listes d'articles et de commentaires.
- [ ] **Gestion des Commentaires** : Ajouter la possibilité pour un utilisateur (ou admin) de supprimer son propre commentaire.
- [ ] **Nettoyage Stockage** : Supprimer l'image associée du disk `storage` lors de la suppression d'un article (`Storage::delete`).
