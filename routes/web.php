<?php
 
use Illuminate\Support\Facades\Route;
use App\Models\Job;



Route::get('/', function () {
    return view('home');
});


route::get('/contact', function(){
    return view('contact');
});


//index
Route::get('/jobs',function () {
   
});

//create
Route::get('/jobs/create',function(){
    return view('jobs.create');
});



//show
Route::get('/jobs/{job}', function(Job $job) {
    
    // $job = Job::find($id);

    return view('jobs.show', ['job' => $job]);
});

//store 
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

//edit
Route::get('/jobs/{job}/edit', function(Job $job) {
    
    // $job = Job::find($id);

    return view('jobs.edit', ['job' => $job]);
});

//update
Route::patch('/jobs/{job}', function(Job $job) {
   // validate
   request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', '']

    ]);

   //authorize

   //update
    // $job = Job::findOrFail($id);

    $job->update([
        'title' => request('title'),
        'salary'=>request('salary')
    ]);
   //and persist
   //rediret to the job page
   return redirect('/jobs/' . $job->id);
});

//destroy
Route::delete('/jobs/{job}', function(Job $job) {
    $job->delete();
    return redirect('/jobs');
    
   
});

//3:52:51