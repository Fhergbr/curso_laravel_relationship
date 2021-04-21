<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
	protected $fillable = [
		'latitude',
		'longitude'
	];

    public function Country()
    {


    	// Se a nomenclatura nao seguir a formatacao padrao do laravel, e necessario adicionar os campos de relacionamentos
    	
    	// return $this->belongsTo(Country::class,'country_id','id');
    	
    	return $this->belongsTo(Country::class);
    }
}
