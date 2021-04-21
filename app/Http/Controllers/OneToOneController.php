<?php
namespace App\Http\Controllers;
use App\Model\Country;
use App\Model\Location;
use Illuminate\Http\Request;




class OneToOneController extends Controller
{



    public function OneToOne()
    {
    	//Busca por Id
    	// $country = Country::find(2)s;

    	//Busca por nome
    	$country = Country::where('name', '=', 'Estados Unidos')->get()->first();

    	echo $country->name;


    	// $location = $country->location;

    	$location = $country->location()->get()->first();
    	echo "  -  Latitude: {$location->latitude}";
    	echo " - Longitude: {$location->longitude}<hr>";


    }
    public function Invers()
    {
    	$latitude = 123;
    	$longitude = 232;

    	$location = Location::where('latitude', '=', $latitude)->where('longitude','=',$longitude)->get()->first();

    	echo $location->name;

    	$country = $location->country;

    	echo "Name: {$country->name} - Longitude: $longitude <hr>";

    }

    public function Insert()
    {
        $dataForm = [
            'name' => 'India',
            'latitude' => '344',
            'longitude' => '443'
        ];

        
        $country = Country::create($dataForm);

        $location = $country->location()->create($dataForm);


        // $dataForm['country_id'] = $country->id;

        // $location = Location::create($dataForm);

        // $location = new Location();
        
        // $location->longitude = $dataForm['longitude'];
        
        // $location->latitude = $dataForm['latitude'];
        
        // $location->country_id = $country->id;
        
        // $saveLocation = $location->save();

        // if($saveLocation)
        // {
        //     echo "Salvo com sucesso";
        // }
    }
}
