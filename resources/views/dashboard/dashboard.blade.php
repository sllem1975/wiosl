@extends('home')
@section('content')
<div class="card border-primary m-2 p-3 " >

    <div>
      <i class="fas fa-chart-bar fa-2x text-primary m-3"></i>
      <h2 class="d-inline text-primary mt-3">Dashboard - Users</h2>
    </div>
    
    <div class="sidebar-sticky">
        <div class="row">
          
          <div class=" col-sm-4 card text-white bg-primary  text-center " >
            <div class="card-header"><i class="fas fa-users-cog d-inline fa-2x"></i><h3 class="d-inline"> Admin</h3></div>
            <div class="card-body">
              <h3 class="card-title">{{ $userAdmin }}</h3>          
            </div>
          </div>
          <div class="col-sm-4 card  text-white bg-success  text-center " >
            <div class="card-header"><i class="fas fa-user-graduate d-inline fa-2x"></i><h3 class="d-inline"> League</h3></div>
            <div class="card-body">
              <h3 class="card-title">{{ $userLeague }}</h3>
              
            </div>
          </div>
          <div class="col-sm-4 card  text-white bg-danger  text-center " >
            <div class="card-header"><i class="fas fa-layer-group d-inline fa-2x"></i><h3 class="d-inline"> Team</h3></div>
            <div class="card-body">
              <h3 class="card-title">{{ $userTeam }}</h3>
              
            </div>
          </div>
          
        </div>

        

    </div>
</div>
@endsection

{{-- @push('css')
<link href="{{ asset('css/simple-sidebar.css') }}" rel="stylesheet">
@endpush --}}