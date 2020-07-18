<?php

namespace App\Http\Controllers;

use App\Match;
use App\Status;
use App\Season;
use App\Team;
use App\Address;
use App\User;
use App\Phase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // for authorization input and validation

class MatchesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if( Auth::check()  && Auth::user()->role_id == 1){

            $matches = Match::Where('status_id', '1')
            ->orderBy('season_id', 'DESC')
            ->orderBy('game_week', 'ASC')
            ->orderBy('date', 'ASC')
            ->paginate(3);
            return view('matches.index', ['matches'=>$matches]);
        }
        return view('home');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if( Auth::check() && Auth::user()->role_id == 1 or Auth::user()->role_id == 2 ){
            //$users = User::all();
            //$users = User::orderBy('name', 'DESC')->get();
            $hometeam = Team::Where('status_id', '1')->orderBy('name', 'ASC')->get();
            $awayteam = Team::Where('status_id', '1')->orderBy('name', 'ASC')->get();
            $status = Status::all();
            $season = Season::Where('status_id', '1')->orderBy('id', 'DESC')->get();
            $address = Address::all();
            $phase = Phase::all();

            return view('matches._create', ['status'=>$status, 
            'season'=>$season, 
            'hometeam'=>$hometeam, 
            'awayteam'=>$awayteam,
            'address'=>$address,
            'phase' => $phase
            ]);
            }
            return view('auth.login');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::check()){
            $match = Match::create([
                'season_id' => $request->input('season_id'),
                'game_week' => $request->input('game_week'),
                'phase_id'=> $request->input('phase_id'),
                'home_id' => $request->input('home_id'),
                'home_score' => $request->input('home_score'),
                'away_id' => $request->input('away_id'),
                'away_score' => $request->input('away_score'),
                'stadium_id' => $request->input('stadium_id'),
                'date' => $request->input('date'),
                'user_id' => Auth::user()->id,
                'status_id' => $request->input('status_id'),
                'observation' => $request->input('observation'),
            ]);

            if($match){
                return redirect()->route('matches.show', ['match'=> $match->id])
                ->with('success', 'Match created successfully');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function show(Match $match)
    {
        $hometeam = Team::all();
        $awayteam = Team::all();
        $status = Status::all();
        $season = Season::all();
        $address = Address::all();
        $phase = Phase::all();

        $match = Match::find($match->id);

        return view('matches._show', ['match'=>$match, 
                                        'hometeam' =>$hometeam, 
                                        'awayteam' => $awayteam,
                                        'status' => $status,
                                        'season' => $season,
                                        'address' => $address,
                                        'phase' => $phase
                                        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function edit(Match $match)
    {
        $match = Match::find($match->id);

        $status = Status::all();
        $hometeam = Team::all();
        $awayteam = Team::all();
        $address = Address::all();
        $phase = Phase::all();
        $season = Season::all();
        

        // $status = Status::where('group','activity')->get();

        return view('matches._edit', ['match'=>$match, 
                    'status'=> $status, 
                    'hometeam'=> $hometeam,
                    'awayteam' => $awayteam,
                    'phase' => $phase,
                    'address' => $address,
                    'season' => $season,
                    ]);

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
        $matchUpdate = Match::where('id', $match->id)
                ->update([
                    'season_id' => $request->input('season_id'),
                    'game_week' => $request->input('game_week'),
                    'phase_id'=> $request->input('phase_id'),
                    'home_id' => $request->input('home_id'),
                    'home_score' => $request->input('home_score'),
                    'away_id' => $request->input('away_id'),
                    'away_score' => $request->input('away_score'),
                    'stadium_id' => $request->input('stadium_id'),
                    'date' => $request->input('date'),
                    'user_id' => Auth::user()->id,
                    'status_id' => $request->input('status_id'),
                    'observation' => $request->input('observation'),                        
                        ]);

        if($matchUpdate){
            return redirect()->route('matches.show', ['match'=>$match->id])
            ->with('success', 'Match updated successfully');
        }

        //redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Match  $match
     * @return \Illuminate\Http\Response
     */
    public function destroy(Match $match)
    {
        $findMatch = Match::find( $match->id );
            if($findMatch->delete()){
                //redirect
                return redirect()->route('matches.index')
                ->with('success' , 'Match deleted successfully');
            }
        return back()->withInput()->with('error' , 'Match could not be deleted'); 
    }
}
