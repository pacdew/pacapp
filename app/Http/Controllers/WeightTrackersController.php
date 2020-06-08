<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\weightTracker;
use Carbon\carbon;

class WeightTrackersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //display a graph of the past week of weights input...
        $weightTrackers = WeightTracker::orderBy('created_at', 'desc')->take(7)->get();
        return view('weightTrackers.index')->with('weightTrackers', $weightTrackers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        $weightTrackers = WeightTracker::whereDate('created_at', Carbon::today())->get();
        if( $weightTrackers == '[..]'){//there IS a post created on the current day = edit
            echo $weightTrackers;
            echo "Post";
        }
        else if($weightTrackers !== '[...]'){//There is no post created on the current day = create
            echo $weightTrackers;
            echo "no post";
            return view('weightTrackers.create');
        }
        else{
            echo "I DON'T KNOW ANY MORE";
        }
        */
        return view('weightTrackers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'weight' => 'required']);
        //create post
        $weightTracker = new WeightTracker;
        $weightTracker->weight = $request->input('weight');
        $weightTracker->user_id = auth()->user()->id;
        $weightTracker->save();
        return redirect('/weightTrackers')->with('success', 'Weight Successfully added for the day.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $weightTracker = WeightTracker::find($id);
        //return $post->user;
        return view('weightTrackers.show')->with('weightTrackers', $weightTracker);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
