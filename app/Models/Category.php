<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    // Seuls les champs que l'utilisateur ou le code va remplir
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relation avec les Articles.
     * Dans ton SQL : id_category dans la table articles fait référence à categories(id).
     * Comme la clé étrangère s'appelle 'id_category' (et non 'category_id'),
     * il faut obligatoirement le préciser à Laravel comme ceci :
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_category');
    }
}

