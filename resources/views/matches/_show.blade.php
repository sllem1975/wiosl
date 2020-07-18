@extends('home')

@section('content')

<div class="container mt-4 mb-3">

    <div class="row justify-content-center ">

        <div class="col-md-12 col-lg-12 col-sm-12 pull-left">

            <div class="card">
                <div class="card-header bg-info ">
                    <h5 class="text-white font-weight-bold ">Match Info</h5>
                </div>
                <div class="card-body">
                    <!-- Example to create form -->
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12 ">

                            <!-- for this form I use method POST and the action rout is companies.update/1 -->
                            {{-- <form method="post" action="{{ route('matches.store') }}"> --}}
                                {{-- {{ csrf_field() }} --}}
                                <!--  this if for create a key for hidden the information and avoid hackers-->

                                <!-- <input type="hidden" name="_method" value="put"> we don't need this method-->
                                <div class="form-group row">
                                    <label for="game_id" class="col-sm-2 col-form-label font-weight-bold">Game ID: </label>
                                    <div class="col-sm-10">
                                    <input type="text" class="form-control font-weight-bold" 
                                    id="game_id" 
                                    style="width:150px;"  
                                    value="{{ $match->id }}"  
                                    name="game_id">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="season_id"
                                        class="col-sm-2 col-form-label font-weight-bold">Season:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control text-danger font-weight-bold" 
                                        style="width:250px;"
                                        name="season_id"
                                            id="season_id">
                                            @foreach($season as $season)
                                            <option value="{{$season->id}}"
                                                @if ($season->id === $match->season_id)
                                                selected                                                    
                                                @endif
                                                >{{$season->season_name}}
                                                - ({{ $season->date_start }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="week" class="col-sm-2 col-form-label font-weight-bold">Game Week: </label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control font-weight-bold" 
                                    id="week" 
                                    style="width:150px;"  
                                    value="{{ $match->game_week }}"  
                                    name="week">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phase_id"
                                        class="col-sm-2 col-form-label font-weight-bold">Phase:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control font-weight-bold" 
                                        style="width:250px;"
                                        name="phase_id"
                                            id="phase_id">
                                            @foreach($phase as $phase)
                                            <option value="{{$phase->id}}"
                                                @if ($phase->id === $match->phase_id)
                                                    selected
                                                @endif
                                                >
                                                {{$phase->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="match_date"
                                        class="col-sm-2 col-form-label font-weight-bold">Date:</label>
                                    <div class="col-sm-10">
                                        <input placeholder="input date" id="match_date" type="datetime" name="date"
                                            style="width:250px;"
                                            class="date form-control text-primary font-weight-bold"
                                            onchange="invoicedue(event);"
                                            
                                            value="{{ date('Y-m-d h:i A', strtotime($match->date)) }}" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="hometeam"
                                        class="col-sm-2 col-form-label font-weight-bold">Home Team:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control text-success font-weight-bold" name="hometeam"
                                        style="width:250px;"
                                            id="hometeam">
                                            @foreach($hometeam as $hometeam)
                                            <option value="{{$hometeam->id}}"
                                                @if ($hometeam->id === $match->home_id)
                                                    selected
                                                @endif
                                                >
                                                {{$hometeam->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="home_score" class="col-sm-2 col-form-label font-weight-bold">Home Score: </label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control font-weight-bold" 
                                    style="width:150px;"
                                    id="home_score"
                                    value="{{ $match->home_score }}" 
                                        name="home_score">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="awayteam"
                                        class="col-sm-2 col-form-label font-weight-bold">Away Team:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control text-success font-weight-bold" 
                                        name="awayteam"
                                        style="width:250px;"
                                            id="awayteam">
                                            @foreach($awayteam as $awayteam)
                                            <option value="{{$awayteam->id}}" 
                                                @if ($awayteam->id === $match->away_id)
                                                    selected
                                                @endif
                                                >
                                                {{$awayteam->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="awayscore" class="col-sm-2 col-form-label font-weight-bold">Away Score: </label>
                                    <div class="col-sm-10">
                                    <input type="number" class="form-control font-weight-bold" 
                                    style="width:150px;"
                                    id="awayscore" 
                                    value="{{ $match->away_score }}"
                                        name="awayscore">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="stadium"
                                        class="col-sm-2 col-form-label font-weight-bold">Stadium:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control text-info font-weight-bold" name="stadium"
                                        style="width: 350px"
                                            id="stadium">
                                            @foreach($address as $address)
                                            <option value="{{$address->id}}"
                                                @if ($address->id === $match->stadium_id)
                                                    selected
                                                @endif
                                                >
                                                {{$address->name}} ( {{ $address->type }} )
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="status"
                                        class="col-sm-2 col-form-label font-weight-bold">Status:</label>
                                    <div class="col-sm-10">
                                        <select class="form-control text-secondary font-weight-bold" name="status"
                                        style="width:250px;"
                                            id="status">
                                            @foreach($status as $status)
                                            <option value="{{$status->id}}"
                                                @if ($status->id === $match->status_id)
                                                    selected
                                                @endif
                                                >
                                                {{$status->name}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="observation"
                                        class="col-sm-2 col-form-label font-weight-bold">observation:</label>
                                    <div class="col-sm-10">
                                        <textarea 
                                        class="form-control" 
                                        id="observation"
                                        rows="3"
                                        value="{{ $match->observation }}"
                                        name="observation"
                                            ></textarea>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                </div> --}}

                                <div class="col-2">
                                    <ol id="printNone" class="list-unstyled">
                                        <li id="printNone"><a href="{{ route('matches.index') }}" class="btn btn-success ">Back Matches</a></li>
                                    </ol>		  
                                </div>

                            {{-- </form> --}}

                        </div>
                    </div>

                </div>
            </div>
        </div>



</div>


@endsection
<!-- Scripts -->
@push('javascript')
<script src="{{ asset('js/matches_hidden.js') }}"></script>
@endpush