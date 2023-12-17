<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EducationsController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        return response()->json(['data' => $educations], 200);
    }

    public function show($id)
    {
        $education = Education::find($id);

        if (!$education) {
            return response()->json(['message' => 'Education not found'], 404);
        }

        return response()->json(['data' => $education], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'data_start' => 'required|date',
            'data_end' => 'nullable|date',
            'enterprise' => 'required|string',
            'course_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $education = Education::create($request->all());

        return response()->json(['data' => $education], 201);
    }

    public function update(Request $request, $id)
    {
        $education = Education::find($id);

        if (!$education) {
            return response()->json(['message' => 'Education not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string',
            'data_start' => 'required|date',
            'data_end' => 'nullable|date',
            'enterprise' => 'required|string',
            'course_description' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $education->update($request->all());

        return response()->json(['data' => $education], 200);
    }

    public function destroy($id)
    {
        $education = Education::find($id);

        if (!$education) {
            return response()->json(['message' => 'Education not found'], 404);
        }

        $education->delete();

        return response()->json(['message' => 'Education deleted successfully'], 200);
    }
}
