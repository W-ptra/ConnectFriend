@extends('layouts.app')

@section('content')
<div class="container text-center my-2">
  <h1>Home Page</h1>
</div>
<div class="container d-flex flex-wrap justify-content-center">
@foreach($users as $user)
<div class="card m-2" style="width: 18rem;">
  <img src="{{ asset('img/defaultNewUser.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    <div>
      <h4>Hobby</h4>
      <div>
          @foreach($user->hobbies as $hobby)
              <span style="font-weight: 1000;">
                {{$hobby->name}}
              </span>
          @endforeach
      </div>
    </div>
    <div>
      <h4>Instagram</h4>
      <p>
        {{ $user->instagram }}
      </p>
    </div>
    <div>
      <h4>Email</h4>
      <p>
        {{ $user->email }}
      </p>
    </div>
    <div>
      <h4>Mobile Number</h4>
      <p>
        {{ $user->mobile_number }}
      </p>
    </div>
    <form action="/friend/add" method="POST">
            @csrf  <!-- CSRF token for security -->
            <input type="hidden" name="friend_id" value="{{ $user->id }}">  <!-- Pass the friend's user ID -->
            <button type="submit" class="btn btn-primary">Add Friend</button>
      </form>
  </div>
</div>
@endforeach

</div>
@endsection
