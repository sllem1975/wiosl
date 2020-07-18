@extends('home')
@section('content')
<div class="container ">
  <div class="card border-primary m-2">
    <div class=" card-header  border-primary headerForm">
      <i class="fas fa-users fa-2x text-primary mt-3"></i>
      <h2 class="d-inline text-primary text-center  mt-3">Users</h2>
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

      <div class="table-responsive">
        <table class="table table-hover">
          <thead class="table-dark">
            <tr>
              <th scope="col"># ID</th>
              <th scope="col" class="text-left">name</th>
              <th scope="col" class="text-left">email</th>
              <th scope="col">Role</th>
              <th scope="col">Status</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody id="myTable">
            @foreach($users as $user)
            <tr>
              {{-- <th scope="row"><a href="/users/{{ $user->id }}"> {{ $user->id }}</th> --}}
              <th scope="row"><a href="{{ $user->url }}"> {{ $user->id }}</th>
              <td class="text-left"><a href="/user/{{ $user->id }}">{{ $user->name }} {{ $user->last_name }}</td>
              <td class="text-left">{{ $user->email }} </td>

              <td>
                @if( $user->role_id == 1 )
                <h5><span class="badge badge-success">{{ $user->role->name }} </h5>
                @elseif( $user->role_id == 2 )
                <h5><span class="badge badge-info">{{ $user->role->name }} </h5>
                @else
                <h5><span class="badge badge-secondary">{{ $user->role->name }} </h5>
                @endif
              </td>

              @if( $user->status_id == 1 )
              <td>
                <h5><span class="badge badge-primary ">{{ $user->status->name }}</span></h5>
              </td>

              @elseif( $user->status_id == 2 )
              <td>
                <h5><span class="badge badge-danger ">{{ $user->status->name }}</span></h5>
              </td>
              @endif

              <td>
                <a href="/users/{{$user->id}}/edit" class="btn btn-sm btn-success ">Edit</a>

              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div>
          {{ $users->links() }}
        </div>

      </div>
      <div class="m-2">
        <a class="pull-right btn btn-primary btn-sm" href="{{ route('users.create') }}">Create new User</a>
      </div>

    </div>
  </div>
</div>
<script>
  $('.delete-user').click(function(e){
        e.preventDefault() // Don't post the form, unless confirmed
        if (confirm('Are you sure?')) {
            // Post the form
            $(e.target).closest('form').submit() // Post the surrounding form
        }
    });

    
</script>
@endsection

<!-- Scripts -->
@push('javascript')
<script src="{{ asset('js/others.js') }}"></script>
@endpush