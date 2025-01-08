<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $primaryKey = 'sec_id';
    protected $fillable = [
        'sec_Section',
        'sec_StudentCount',
        'sec_Capacity',
        'sec_BarangayAssigned',
    ];

    public function student(){
        return $this->hasMany(Student::class, 'sec_id');
    }
    public function component()
    {
        return $this->belongsTo(Component::class, 'component_id');
    }
}
