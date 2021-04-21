<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\State;
use App\Model\Country;

class OneToManyController extends Controller
{
	public function OneToMany()
	{
		$keySearch = 'a';

    	// $country = Country::where('name','Brasil')->get()->first();
		
		// $countries = Country::where('name','LIKE',"%{$keySearch}%")->get();

		//Tras todos os registros vinculados a essa entidade (No caso os paises e os estado vinculados a ele)
		$countries = Country::where('name','LIKE',"%{$keySearch}%")->with('states')->get();


		foreach($countries as $country){

		 // echo "<strong>Estados do ". $country->name ."<hr></strong>" ;    	

			echo "<strong>Pais: {$country->name}</strong><br>";

		// $states = $country->states()->where('initials','MG')->get();

			// $states = $country->states()->get();
			
			$states = $country->states;

			foreach($states as $state)
			{
				echo " {$state->name} - {$state->initials} <br>";
			}
			echo "<hr>";
		}
	}

	public function ManyToOne()
	{
		$stateName = "Minas Gerais";

		$state = State::where('name',$stateName)->get()->first();

		$country = $state->country;

		echo "{$country->name} ";

		echo " - {$state->name}";

	}
	
	public function OneToManyTwo()
	{
		$keySearch = 'a';

    	// $country = Country::where('name','Brasil')->get()->first();
		
		// $countries = Country::where('name','LIKE',"%{$keySearch}%")->get();

		//Tras todos os registros vinculados a essa entidade (No caso os paises e os estado vinculados a ele)
		$countries = Country::where('name','LIKE',"%{$keySearch}%")->with('states')->get();


		foreach($countries as $country){

		 // echo "<strong>Estados do ". $country->name ."<hr></strong>" ;    	

			echo "<strong>Pais: {$country->name}</strong><br>";

		// $states = $country->states()->where('initials','MG')->get();

			// $states = $country->states()->get();
			
			$states = $country->states;

			foreach($states as $state)
			{
				echo "<strong> <br> {$state->name} {$state->initials}</strong> <br> Cidade: ";

				foreach($state->cities as $city)
				{
					echo "{$city->name} - ";
				}
			}

			echo "<hr>";
		}
	}

	public function OneToManyInsert()
	{
		$dataForm = [
			'name' => 'Bahia',
			'initials' => 'BA'
		];

		$country = Country::find(1);

		$insertState = $country->states()->create($dataForm);

		if($insertState)
		{
			echo "Cadastrado com sucesso!!";
		}
		else{
			echo "Falha ao cadastrar dados";
		}

	}


	public function OneToManyInsertTwo()
	{
		$dataForm = [
			'name' => 'Mato Grosso',
			'initials' => 'MT',
			'country_id' => '1'
		];

		$insertState = State::create($dataForm);

		if($insertState)
		{
			echo "Cadastrado com sucesso!!";
		}
		else{
			echo "Falha ao cadastrar dados";
		}

	}

	public function hasManyThrough()
	{
		$country = Country::find(2);

		echo "<strong> {$country->name} </strong><br>";

		$cities = $country->cities;

		foreach($cities as $city)
		{
			echo " {$city->name} -";
		}

		echo "<br> Total de cidades cadastradas - {$cities->count()} ";

	}
}
