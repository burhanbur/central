<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'applications';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'application',
        'description',
        'base_url',
        'login_url',
        'logo',
        'is_active',
    ];    
    
    public $incrementing = false;

    public function userApplication()
    {
        return $this->hasMany(UserApplication::class, 'application_id');
    }

    public function approval()
    {
        return $this->hasMany(Approval::class, 'application_id');
    }
}
