<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'employees';
    protected $primaryKey = 'person_id';
    protected $keyType = 'string';
    protected $fillable = [
        'nip',
        'join_date',
        'is_active',
    ];    
    
    public $incrementing = false;

    public function person()
    {
        return $this->hasOne(Person::class, 'id');
    }

    public function approvalWorkflow()
    {
        return $this->hasMany(ApprovalWorkflow::class, 'approver_id');
    }

    public function approvalDelegate()
    {
        return $this->hasMany(ApprovalDelegate::class, 'employee_delegate_id');
    }

    public function employeePosition()
    {
        return $this->hasMany(EmployeePosition::class, 'employee_id');
    }
}
