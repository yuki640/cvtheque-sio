<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'description',
        'slug',
    ];

    // la metode professionnels permet de définir la relation entre les tables metier et professionnel
    public function professionnels()
    {
        return $this->hasMany(Professionnel::class);
    }
}
