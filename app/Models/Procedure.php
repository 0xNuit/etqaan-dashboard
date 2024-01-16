<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    use HasFactory;
    protected $fillable = [
        'notes',
        'status',
        'title',
        'file_name',
        // Add other fields as needed
    ];

    public function assets()
    {
        return $this->belongsToMany(Asset::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
