<?php

namespace App\Http\Controllers;

use App\Models\Infouser;
use App\Models\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class UserInfoController extends Controller
{
    public function index()
    {
        // استرجاع كل سجلات الجدول
        $Infouser = Infouser::all();

        return response()->json(['data' => $Infouser], 200);
    }

    public function show($id)
    {
        // استرجاع سجل محدد بواسطة المعرف
        $userInfo = Infouser::find($id);

        if (!$userInfo) {
            return response()->json(['message' => 'User info not found'], 404);
        }

        return response()->json(['data' => $userInfo], 200);
    }

    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'work'=> 'required|string',
            'storbi'=> 'string',
            'img_background'=> 'string',
            'basic_work'=> 'string',
            'about'=> 'string',
            'phone_email_one'=> 'string',
            'degree'=> 'string',
            'age'=> 'string',
            'city'=> 'string',
            'phone'=> 'string',
            'birthday'=> 'string',
            'birthday'=> 'string',
            'freelance'=> 'string',
            'motivation_letter'=> 'required|string',
            'facebook'=> 'string',
            'linkedin'=> 'string',
            'instagram'=> 'string',
            'github'=> 'string',
            'tytar_x'=> 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // إنشاء سجل جديد
        $userInfo = Infouser::create($request->all());

        return response()->json(['data' => $userInfo], 201);
    }

    public function update(Request $request, $id)
    {
        // البحث عن السجل المحدد بواسطة المعرف
        $userInfo = Infouser::find($id);

        if (!$userInfo) {
            return response()->json(['message' => 'User info not found'], 404);
        }

        // التحقق من البيانات المدخلة
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|string',
            'work'=> 'required|string',
            'storbi'=> 'string',
            'img_background'=> 'string',
            'basic_work'=> 'string',
            'about'=> 'string',
            'phone_email_one'=> 'string',
            'degree'=> 'string',
            'age'=> 'string',
            'city'=> 'string',
            'phone'=> 'string',
            'birthday'=> 'string',
            'freelance'=> 'string',
            'motivation_letter'=> 'required|string',
            'facebook'=> 'string',
            'linkedin'=> 'string',
            'instagram'=> 'string',
            'github'=> 'string',
            'tytar_x'=> 'string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        // تحديث السجل
        $userInfo->update($request->all());

        return response()->json(['data' => $userInfo], 200);
    }

    public function destroy($id)
    {
        // البحث عن السجل المحدد بواسطة المعرف
        $userInfo = Infouser::find($id);

        if (!$userInfo) {
            return response()->json(['message' => 'User info not found'], 404);
        }

        // حذف السجل
        $userInfo->delete();

        return response()->json(['message' => 'User info deleted successfully'], 200);
    }
}
