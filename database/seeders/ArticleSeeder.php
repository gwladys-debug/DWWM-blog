<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $firstCategoryId = DB::table('categories')->oldest('id')->value('id');
        $firstUserId = DB::table('users')->oldest('id')->value('id');

        $articles = [
            [
                'title'      => 'Les secrets du design minimaliste',
                'slug'       => 'les-secrets-du-design-minimaliste',
                'content'    => 'Le minimalisme en design ne consiste pas simplement à enlever des éléments, mais à ne garder que l\'essentiel pour sublimer l\'expérience utilisateur.',
                'created_at' =>  Carbon::parse('2026-05-12 10:30:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Pourquoi adopter le mode sombre ?',
                'slug'       => 'pourquoi-adopter-le-mode-sombre',
                'content'    => 'Le mode sombre est devenu un incontournable des interfaces modernes. Au-delà de l\'élégance esthétique, il réduit la fatigue visuelle en basse luminosité.',
                'created_at' => Carbon::parse('2026-05-18 14:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Introduction aux architectures Headless',
                'slug'       => 'introduction-aux-architectures-headless',
                'content'    => 'Séparer le front-end du back-end offre une flexibilité inégalée. Découvrez comment les CMS Headless transforment la gestion de contenu actuelle.',
                'created_at' => Carbon::parse('2026-06-02 09:00:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'L\'art de structurer son code CSS',
                'slug'       => 'l-art-de-structurer-son-code-css',
                'content'    => 'Maintenir une feuille de style sur le long terme peut devenir un cauchemar. L\'utilisation de méthodologies comme BEM ou de frameworks utilitaires change la donne.',
                'created_at' => Carbon::parse('2026-06-10 16:45:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Organiser son espace de travail pour coder',
                'slug'       => 'organiser-son-espace-de-travail-pour-coder',
                'content'    => 'Un environnement épuré, une lumière tamisée et un bon agencement d\'écran sont les clés pour rester concentré durant de longues sessions de développement.',
                'created_at' => Carbon::parse('2026-06-14 11:20:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Les tendances UI à suivre cette année',
                'slug'       => 'les-tendances-ui-a-suivre-cette-annee',
                'content'    => 'Cette année fait la part belle aux contrastes profonds, aux micro-animations fluides et aux typographies audacieuses inspirées du print.',
                'created_at' => Carbon::parse('2026-06-20 18:30:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Optimiser les performances de son site web',
                'slug'       => 'optimiser-les-performances-de-son-site-web',
                'content'    => 'Chaque milliseconde compte. Du lazy loading des images à la minification des scripts, découvrez les leviers pour accélérer le chargement de vos pages.',
                'created_at' => Carbon::parse('2026-06-25 08:15:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'La puissance du pair programming',
                'slug'       => 'la-puissance-du-pair-programming',
                'content'    => 'Partager son écran et concevoir une logique à deux permet non seulement de réduire les bugs, mais aussi de transmettre les bonnes pratiques au sein d\'une équipe.',
                'created_at' => Carbon::parse('2026-06-29 15:00:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Créer des composants réutilisables et propres',
                'slug'       => 'creer-des-composants-reutilisables-et-propres',
                'content'    => 'La duplication de code est l\'ennemi du développeur. Apprenez à isoler la logique de vos composants pour les rendre modulaires et faciles à maintenir.',
                'created_at' => Carbon::parse('2026-07-02 10:00:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
            [
                'title'      => 'Guide pour réussir la recette de son application',
                'slug'       => 'guide-pour-reussir-la-recette-de-son-application',
                'content'    => 'La phase de recette est cruciale avant la mise en production. Tester rigoureusement chaque parcours utilisateur évite bien des surprises le jour J.',
                'created_at' => Carbon::parse('2026-07-06 14:25:00'),
                'category_id' => $firstCategoryId,
                'user_id' => $firstUserId,
            ],
        ];
        DB::table('articles')->insert($articles);
    }
}
