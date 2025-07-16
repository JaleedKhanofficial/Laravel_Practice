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
    $jobs = Job::with('employer')->latest()->simplePaginate(3);
    return view('jobs.index',[
        'jobs' => $jobs
    ]);
});


Route::get('/jobs/create',function(){
    return view('jobs.create');
});


Route::get('/jobs/{id}', function($id) {
    
    $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});


Route::post('/insertJobs', function(){
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', '']

    ]);

    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    return redirect('/jobs');
});


//3:52:51