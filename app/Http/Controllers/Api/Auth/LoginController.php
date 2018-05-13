<?php

namespace App\Http\Controllers\Api\Auth;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class LoginController extends ApiController
{
    public function login(Request $request)
    {
        $rules = [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:6',
        ];

        $this->validate($request, $rules);

        $http = new Client();

        $data = $http->post('squareone.test'.'/oauth/token', [
            'form_params' => [
                'grant_type' => 'password',
                'client_id' => env('PASSWORD_CLIENT_ID'),
                'client_secret' =>  env('PASSWORD_CLIENT_SECRET'),
                'username' => $request->get('email'),
                'password' => $request->get('password'),
            ],

        ]);
        $data = json_decode((string)$data->getBody(), true);
        return response()->json(['data' => $data], 200);
    }
}
