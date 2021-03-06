<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\GuardarStudentRequest;
use App\Http\Requests\ActualizarStudentRequest;
use App\Models\User;

class StudentController extends Controller
{
    public function index(Request $request)
    {
      return $user = User::where('user_id', 'student')->get();
    }

    public function store(GuardarStudentRequest $request)
    {
        $user = User::create(
            $request->only('name', 'email')
            + [
                'user_id' => 'student',
                'password' => bcrypt($request->input('password')),
                'code' => Str::random(10)
            ]
        );
            return response()->json([
            'res' => true,
            'msg' => 'Student guardado correctamente'
        ],200);  
    }

    public function show(Request $request)
    {
       
    }

    public function update(ActualizarStudentRequest $request, User $user)
    {
        $user->update($request->all());
        $data = $request->only( 'name', 'email', 'password', 'user_id');
        $password = $request->input('password');
          if($password)
            $data['password'] = bcrypt($password);


        $user->fill($data);
        $user->save();

        return response()->json([
             'res' => true,
             'mesaje' => 'Student Actualizado'
        ],200);  
       
    }

    public function destroy(Request $request)
    {

    }
}
