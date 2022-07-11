<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\GuardarCourseRequest;
use App\Http\Requests\ActualizarCourseRequest;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    public function index(Request $request)
    {
      return Course::all();
    }

    public function store(GuardarCourseRequest $request)
    {
        $course = Course::create(
            $request->only('name')
            + [
                'code' => Str::random(10)
            ]
        );
        
        $course->users()->attach($request->users);
            return response()->json([
            'res' => true,
            'msg' => 'Course guardado correctamente'
        ],200);  

    } 

    public function show(Request $request)
    {
       
    }

    public function update(ActualizarCourseRequest $request, Course $course)
    {
        $course->update($request->all());


        return response()->json([
             'res' => true,
             'mesaje' => 'Course Actualizado'
        ],200);
        $course->save();

    }

    public function destroy(Course $course)
    {
        $course->delete();

        $course->users()->detach();


        return response()->json([
             'res' => true,
             'mesaje' => 'Course Eliminado'
        ],200);
    }   
}
