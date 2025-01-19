@extends('layouts.app')

@section('content')
<h1 class="text-center">
    Chats
</h1>
<div class="container d-flex flex-column flex-wrap justify-content-center">
    <div class="d-flex justify-content-between mx-5">
        <div>
            Sender
        </div>
        <div>
            Message
        </div>
        <div>
            Receiver
        </div>
    </div>
    @foreach($chats as $chat)
        <div class="d-flex justify-content-between m-2 p-5" style="border: 1px solid black;">
            <div>
                {{ $chat->initiator->name }}
            </div>
            <div>
                {{ $chat->content }}
            </div>
            <div>
                {{ $chat->initiator->name }}
            </div>
        </div>
    @endforeach

</div>
@endsection
