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
     */
    public function articles()
    {
        return $this->hasMany(Article::class, 'id_category');
    }
}

