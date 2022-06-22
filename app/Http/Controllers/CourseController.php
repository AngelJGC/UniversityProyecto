<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\GuardarCourseRequest;
use App\Models\Course;

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
            return response()->json([
            'res' => true,
            'msg' => 'Course guardado correctamente'
        ],200);  
    } 

    public function show(Request $request)
    {
       
    }

    public function update(Request $request)
    {
           
    }

    public function destroy(Request $request)
    {

    }   
}
