<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'cities';
    protected $primaryKey = 'id';
    protected $fillable = [
        'city',
        'province_id',
    ];    
    
    public $incrementing = true;

    public function address()
    {
        return $this->hasMany(Address::class, 'city_id');
    }

    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id');
    }

    public function district()
    {
        return $this->hasMany(District::class, 'city_id');
    }
}
