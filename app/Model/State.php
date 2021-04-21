<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
	protected $fillable = ['name','initials','country_id'];

	public function country()
	{
		return $this->belongsTo(Country::class,'country_id','id');
	}
	public function cities()
	{
		return $this->hasMany(City::class,'state_id','id');
	}

	public function comments()
	{
		return $this->morphMany(Comment::class, 'commentable');
	}
}
