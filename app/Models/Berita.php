<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'berita';

    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'gambar',
        'author',
        'tanggal',
        'embedYT',
        'institusi_id', // Add this to allow linking to Institusi
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Relationship to the Institusi model.
     */
    public function institusi()
    {
        return $this->belongsTo(Institusi::class);
    }
}
