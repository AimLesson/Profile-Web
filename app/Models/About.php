<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'institusi_id', // Foreign key for the relationship
    ];

    /**
     * Relationship to the Institusi model.
     */
    public function institusi()
    {
        return $this->belongsTo(Institusi::class);
    }
}
