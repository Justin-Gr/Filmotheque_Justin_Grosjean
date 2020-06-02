<?php

namespace App\Modeles;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public $timestamps = false;
    protected $fillable = ['libelle'];

    public function films() {
        return $this->hasMany(Film::class);
    }
}
