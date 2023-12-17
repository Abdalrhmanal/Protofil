<?php

namespace App\Http\Controllers;

use App\Models\PExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PExperiencesController extends Controller
{
    public function index()
    {
        $pexperiences = PExperience::all();
        return response()->json(['data' => $pexperiences], 200);
    }

    public function show($id)
    {
        $pexperience = PExperience::find($id);

        if (!$pexperience) {
            return response()->json(['message' => 'Professional experience not found'], 404);
        }

        return response()->json(['data' => $pexperience], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'data_start' => 'required|date',
            'data_end' => 'nullable|date',
            'enterprise' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pexperience = PExperience::create($request->all());

        return response()->json(['data' => $pexperience], 201);
    }

    public function update(Request $request, $id)
    {
        $pexperience = PExperience::find($id);

        if (!$pexperience) {
            return response()->json(['message' => 'Professional experience not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'data_start' => 'required|date',
            'data_end' => 'nullable|date',
            'enterprise' => 'required|string',
            'description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $pexperience->update($request->all());

        return response()->json(['data' => $pexperience], 200);
    }

    public function destroy($id)
    {
        $pexperience = PExperience::find($id);

        if (!$pexperience) {
            return response()->json(['message' => 'Professional experience not found'], 404);
        }

        $pexperience->delete();

        return response()->json(['message' => 'Professional experience deleted successfully'], 200);
    }
}
