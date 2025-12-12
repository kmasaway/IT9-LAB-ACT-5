<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $primaryKey = 'location_id';
    public $timestamps = false;

    protected $fillable = [
        'street_address',
        'postal_code',
        'city',
        'state_province',
        'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'country_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'location_id', 'location_id');
    }
}
