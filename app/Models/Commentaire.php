<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'cosplay_id', 'parent_id', 'comment'];

    public function cosplay() {
        return $this->belongsTo(Cosplay::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Commentaire::class, 'parent_id');
    }
}
