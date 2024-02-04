<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table = 'produits';
    protected $fillable = [
        'name',
        'description',
        'price',
        'images',
        'category_id',
    ];
    public function categories()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}



