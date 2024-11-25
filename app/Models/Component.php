<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    protected $primaryKey = 'component_id';

    use HasFactory;
    public function sections()
    {
        return $this->hasMany(Section::class, 'component_id');
    }
}
