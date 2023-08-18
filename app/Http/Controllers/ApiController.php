<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function index() {
        return ['name' => 'Haider Ali', 'email' => 'haider@gmail.com'];
    }

    public function store(Request $request) {
        return ['data' => 'Hello '.$request->name];        
    }
}
