<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Job;

class JobController extends Controller
{
    public function index(){
         // $jobs = Job::all();   //lazy loading
        // $jobs = Job::with('employer')->get(); // eager loading
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index',[
            'jobs' => $jobs
        ]);
    }
}
