<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAddress extends Model
{
    use HasFactory;
    
    protected $table = 'employees_addresses';
    protected $fillable = ['address1', 'address2', 'address3', 'employee_id'];

    // Define the relationship with the Employee model
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
