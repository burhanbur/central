<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployeePosition extends MultiplePrimaryKey
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'employee_positions';
    protected $primaryKey = ['employee_id', 'position_id'];
    protected $keyType = 'string';
    protected $fillable = [
        'employee_id',
        'position_id',
        'start_date',
        'end_date',
        'is_active',
    ];    
    
    public $incrementing = false;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function position()
    {
        return $this->belongsTo(Positions::class, 'position_id');
    }
}
