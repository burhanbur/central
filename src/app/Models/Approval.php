<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'approvals';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'code',
        'application_id',
        'approval',
        'level',
    ];    
    
    public $incrementing = false;

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }

    public function approvalWorkflow()
    {
        return $this->hasMany(ApprovalWorkflow::class, 'approval_id');
    }
}
