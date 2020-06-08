<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\TestAnswer;
use App\Question;
use App\Result;
use Auth;
use DB;
use Illuminate\Support\Facades\Storage;

class ResultsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $test = Test::find($id)->load('user');
        
        if ($test) {
            $results = TestAnswer::where('T_id', $id)
                ->with('question')
                ->with('question.options')
                ->get()
            ;
        }

        //return $results;
        return view('tests.show')->with(compact('test', 'results'));
    }
}