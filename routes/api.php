<?php
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\EducationsController;
use App\Http\Controllers\ESkillsController;
use App\Http\Controllers\PExperiencesController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SkillsController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\UserInfoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::get('userinfo', [UserInfoController::class, 'index']);
Route::get('userinfo/{id}', [UserInfoController::class, 'show']);
Route::post('userinfo', [UserInfoController::class, 'store']);
Route::put('userinfo/{id}', [UserInfoController::class, 'update']);
Route::delete('userinfo/{id}', [UserInfoController::class, 'destroy']);



Route::get('skills', [SkillsController::class, 'index']);
Route::get('skills/{id}', [SkillsController::class, 'show']);
Route::post('skills', [SkillsController::class, 'store']);
Route::put('skills/{id}', [SkillsController::class, 'update']);
Route::delete('skills/{id}', [SkillsController::class, 'destroy']);



Route::get('resumes', [ResumesController::class, 'index']);
Route::get('resumes/{id}', [ResumesController::class, 'show']);
Route::post('resumes', [ResumesController::class, 'store']);
Route::put('resumes/{id}', [ResumesController::class, 'update']);
Route::delete('resumes/{id}', [ResumesController::class, 'destroy']);


Route::get('educations', [EducationsController::class, 'index']);
Route::get('educations/{id}', [EducationsController::class, 'show']);
Route::post('educations', [EducationsController::class, 'store']);
Route::put('educations/{id}', [EducationsController::class, 'update']);
Route::delete('educations/{id}', [EducationsController::class, 'destroy']);



Route::get('pexperiences', [PExperiencesController::class, 'index']);
Route::get('pexperiences/{id}', [PExperiencesController::class, 'show']);
Route::post('pexperiences', [PExperiencesController::class, 'store']);
Route::put('pexperiences/{id}', [PExperiencesController::class, 'update']);
Route::delete('pexperiences/{id}', [PExperiencesController::class, 'destroy']);



Route::get('eskills', [ESkillsController::class, 'index']);
Route::get('eskills/{id}', [ESkillsController::class, 'show']);
Route::post('eskills', [ESkillsController::class, 'store']);
Route::put('eskills/{id}', [ESkillsController::class, 'update']);
Route::delete('eskills/{id}', [ESkillsController::class, 'destroy']);



Route::get('projects', [ProjectsController::class, 'index']);
Route::get('projects/{id}', [ProjectsController::class, 'show']);
Route::post('projects', [ProjectsController::class, 'store']);
Route::put('projects/{id}', [ProjectsController::class, 'update']);
Route::delete('projects/{id}', [ProjectsController::class, 'destroy']);



Route::get('services', [ServicesController::class, 'index']);
Route::get('services/{id}', [ServicesController::class, 'show']);
Route::post('services', [ServicesController::class, 'store']);
Route::put('services/{id}', [ServicesController::class, 'update']);
Route::delete('services/{id}', [ServicesController::class, 'destroy']);



Route::get('testimonials', [TestimonialsController::class, 'index']);
Route::get('testimonials/{id}', [TestimonialsController::class, 'show']);
Route::post('testimonials', [TestimonialsController::class, 'store']);
Route::put('testimonials/{id}', [TestimonialsController::class, 'update']);
Route::delete('testimonials/{id}', [TestimonialsController::class, 'destroy']);



Route::get('contacts', [ContactsController::class, 'index']);
Route::get('contacts/{id}', [ContactsController::class, 'show']);
Route::post('contacts', [ContactsController::class, 'store']);
Route::put('contacts/{id}', [ContactsController::class, 'update']);
Route::delete('contacts/{id}', [ContactsController::class, 'destroy']);

