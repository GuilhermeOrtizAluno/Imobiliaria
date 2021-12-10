<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    public function list()
    {
        $types = Type::all();

        return response()->json([
            "types" => $types
        ], 200);
    }

    public function create(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);

        $type = new Type();
        $type->description = $request->input('description');
        $type->save();

        return response()->json([
            "message" => "Type created"
        ], 201);
    }

    public function delete($id)
    {
        $type = Type::find($id);
        $type->delete();

        return response()->json([
            "message" => "Type deleted"
        ], 200);
    }
}
