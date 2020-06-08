<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\Question;
use App\Option;
use App\TestAnswer;
//use App\User;
//use Auth;
//use DB;
use Illuminate\Support\Facades\Storage;

class TestsController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        // $topics = Topic::inRandomOrder()->limit(10)->get();
        $questions = Question::inRandomOrder()->limit(5)->get();
        foreach ($questions as &$question) {
            $question->options = Option::where('Q_id', $question->id)->inRandomOrder()->get();
        }

    return view('tests.index', compact('questions'))->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $questions = Question::inRandomOrder()->limit(5)->get();
        foreach ($questions as &$question) {
            $question->options = Option::where('Q_id', $question->id)->inRandomOrder()->get();
        }
        return view('tests.take', compact('questions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = 0;

        $test = new Test;
        $test->user_id = auth()->user()->id;
        $test->result = $result;
        $test->save();

        foreach ($request->input('questions', []) as $key => $question) {
            $status = 0;

            if ($request->input('answers.'.$question) != null
                && Option::find($request->input('answers.'.$question))->correct
            ) {
                $status = 1;
                $result++;
            }
            TestAnswer::create([
                'U_id'      => auth()->user()->id,
                'T_id'      => $test->id,
                'Q_id'      => $question,
                'O_id'      => $request->input('answers.'.$question),
                'correct'   => $status,
            ]);
        }

        $test->result = $result;
        $test->save();
        //$test->update(['result' => $result]);
        return redirect()->route('results.show', [$test->id]);
        return redirect('/dashboard')->with('success', 'Test Submitted');
    }
}
