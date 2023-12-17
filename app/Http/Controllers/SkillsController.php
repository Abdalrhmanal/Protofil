<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SkillsController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return response()->json(['data' => $skills], 200);
    }

    public function show($id)
    {
        $skills = Skill::where('user_id', $id)->get();
        return response()->json(['data' => $skills], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'word_skills' => 'nullable|string',
            'skill' => 'nullable|string',
            'ratio' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $skills = Skill::create($request->all());

        return response()->json(['data' => $skills], 201);
    }

    public function update(Request $request, $id)
    {
        $skills = Skill::find($id);

        if (!$skills) {
            return response()->json(['message' => 'Skills not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'word_skills' => 'nullable|string',
            'skill' => 'nullable|string',
            'ratio' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $skills->update($request->all());

        return response()->json(['data' => $skills], 200);
    }

    public function destroy($id)
    {
        $skills = Skill::find($id);

        if (!$skills) {
            return response()->json(['message' => 'Skills not found'], 404);
        }

        $skills->delete();

        return response()->json(['message' => 'Skills deleted successfully'], 200);
    }
    
}
