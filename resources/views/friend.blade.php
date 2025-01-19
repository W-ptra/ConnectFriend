@extends('layouts.app')

@section('content')
<h1 class="text-center">
    Friend List
</h1>
<div class="container d-flex flex-wrap justify-content-center">

@foreach($users as $user)
<div class="card m-2" style="width: 18rem;">
  <img src="{{ asset('img/defaultNewUser.png') }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">{{ $user->name }}</h5>
    
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
    <a href="/chat/send?receiverId={{$user->id}}" class="btn btn-primary">Chat</a>
  </div>
</div>
@endforeach

</div>
@endsection
