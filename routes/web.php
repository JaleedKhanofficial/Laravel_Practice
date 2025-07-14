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
    return view('jobs',[
        'jobs' => Job::all()
    ]);
});


Route::get('/jobs/{id}', function($id) {
    
    $job = Job::find($id);

    return view('job', ['job' => $job]);
});


//2:02:07