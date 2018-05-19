<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{

    const BEGINNER = 'Beginner';
    const INTERMEDIATE = 'Intermediate';
    const ADVANCED = 'Advanced';
    const EXPERT = 'Expert';

    protected $fillable = [
        'name', 'template', 'firstName', 'lastName', 'address', 'country', 'zipCode', 'phone', 'email', 'summary', 'skill',
        'level', 'companyName', 'jobTitle', 'location', 'fromMonth', 'fromYear', 'toMonth', 'toYear', 'degree',
        'school', 'educationLocation', 'gradYear', 'user_id',
    ];



}
