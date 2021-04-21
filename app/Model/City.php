<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function companies()
    {
    	//para tabelas do tipo "tipo" seguir ordem alfabetica// caso contrario sera necessario informar no metode de relacionamento
    	return $this->belongsToMany(Company::class,'company_city');
   	 
    }

    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }

}
