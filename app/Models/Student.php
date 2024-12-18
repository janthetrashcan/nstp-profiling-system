<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Program;
use App\Models\Section;
use App\Models\Component;
use App\Models\Batch;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 's_id';
    protected $dates = ['deleted_at'];
    protected $fillable = [
        's_StudentNo',
        's_Surname',
        's_FirstName',
        's_MiddleName',
        's_FullName',
        's_Suffix',
        's_Sex',
        's_Birthdate',
        's_ContactNo',
        's_EmailAddress',
        'program_id',
        'sec_id',
        'component_id',
        'batch_id',
        's_c_HouseNo',
        's_c_Street',
        's_c_Barangay',
        's_c_City',
        's_c_Province',
        's_p_HouseNo',
        's_p_Street',
        's_p_Barangay',
        's_p_City',
        's_p_Province',
        's_c_CompleteAddress',
        's_p_CompleteAddress',
        's_ContactPersonName',
        's_ContactPersonNo',
        's_FinalGrade',
    ];
    public function program(){
        return $this->belongsTo(Program::class, 'program_id');
    }

    public function section(){
        return $this->belongsTo(Section::class, 'sec_id');
    }

    public function component(){
        return $this->belongsTo(Component::class, 'component_id');
    }

    public function batch(){
        return $this->belongsTo(Batch::class, 'batch_id');
    }
}

