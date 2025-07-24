<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use \Illuminate\Support\Facades\Mail;
use \App\Mail\JobPosted;

class JobController extends Controller
{
    public function index(){
        // $jobs = Job::all();   //lazy loading
        // $jobs = Job::with('employer')->get(); // eager loading
        $jobs = Job::with('employer')->latest()->simplePaginate(3);
        return view('jobs.index',[
            'jobs'=>$jobs
        ]);
    }

    public function create(){
        return view('jobs.create');
    }

    public function show(Job $job){
        // $job = Job::find($id);
        return view('jobs.show', ['job' => $job]);
    }

    public function store(){
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', '']

    ]);

    $job = Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);

    Mail::to($job->employer->user)->queue(
        new JobPosted($job)
    );

    return redirect('/jobs');

    }

    public function edit(Job $job){
        return view('jobs.edit',['job'=>$job]);
    }

    public function update(Job $job){
        Gate::authorize('edit-job',$job);
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
   return redirect('/jobs/' . $job->$job);
    }

    public function destroy(Job $job){
        Gate::authorize('edit-job',$job);
         $job->delete();
        return redirect('/jobs');
    }

}
