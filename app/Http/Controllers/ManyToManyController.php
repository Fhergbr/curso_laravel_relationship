<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\City;
use App\Model\Company;

class ManyToManyController extends Controller
{
	public function ManyToMany()
	{
		$city = City::where('name','Curitiba')->get()->first();

		echo "<strong>{$city->name}</strong><br>";

		$companies = $city->companies;

		foreach($companies as $company)
		{
			echo " {$company->name} <br>";
		}
	}

	public function ManyToManyInverse()
	{
		$company = Company::where('name','Scorpion Programing')->get()->first();

		echo "<strong>{$company->name}<br></strong>";

		$cities = $company->cities;

		foreach ($cities as $city) {

			echo " {$city->name}<br> ";
		}

	}

	public function ManyToManyInsert()
	{
		$dataForm = [1,3,4]; 

		$company = Company::where('name','Bit a Bit')->get()->first();

		echo "<b> {$company->name} </b><br>";


		//Attach incrementa mais
		// $insertCompany = $company->cities()->attach($dataForm);
		
		//sync remove o que ja tem e deixa o que esta inserindo
		//$insertCompany = $company->cities()->sync($dataForm);

		//remove a cidade
		$company->cities()->detach([4]);

		$cities = $company->cities;

		foreach ($cities as $city) {

			echo " {$city->name}<br> ";
		}		

	}
}
