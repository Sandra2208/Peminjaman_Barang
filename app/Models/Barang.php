<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Barang extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = [
        'kode_barang', 'barang', 'stock', 'slug', 'dipinjam'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'barang'
            ]
        ];
    }
    /**
     * The roles that belong to the Barang
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'barang_category', 'barang_id', 'category_id');
    }
}
