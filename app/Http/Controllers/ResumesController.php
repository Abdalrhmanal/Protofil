<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResumesController extends Controller
{
    public function index()
    {
        $resumes = Resume::all();
        return response()->json(['data' => $resumes], 200);
    }

    public function show($id)
    {
        $resume = Resume::with(['education', 'professionalExperience'])->find($id);

        if (!$resume) {
            return response()->json(['message' => 'Resume not found'], 404);
        }

        return response()->json(['data' => $resume], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'stor_teach' => 'required|string',
            'id_education' => 'nullable|exists:educations,id',
            'id_pexperience' => 'nullable|exists:pexperiences,id',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $resume = Resume::create($request->all());

        return response()->json(['data' => $resume], 201);
    }

    public function update(Request $request, $id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['message' => 'Resume not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'stor_teach' => 'required|string',
            'id_education' => 'nullable|exists:educations,id',
            'id_pexperience' => 'nullable|exists:pexperiences,id',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $resume->update($request->all());

        return response()->json(['data' => $resume], 200);
    }

    public function destroy($id)
    {
        $resume = Resume::find($id);

        if (!$resume) {
            return response()->json(['message' => 'Resume not found'], 404);
        }

        $resume->delete();

        return response()->json(['message' => 'Resume deleted successfully'], 200);
    }
}
