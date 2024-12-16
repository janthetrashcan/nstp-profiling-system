<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Component;
use Illuminate\Database\Eloquent\SoftDeletes;
class Formator extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'f_id';
    protected $dates = ['deleted_at'];
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
        'component_id',
        'f_EmploymentStatus',
        'f_ActiveTeaching'
    ];

    public function component(){
        return $this->belongsTo(Component::class, 'component_id');
    }
}
