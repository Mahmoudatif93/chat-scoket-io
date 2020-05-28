@extends('layouts.app')

@section('content')
@push('css')
    <link href="{{ url('/') }}/public/css/style.css" rel="stylesheet">
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.js"></script>
<script src="{{ url('/') }}/public/js/jquery-1.10.1.min.js"></script>

<script>
    var user_id='{{ auth()->user()->id }}';
    var username='{{ auth()->user()->name }}';
    var typingurl = '{{ url('/') }}/public/uploads/images/typing.gif';


</script>

<script src="{{ url('/') }}/public/js/script.js"></script>

@endpush



         <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Chat Control</div>

                        <div class="card-body">


        <div class="dropdown">
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <span class="current_status" status="online">Online</span>
          </button>
          <div class="dropdown-menu">
            <a class="dropdown-item status" status="online" href="#">Online</a>
            <a class="dropdown-item status" status="offline" href="#">Offline</a>
            <a class="dropdown-item status" status="bys" href="#">Busy</a>
            <a class="dropdown-item status" status="dnd" href="#">don't disturb</a>
          </div>
        </div>

                            <div id="chat-sidebar">
                                @foreach(App\User::where('id','!=',auth()->user()->id)->get() as $user)
                                <div id="sidebar-user-box" class="user" uid="{{ $user->id }}">
                                <img src="{{ url('/') }}/public/uploads/images/user.png" />
                                <span id="slider-username">{{ $user->name }}</span>
                                <span class="user_status user_{{ $user->id }}">&nbsp;</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>









@endsection
