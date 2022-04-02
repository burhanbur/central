<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'organizations';
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = [
        'parent_id',
        'org_code',
        'org_unit',
        'is_active',
        'level',
    ];    
    
    public $incrementing = false;

    public function organization()
    {
        return $this->belongsTo(Organization::class, 'parent_id');
    }

    public function position()
    {
        return $this->hasMany(Position::class, 'org_id');
    }
}
