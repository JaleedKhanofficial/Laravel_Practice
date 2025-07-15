<?php
 
use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
    return view('home');
});


route::get('/contact', function(){
    return view('contact');
});

Route::get('/jobs',function () {
    // $jobs = Job::all();   //lazy loading
    // $jobs = Job::with('employer')->get(); // eager loading
    $jobs = Job::with('employer')->simplePaginate(3);
    return view('jobs',[
        'jobs' => $jobs
    ]);
});


Route::get('/jobs/{id}', function($id) {
    
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});


//3:07:00