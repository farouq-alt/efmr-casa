<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutilAI extends Model
{
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = ['nom', 'description', 'site_url', 'categorie_id'];

    /**
     * Relation: A tool belongs to a category
     */
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
}
