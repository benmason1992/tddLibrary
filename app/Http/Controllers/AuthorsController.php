<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
{
    public function store()
    {
        Author::create($this->validateRequest());
    }

    private function validateRequest() 
    {
        return request()->validate([
            'name' => 'required',
            'dob' => 'required'
        ]);
    }
}
