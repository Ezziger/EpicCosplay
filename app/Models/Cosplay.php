<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cosplay extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'personnage',
        'origine',
        'categorie_id',
    ];

    public function categorie() {
        return $this->hasOne('App\Categories');
    }

    public function user() {
        return $this->BelongsTo('App\Users');
    }

    public function commentaire() {
        return $this->hasMany('App\Commentaires');
    }
}
