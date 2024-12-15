<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institusi extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'picture',
        'name',
        'address',
        'phone',
        'logo',
        'slug',
    ];

    /**
     * Relationship to the About model.
     */
    public function about()
    {
        return $this->hasOne(About::class);
    }

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
