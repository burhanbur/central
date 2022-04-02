<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'districts';
    protected $primaryKey = 'id';
    protected $fillable = [
        'district',
        'city_id',
    ];    
    
    public $incrementing = true;

    public function address()
    {
        return $this->hasMany(Address::class, 'district_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
