<?php
namespace App\Model;
use Illuminate\Database\Eloquent\Model;


class Country extends Model
{
    protected $fillable = ['name'];

    public function location()
    {
    	return $this->hasOne(Location::class,'country_id','id');

    }
    public function States()
    {
    	return $this->hasMany(State::class,'country_id','id');
    }

    public function cities()
    {
    	return $this->hasManyThrough(City::class, State::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

}
