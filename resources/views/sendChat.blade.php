@extends('layouts.app')

@section('content')
    <h1 class="text-center">
        Send chat to {{ $receiver->name }}
    </h1>
    
    <div class="container d-flex flex-wrap justify-content-center">
        <!-- Chat Form -->
        <div class="card m-2" style="width: 50rem;">
            <div class="card-body">
                

                <!-- Form to send a message -->
                <form action="/chat/send" method="POST">
                    @csrf
                    <input type="hidden" name="sender_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="receiver_id" value="{{ $receiver->id }}">

                    <div class="form-group">
                        <textarea name="content" id="content" class="form-control" rows="4" placeholder="Type your message..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
        </div>
    </div>
@endsection
