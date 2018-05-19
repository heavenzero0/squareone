<?php

namespace App\Http\Controllers\Api\Auth;

use App\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class RegisterController extends ApiController
{

    public function register(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
        ];

        $this->validate($request, $rules);

        event(new Registered($this->create($request->all())));
        $http = new Client;

        $data = $http->post('squareone.test/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => env('PASSWORD_CLIENT_ID'),
                'client_secret' =>  env('PASSWORD_CLIENT_SECRET'),
                'username' => $request->get('email'),
                'password' => $request->get('password'),
            ]
        ]);
        $data = json_decode((string)$data->getBody(), true);

        $email = $request->all();
        $user = $email['email'];
        $id = User::where('email', $user)->first()->id;
        $data['id'] = $id;

        return response()->json([
            'data' => [
                'token'=> $data,
                'email' => $user,
            ],
        ], 200);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
