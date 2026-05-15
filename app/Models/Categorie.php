<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['nom', 'groupe'];

    /**
     * Relation: A category has many tools
     */
    public function outilAIs()
    {
        return $this->hasMany(OutilAI::class, 'categorie_id');
    }
}
