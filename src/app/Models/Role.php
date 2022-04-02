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
    protected $keyType = 'string';
    protected $fillable = [
        'role',
    ];    
    
    public $incrementing = false;

    public function userRole()
    {
        return $this->hasMany(UserRole::class, 'role_id');
    }
}
