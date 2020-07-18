@extends('layouts.app')

@section('content')
<div class="container">

  <section id="title_team">
    <div>
      <h2 class="title text-white">Welcome to</h2>
      <h1 class="title text-white">WEST ISLAND OLDTIMERS SOCCER LEAGUE</h1>
    </div>
  </section>
  <section id="match">
    <div class="row">
      <div class="box col-12">
        {{-- <img class="img-fluid bgp1" src="/images/emilio-garcia-AWdCgDDedH0-unsplash.jpg" alt="background soccer league"> --}}
        <div class="img-title">
          {{-- <h1 class="text-white display-4 ">West Island Oldtimers</h1>
            <h1 class="text-white display-4 ">Soccer League</h1> --}}
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">

              @foreach($matches as $key => $match)
              {{-- <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li> --}}
              <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"
                class="{{$key == 0 ? 'active' : '' }}"></li>
              @endforeach
            </ol>
            <div class="carousel-inner">
              @foreach($matches as $key => $match)
              <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="card  mb-3">
                  <div class="card-header bg-dark text-white ">

                    <h5>{{ date('Y-m-d h:i A', strtotime($match->date)) }} </h5>
                    <h5>{{ $match->address->name }} - <span class="badge badge-success"> {{ $match->address->type}}
                      </span></h5>
                  </div>
                  <div class="card-body  ">
                    <div class="row">

                      <div class="col-md-6">
                        <h3 class="cart-title">{{ $match->team_home->name }} </h3>
                        @if($match->home_score > $match->away_score)
                        <h4> <span class="badge badge-primary"> {{ $match->home_score }} </span></h4>
                        @elseif($match->home_score == $match->away_score)
                        <h4> <span class="badge badge-success"> {{ $match->home_score }} </span></h4>
                        @else
                        <h4> <span class="badge badge-danger"> {{ $match->home_score }} </span></h4>
                        @endif

                      </div>
                      <div class="col-md-6">
                        <h3 class="cart-title ">{{ $match->team_away->name }}</h3>
                        @if($match->away_score > $match->home_score)
                        <h4> <span class="badge badge-primary"> {{ $match->away_score }} </span></h4>
                        @elseif($match->away_score == $match->home_score)
                        <h4> <span class="badge badge-success"> {{ $match->away_score }} </span></h4>
                        @else
                        <h4> <span class="badge badge-danger"> {{ $match->away_score }} </span></h4>
                        @endif

                      </div>

                    </div>
                  </div>
                  <div class="card-footer bg-dark">
                    <h6 class="text-white">{{ $match->address->address }}</h6>
                  </div>
                </div>
              </div>

              @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon bg-dark" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon bg-dark " aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

        </div>

      </div>


    </div>
  </section>
  {{-- matches --}}
  <section id="table" class="bg-light ">
    <div class="row ">
      <div class="col-12">
        <div class="table-responsive ">
          <table class="table table-hover table-striped table-bordered table-sm ">
            <thead class="bg-dark text-white">
              <tr>
                <th>#</th>
                <th>TEAM</th>
                <th>GP</th>
                <th>W</th>
                <th>L</th>
                <th>D</th>
                <th>GF</th>
                <th>GA</th>
                <th>GD</th>
                <th>PTS</th>


              </tr>
            </thead>
            <tbody>
              @foreach($results as $key => $result)
              <tr>
                <th scope="row">{{ $key+1 }}</th>
                <td>{{ $result->name }}</td>
                <td>{{ $result->GP }}</td>
                <td>{{ $result->W }}</td>
                <td>{{ $result->L }}</td>
                <td>{{ $result->D }}</td>
                <td>{{ $result->GF }}</td>
                <td>{{ $result->GA }}</td>
                <td>{{ $result->DF }}</td>
                <td>{{ $result->PTS }}</td>

              </tr>
              @endforeach
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </section>
  {{-- end matches --}}

  <section id="tab" class="bg-light mt-2 rounded">
    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
          aria-controls="pills-home" aria-selected="true">Matches</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
          aria-controls="pills-profile" aria-selected="false">Cards</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
          aria-controls="pills-contact" aria-selected="false">Games</a>
      </li>
    </ul>
    <div class="tab-content " id="pills-tabContent">
      <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
        {{-- matches --}}
        {{-- @foreach($matches as $game_week => $match_list)
          <h3 class="text-primary">  {{ $game_week }}  </h3>
        @endforeach --}}

        <section id="table" class="bg-light ">
          <div class="row ">
            <div class="col-12">
              <div class="table-responsive ">
                <table class="table table-hover table-striped table-bordered table-sm ">
                  <thead class="bg-dark text-white">
                    <tr>
                      {{-- <th>#</th> --}}
                      <th>Week</th>
                      <th>Date</th>
                      <th>Home Team</th>
                      <th>Home Score</th>
                      <th>Away Score</th>
                      <th>Away Team</th>
                      <th>Time</th>
                      <th>Field</th>
                      <th>Type</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($matches as $date => $match)
                    <tr>
                      {{-- <th scope="row">{{ $key+1 }}</th> --}}
                      <td>{{ $match->game_week }}</td>
                      {{-- <td>{{ $match->date->format('d-m-Y') }}</td> --}}
                      <td >{{ date('l d-m-Y', strtotime($match->date)) }}</td>   
                      <td>{{ $match->team_home->name }}</td>
                      <td>{{ $match->home_score }}</td>
                      <td>{{ $match->away_score }}</td>
                      <td>{{ $match->team_away->name }}</td>
                      {{-- <td>{{ $match->date }}</td> --}}
                      <td> {{ date('h:i A', strtotime($match->date)) }} </td>
                      <td>{{ $match->address->address }}</td>
                      <td>{{ $match->address->type }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </section>
        {{-- end matches --}}
      </div>
      <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">Games</div>
      
      <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">Cards</div>
    </div>
  </section>

</div>
@endsection