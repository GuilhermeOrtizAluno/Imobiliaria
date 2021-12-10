<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function list()
    {
        $cities = City::all();

        return response()->json([
            "cities" => $cities
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $city = new City();
        $city->description = $request->input('description');
        $city->save();

        return response()->json([
            "message" => "city created"
        ], 201);
    }

    public function delete($id)
    {
        $city = City::find($id);
        $city->delete();
        
        return response()->json([
            "message" => "city deleted"
        ], 200);
    }
}
