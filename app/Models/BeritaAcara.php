<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Str;

class BeritaAcara extends Model
{
    protected $table = 'berita_acara';

    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'foto',
        'is_active',
        'user_id',
    ];

    /**
     * Route model binding pakai slug
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Auto-generate & update slug
     */
    protected static function booted()
    {
        static::saving(function ($berita) {
            if ($berita->isDirty('judul')) {
                $berita->slug = static::generateUniqueSlug($berita->judul, $berita->id);
            }
        });
    }

    private static function generateUniqueSlug($judul, $ignoreId = null)
    {
        $slug = Str::slug($judul);
        $original = $slug;
        $counter = 1;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $original . '-' . $counter++;
        }

        return $slug;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

