<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    protected $table = 'categories';
    public function articles()
    {
        return $this->hasMany(Article::class);
    }

//     use HasFactory;

//     // Seuls les champs que l'utilisateur ou le code va remplir
//     protected $fillable = [
//         'name',
//         'slug',
//     ];
 }

