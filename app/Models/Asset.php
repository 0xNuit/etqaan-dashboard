<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function procedures()
{
    return $this->hasMany(Procedure::class);
}

public function users()
{
    return $this->belongsToMany(User::class, 'asset_user');
}

public function committeeChief()
{
    return $this->belongsTo(CommitteeChief::class);
}

}
