<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserApplication extends MultiplePrimaryKey
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'user_applications';
    protected $primaryKey = ['user_id', 'application_id'];
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'application_id',
        'is_active',
    ];    
    
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function application()
    {
        return $this->belongsTo(Application::class, 'application_id');
    }
}
