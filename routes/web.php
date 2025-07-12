<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});


route::get('/contact', function(){
    return view('contact');
});

Route::get('/jobs',function (){
    return view('jobs',[
        'jobs' => [
            [
                'id' =>1,
                'title' => 'Director',
                'salary'=> '$1000'   
            ],
            [
                'id'=>2,
                'title' => 'Manager',
                'salary'=> '$800'   
            ],
            [
                'id'=> 3,
                'title' => 'Developer',
                'salary'=> '$600'   
            ],
            [
                'id'=> 4,
                'title' => 'Designer',
                'salary'=> '$500'   
            ]
        ]
    ]);
});


Route::get('/jobs/{id}', function($id){
    $jobs = [
        [
            'id'=> 1,
            'title'=> 'Director',
            'salary'=> '$1000'
        ],
        [
            'id'=> 2,
            'title'=> 'Manager',
            'salary'=> '$800'
        ],
        [
            'id'=> 3,
            'title'=> 'Developer',
            'salary'=> '$600'
        ],
        [
            'id'=> 4,
            'title'=> 'Designer',
            'salary'=> '$500'
        ]
    ];
    
    $job = Arr::first($jobs, fn($job) => $job['id'] == $id);
    // dd($job);
    

    return view('job', ['job' => $job]);
});