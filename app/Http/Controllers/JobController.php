<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index() {
        return Job::all();
    }
    
    public function store(Request $request) {
        $job = Job::create($request->all());
        return response()->json($job, 201);
    }
    
}
