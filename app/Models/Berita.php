<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    // Define the table name (optional if it follows Laravel's naming convention)
    protected $table = 'berita';

    // Fields that can be mass-assigned
    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'gambar',
        'author',
        'tanggal',
        'embedYT',
    ];

    // Cast columns to their appropriate types
    protected $casts = [
        'tanggal' => 'date',
    ];
}
