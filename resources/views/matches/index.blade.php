@extends('home')
@section('content')
<div class="container ">
  <div class="card border-primary m-2">
    <div class=" card-header  border-primary headerForm">
      <i class="fas fa-users fa-2x text-primary mt-3"></i>
      <h2 class="d-inline text-primary text-center  mt-3">Matches</h2>
    </div>
    <div class="card-body">

      <div class="input-group col-md-5 mb-2  ">
        <input class="form-control py-2 border-success" type="search" placeholder="Search by any field" id="myInput">
        <span class="input-group-append ">
          <button class="btn btn-outline-secondary  border-success" type="button">
            <i class="fa fa-search text-success"></i>
          </button>
        </span>
      </div>

      <div class="table-responsive ">
        <table class="table table-striped table-bordered table-hover table-sm ">
          <thead class="bg-dark text-white">
            <tr>
              <th>Id</th>
              <th>Week</th>
              <th>Date</th>
              <th>Home Team</th>
              <th>Home Score</th>
              <th>Away Score</th>
              <th>Away Team</th>
              <th>Time</th>
              <th>Field</th>
              <th>Type</th>
              <th>Status</th>
              <th>Action</th>

            </tr>
          </thead>
          <tbody id="myTable">
            @foreach($matches as $date => $match)
            <tr>
              <th scope="row"><a href="/matches/{{ $match->id }}"> {{ $match->id }}</th>
              <td>{{ $match->game_week }}</td>
              {{-- <td>{{ $match->date->format('d-m-Y') }}</td> --}}
              <td> <a href="/matches/{{ $match->id }}"> {{ date('l d-m-Y', strtotime($match->date)) }}</td>
              <td>{{ $match->team_home->name }}</td>
              <td>{{ $match->home_score }}</td>
              <td>{{ $match->away_score }}</td>
              <td>{{ $match->team_away->name }}</td>
              {{-- <td>{{ $match->date }}</td> --}}
              <td> {{ date('h:i A', strtotime($match->date)) }} </td>
              <td>{{ $match->address->name }}</td>

              <td>
                @if($match->address->type === 'GRASS')
                <span class="badge badge-success ">{{ $match->address->type }}</span>
                @else
                <span class="badge badge-secondary ">{{ $match->address->type }}</span>
                @endif
              </td>
              <td>
                @if( $match->status_id === 1 )
                <span class="badge badge-primary font-weight-bold">{{ $match->status->name }}</span>
                @endif
                @if( $match->status_id === 2 )
                <span class="text-danger font-weight-bold">{{ $match->status->name }}</span>
                @endif
              </td>

              <td>
                <a href="/matches/{{$match->id}}/edit" class="btn btn-sm btn-success ">Edit</a>                
                <a href="/matches/{{$match->id}}" class="btn btn-sm btn-info ">View</a>                
              </td>
              

            </tr>
            @endforeach
          </tbody>
        </table>
        {{ $matches->links() }}
      </div>
      <div class="m-2">
        <a class="pull-right btn btn-primary btn-sm" href="{{ route('matches.create') }}">Create new match</a>
      </div>

    </div>
  </div>
</div>

@endsection

<!-- Scripts -->
@push('javascript')
<script src="{{ asset('js/others.js') }}"></script>    
@endpush