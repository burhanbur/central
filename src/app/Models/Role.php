<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'guard_name',
    ];    
    
    public $incrementing = true;

    public function modelRole()
    {
        return $this->hasMany(ModelRole::class, 'role_id');
    }

    public function rolePermission()
    {
        return $this->hasMany(RolePermission::class, 'role_id');
    }
}
