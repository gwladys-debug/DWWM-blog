<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Article extends Model
{
    protected $table = 'articles';

    // Ajoute ceci pour transformer la chaîne SQL en objet Carbon/DateTime
    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Les tags associés à l'article.
     */
    public function tags(): BelongsToMany
    {
        // On précise le modèle lié (Tag) et le nom de la table pivot (articles_tags)
        // Les clés étrangères dans la table pivot sont id_article et id_tag
        return $this->belongsToMany(Tag::class, 'articles_tags', 'id_article', 'id_tag');
    }

    /**
     * Les commentaires associés à l'article.
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class)->latest();
    }
}
