<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'provinces';
    protected $primaryKey = 'id';
    protected $fillable = [
        'city',
        'province_id',
    ];    
    
    public $incrementing = true;

    public function address()
    {
        return $this->hasMany(Address::class, 'province_id');
    }

    public function city()
    {
        return $this->hasMany(City::class, 'province_id');
    }
}
