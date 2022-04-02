<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalWorkflow extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'approval_workflows';
    protected $primaryKey = 'id';
    protected $fillable = [
        'approval_id',
        'request_code',
        'approver_id',
        'status',
        'sequence',
        'is_delegate',
    ];    
    
    public $incrementing = true;

    public function approval()
    {
        return $this->belongsTo(Approval::class, 'approval_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'approver_id');
    }
}
