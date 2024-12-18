<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Component;
use Carbon\Carbon;
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
        'f_FullName',
        'f_Sex',
        'f_Birthdate',
        'f_ContactNo',
        'f_EmailAddress',
        'f_TeachingYearStart',
        'f_NSTPTeachingYearStart',
        'f_TeachingUnitCount',
        'component_id',
        'f_EmploymentStatus',
        'f_ActiveTeaching',
        'f_Trainings',
    ];

    public function component(){
        return $this->belongsTo(Component::class, 'component_id');
    }
    public function calculateYears($column){
        $date = Carbon::createFromFormat('Y', $this->attributes[$column]); // Create a Carbon instance from the year

        $currentDate = Carbon::now()->addYear(); // Get today's date
        return $date->diffInYears($currentDate); // Calculate years since
    }

    public function age($column){
        try {
            // Try multiple parsing strategies
            $dateFormats = [
                'm-d-Y',
                'Y-m-d',
                'd-m-Y',
                'Y/m/d',
                'm/d/Y',
            ];

            foreach ($dateFormats as $format) {
                try {
                    return Carbon::createFromFormat($format, $this->attributes[$column])->age;
                } catch (\Exception $e) {
                    // Continue to next format if this one fails
                    continue;
                }
            }

            // If no format works, try general parsing
            return Carbon::parse($this->attributes[$column])->age;
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            dd($e);
            return null;
        }
    }

}
