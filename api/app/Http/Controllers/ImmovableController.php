<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Immovable;
use App\Models\City;
use App\Models\District;
use App\Models\Type;
use App\Models\Address;

class ImmovableController extends Controller
{

    public function list()
    {
        $immovables = DB::table('immovables as i')
                            ->join('types as t', 't.id', '=', 'i.type_id')
                            ->join('addresses as e', 'e.id', '=', 'i.address_id')
                            ->join('cities as c', 'c.id', '=', 'e.city_id')
                            ->join('districts as d', 'd.id', '=', 'e.district_id')
                            ->select('i.id', 'i.reference', 'i.description', 'i.value', 't.description as type', 'e.cep', 'e.street', 'e.number', 'c.description as city', 'd.description as district')
                            ->get();

        return response()->json([
            "immovables" => $immovables
        ], 200);
    }

    public function show($id)
    {
        $immovable = DB::table('immovables as i')
                            ->join('types as t', 't.id', '=', 'i.type_id')
                            ->join('addresses as e', 'e.id', '=', 'i.address_id')
                            ->join('cities as c', 'c.id', '=', 'e.city_id')
                            ->join('districts as d', 'd.id', '=', 'e.district_id')
                            ->select('i.id', 'i.reference', 'i.description', 'i.value', 't.description as type', 'e.cep', 'e.street', 'e.number', 'c.description as city', 'd.description as district')
                            ->where('i.id', $id)
                            ->first();

        return response()->json([
            "immovable" => $immovable
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'reference'     => 'required',
            'description'   => 'required',
            'value'         => 'required',
            'type_id'       => 'required',
            'cep'           => 'required',
            'street'        => 'required',
            'number'        => 'required',
            'city_id'       => 'required',
            'district_id'   => 'required',
        ]);

        $address = new Address();
        $address->cep = $request->input('cep');
        $address->street = $request->input('street');
        $address->number = $request->input('number');
        $address->city_id = $request->input('city_id');
        $address->district_id = $request->input('district_id');
        $address->save();

        $immovable = new Immovable();
        $immovable->reference = $request->input('reference');
        $immovable->description = $request->input('description');
        $immovable->value = $request->input('value');
        $immovable->type_id = $request->input('type_id');
        $immovable->address_id = $address->id;
        $immovable->save();

        return response()->json([
            "message" => "immovable created"
        ], 201);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => "required"
        ]);

        $immovable = Immovable::find($request->input('id'));
        $immovable->reference = $request->input('reference');
        $immovable->description = $request->input('description');
        $immovable->value = $request->input('value');
        $immovable->type_id = $request->input('type_id');
        $immovable->save();

        $address_id = $immovable->address_id;
        $address = Address::find($address_id);
        $address->cep = $request->input('cep');
        $address->street = $request->input('street');
        $address->number = $request->input('number');
        $address->city_id = $request->input('city_id');
        $address->district_id = $request->input('district_id');
        $address->save();

        return response()->json([
            "message" => "immovable updated"
        ], 200);
    }

    public function delete($id)
    {
        $immovable = Immovable::find($id);

        $address_id = $immovable->address_id;
        $address = Address::find($address_id);
        $address->delete();

        $immovable->delete();

        return response()->json([
            "message" => "immovable deleted"
        ], 200);
    }
}
