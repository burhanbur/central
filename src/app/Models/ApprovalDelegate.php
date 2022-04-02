<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalDelegate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'approval_delegates';
    protected $primaryKey = 'id';
    protected $fillable = [
        'employee_delegate_id',
        'position_delegate_id',
        'start_date',
        'end_date',
        'is_active',
    ];    
    
    public $incrementing = true;

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_delegate_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_delegate_id');
    }    
}
