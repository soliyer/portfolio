<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    // The relationship between Skills and Projects
    public function projects()
    {
        $this->hasMany(Project::class);
    }
}
