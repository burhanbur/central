<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelRole extends MultiplePrimaryKey
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'model_has_roles';
    protected $primaryKey = ['role_id', 'model_type', 'model_uuid'];
    protected $fillable = [
        'role_id',
        'model_type',
        'model_uuid',
    ];    
    
    public $incrementing = false;

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'model_uuid');
    }
}
