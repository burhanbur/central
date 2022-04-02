<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'person_address';
    protected $primaryKey = 'id';
    protected $fillable = [
        'person_id',
        'address_id',
    ];    
    
    public $incrementing = true;

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}
