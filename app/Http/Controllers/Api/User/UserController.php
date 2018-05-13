<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    public function index()
    {
        $users = User::all();

        return $this->showAll($users);
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);


        $user = User::create($data);

        return response()->json(['data' => $user], 201);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return $this->showOne($user);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
