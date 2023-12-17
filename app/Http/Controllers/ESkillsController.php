<?php

namespace App\Http\Controllers;

use App\Models\Eskill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ESkillsController extends Controller
{
    public function index()
    {
        $skills = ESkill::all();
        return response()->json(['data' => $skills], 200);
    }

    public function show($id)
    {
        $skill = ESkill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        return response()->json(['data' => $skill], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_skill' => 'string',
            'ratio' => 'required|integer',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $skill = ESkill::create($request->all());

        return response()->json(['data' => $skill], 201);
    }

    public function update(Request $request, $id)
    {
        $skill = Eskill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name_skill' => 'string',
            'ratio' => 'required|integer',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $skill->update($request->all());

        return response()->json(['data' => $skill], 200);
    }

    public function destroy($id)
    {
        $skill = ESkill::find($id);

        if (!$skill) {
            return response()->json(['message' => 'Skill not found'], 404);
        }

        $skill->delete();

        return response()->json(['message' => 'Skill deleted successfully'], 200);
    }
}
