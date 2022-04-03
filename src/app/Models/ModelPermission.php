<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelPermission extends MultiplePrimaryKey
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'model_has_permissions';
    protected $primaryKey = ['permission_id', 'model_type', 'model_uuid'];
    protected $fillable = [
        'permission_id',
        'model_type',
        'model_uuid',
    ];    
    
    public $incrementing = false;

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'model_uuid');
    }
}
