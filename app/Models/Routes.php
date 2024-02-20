<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Routes extends Model
{
    use HasFactory;
    protected $fillable = [
        'uri',
    ];
    public function permitions()
    {
        return $this->hasMany(Permition::class);
    }
}
