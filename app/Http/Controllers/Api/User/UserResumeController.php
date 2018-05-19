<?php

namespace App\Http\Controllers\Api\User;

use App\Resume;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class UserResumeController extends ApiController
{

    public function index(User $user)
    {
        $resume = $user->resumes;

        return $this->showAll($resume);
    }


    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'template' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'address' => 'required',
            'country' => 'required',
            'zipCode' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'summary' => 'required',
            'skill' => 'required',
            'level' => 'required',
            'companyName' => 'required',
            'jobTitle' => 'required',
            'location' => 'required',
            'fromMonth' => 'required',
            'fromYear' => 'required',
            'toMonth' => 'required',
            'toYear' => 'required',
            'degree' => 'required',
            'school' => 'required',
            'educationLocation' => 'required',
            'gradYear' => 'required',
            'user_id' => 'required',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $resume = Resume::create($data);

        return response()->json(['data' => $resume], 201);
    }


    public function show(User $user, $id)
    {
        $resume = Resume::findOrFail($id);
        return $this->showOne($resume);
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
