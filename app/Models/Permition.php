<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Permition extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_id',
        'route_id'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function route() // Assuming you have a Route model
    {
        return $this->belongsTo(Routes::class);
    }
}