<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TestimonialsController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return response()->json(['data' => $testimonials], 200);
    }

    public function show($id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json(['message' => 'Testimonial not found'], 404);
        }

        return response()->json(['data' => $testimonial], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_t' => 'required|string',
            't_type' => 'required|string',
            't_description' => 'required|string',
            't_whatsapp' => 'string|nullable',
            't_linkedin' => 'string|nullable',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $testimonial = Testimonial::create($request->all());

        return response()->json(['data' => $testimonial], 201);
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json(['message' => 'Testimonial not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name_t' => 'required|string',
            't_type' => 'required|string',
            't_description' => 'required|string',
            't_whatsapp' => 'string|nullable',
            't_linkedin' => 'string|nullable',
            'id_user' => 'required|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $testimonial->update($request->all());

        return response()->json(['data' => $testimonial], 200);
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::find($id);

        if (!$testimonial) {
            return response()->json(['message' => 'Testimonial not found'], 404);
        }

        $testimonial->delete();

        return response()->json(['message' => 'Testimonial deleted successfully'], 200);
    }
}
