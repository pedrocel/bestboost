<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PerfilModel extends Model
{
    use HasFactory;

    protected $table = 'perfis'; 

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_perfis')
            ->withPivot('is_atual', 'status')
            ->withTimestamps();
    }
}
