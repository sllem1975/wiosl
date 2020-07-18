<?php

namespace App\Http\Controllers;
// use App\Stadium;
use App\Match;
use App\Status;
use App\Season;
use App\Team;
use App\Address;
use App\User;
use App\Phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // for authorization input and validation


class WelcomesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$userAdmin = User::where('role_id','1')->count();
        // dd(Match::where('id','=',1)->with('team')->first());

        /* Laravel can enable ONLY_FULL_GROUP_BY when querying using config variable.
on config/datagase.php
set 'strict' => false
It should work.
        */

        $results = \DB::select('select * from results');
        // foreach ($results as $result) {
        //     var_dump($result->name);
        // }
        // $results = Result::all();
        //dd($results);
        
        // $matches =\DB::select('select * from matches where status_id = 1');
            // $match = $matches->status->name;
            // dd($match); 
        

            // if( Auth::check()  && Auth::user()->role_id == 1){

                $matches = Match::Where('season_id', '2')
                ->orderBy('season_id', 'DESC')
                ->orderBy('game_week', 'ASC')
                ->orderBy('date', 'DESC')->get();
                return view('welcome', ['matches'=>$matches, 'results'=>$results]);

                $games = Match::Where('season_id', '2')
                ->orderBy('season_id', 'DESC')
                ->orderBy('game_week', 'ASC')
                ->orderBy('date', 'DESC')->get();
                return view('welcome', ['matches'=>$matches, 'results'=>$results, 'games'=>$games]);

            // }

        // $matches = Match::all()->orderBy('season_id', 'DESC')
        // ->orderBy('game_week', 'ASC')
        // ->orderBy('date', 'DESC');

        //     // dd($matches);
        // return view('welcome', ['matches'=>$matches, 'results'=>$results]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Match $match)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        //
    }
}
