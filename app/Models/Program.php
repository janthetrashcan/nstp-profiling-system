<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'program_id';

    protected $fillable = [
        'program_Code',
        'program_Title',
    ];

    public function student(){
        return $this->hasMany(Student::class, 'program_id');
    }
}
