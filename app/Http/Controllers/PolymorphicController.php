<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\State;
use App\Model\Country;
use App\Model\Comment;


class PolymorphicController extends Controller
{
    public function Polymorphic()
    {

        $city = City::where('name','Curitiba')->get()->first();

        echo "<h1><b>{$city->name}</b></h1>";


        $comments = $city->comments()->get();

        foreach($comments as $comment)
        {
            echo "<p>{$comment->description}</p><hr>";
        }

        $state = State::where('name','Ceara')->get()->first();

        echo "<h1><b>{$state->name}</b></h1>";


        $commentsState = $state->comments()->get();

        foreach($commentsState as $comment)
        {
            echo "<p>{$comment->description}</p><hr>";
        }

        $country = Country::where('name','Estados Unidos')->get()->first();

        echo "<h1><b>{$country->name}</b></h1>";


        $commentsCountry = $country->comments()->get();

        foreach($comments as $comment)
        {
            echo "<p>{$comment->description}</p><hr>";
        }

    }

    public function PolymorphicInsert()
    {

    	// $city = City::where('name','Curitiba')->get()->first();

    	// echo "<b>{$city->name}</b>";

    	// $comment = $city->comments()->create([
    	// 	'description' => "This is a new comment for city $city->name".date('dmYHis'),

    	// ]);

    	
    	// $country = Country::where('name','Brasil')->get()->first();

    	// echo "<b>{$country->name}</b>";

    	// $comment = $country->comments()->create([
    	// 	'description' => "This is a new comment for country $country->name".date('dmYHis'),

    	// ]);

    	$state = State::where('name','Ceara')->get()->first();

    	echo "<b>{$state->name}</b>";

    	$comment = $state->comments()->create([

    		'description' => "This is a new comment for state $state->name".date('dmYHis'),

    	]);

    }

}
