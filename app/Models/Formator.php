<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Component;
class Formator extends Model
{
    protected $primaryKey = 'f_id';
    protected $fillable = [
        'employee_id',
        'f_Surname',
        'f_FirstName',
        'f_MiddleName',
        'f_Sex',
        'f_Birthdate',
        'f_ContactNo',
        'f_EmailAddress',
        'f_TeachingYearStart',
        'f_NSTPTeachingYearStart',
        'f_TeachingUnitCount',
        'f_Component',
        'f_EmploymentStatus',
        'f_ActiveTeaching'
    ];

    public function component(){
        return $this->belongsTo(Component::class, 'component_id');
    }

    use HasFactory;
}
