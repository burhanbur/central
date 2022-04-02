<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'positions';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'parent_id',
        'org_id',
        'position_code',
        'position',
        'is_active',
        'level',
    ];    
    
    public $incrementing = false;

    public function position()
    {
        return $this->belongsTo(Position::class, 'parent_id');
    }

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'org_id');
    }

    public function employeePosition()
    {
        return $this->hasMany(EmployeePosition::class, 'position_id');
    }

    public function approvalDelegate()
    {
        return $this->hasMany(ApprovalDelegate::class, 'position_delegate_id');
    }
}
