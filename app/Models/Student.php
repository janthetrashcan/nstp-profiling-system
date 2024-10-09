<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Section;

class Student extends Model
{
    use HasFactory;

    public function program(){
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'sec_id');
    }
}

