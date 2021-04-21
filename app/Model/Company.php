<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function cities()
    {
    	return $this->belongsToMany(City::class,'company_city');
    	
    }
}
