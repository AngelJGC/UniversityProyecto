<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuardarScoreRequest;
use App\Models\Score;

class ScoreController extends Controller
{
    public function index(Request $request)
    {
      return Score::all();
    }

    public function store(GuardarScoreRequest $request)
    {
        $score = Score::create(
            $request->only('student_id', 'course_id', 'score')
        );
            return response()->json([
            'res' => true,
            'msg' => 'Score registrado correctamente'
        ],200);  
    }

    public function show(Request $request)
    {
       
    }

    public function update(ActualizarScoreRequest $request, Score $score)
    {
        $Score->update($request->all());
        return response()->json([
             'res' => true,
             'mesaje' => 'Score Actualizado'
        ],200);
        $Score->save();

    }

}
