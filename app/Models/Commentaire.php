<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;
    protected $fillable = ['comment'];

    public function cosplay() {
        return $this->belongsTo('App\Cosplays');
    }

    public function user() {
        return $this->belongsTo('App\Users');
    }
}
