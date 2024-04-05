<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'prenom',
        'nom',
        'cp',
        'ville',
        'telephone',
        'email',
        'naissance',
        'formation',
        'domaine',
        'source',
        'observation',
        'metier_id',
        'cv_path',
    ];

    // la metode metier permet de définir la relation entre les tables professionnel et metier
    public function metier()
    {
        return $this->belongsTo(Metier::class);
    }

    public function competences()
    {
        return $this->belongsToMany(Competence::class)->withTimestamps();
    }

}
