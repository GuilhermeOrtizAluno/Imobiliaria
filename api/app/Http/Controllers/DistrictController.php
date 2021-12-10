<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\City;
use App\Models\District;

class DistrictController extends Controller
{
    public function list()
    {
        $districts = DB::table('districts as d')
                        ->join('cities as c', 'c.id', '=', 'd.city_id')
                        ->select('d.id', 'c.description as city', 'd.description as district', 'd.created_at', 'd.updated_at')
                        ->get();

        return response()->json([
            "districts" => $districts
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'city_id' => 'required'
        ]);

        $district = new District();
        $district->description = $request->input('description');
        $district->city_id = $request->input('city_id');
        $district->save();

        return response()->json([
            "message" => "District created"
        ], 201);
    }

    public function delete($id)
    {
        $district = District::find($id);
        $district->delete();

        return response()->json([
            "message" => "District deleted"
        ], 200);
    }
}
