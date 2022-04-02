<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'address';
    protected $primaryKey = 'id';
    protected $fillable = [
        'address',
        'province_id',
        'city_id',
        'district_id',
        'postal_code',
    ];    
    
    public $incrementing = true;

    public function personAddress()
    {
        return $this->hasMany(PersonAddress::class, 'address_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
