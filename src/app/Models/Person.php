<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'user_id',
        'sid',
        'name',
        'phone_number',
        'birthday',
        'religion',
        'photo',
    ];    
    
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function employee()
    {
        return $this->hasOne(Employee::class, 'person_id');
    }

    public function personAddress()
    {
        return $this->hasMany(PersonAddress::class, 'person_id');
    }
}
