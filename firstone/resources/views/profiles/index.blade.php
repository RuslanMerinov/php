@extends('layouts.app2')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-header text-md-center"><strong>this is your profile, {{$user->username}}, we got
                            you!</strong>

                    </div>
                    <div class="card-header text-md-center"><strong>{{$user->profile->title}}</strong>
                    </div>

                    <div class="card-body text-md-center">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <img src="https://i.ytimg.com/vi/oIQdYXCKUv0/maxresdefault.jpg" height="200"
                             alt="alt text"> </br></br>
                        <strong>now change, </strong> {{ $user->name }}  </br>
                        {{ $user->profile->description }}</br>
                        @if ($user->profile()->pluck('role')->contains('1'))
                            <strong>ADMIN&nbsp&nbsp</strong></br>
                        @else <strong>NOBODY&nbsp&nbsp</strong></br>
                        @endif

                        @can ('update', $user->profile)
                            <a href="/p/create" class="btn-dark"> + ADD A NEW POST +</a></br>
                        @endcan

                        @can ('update', $user->profile)
                            <a href="/profile/{{$user->id}}/edit" class="btn-dark">- edit yourself -</a>
                        @endcan

                    </div>

                </div>
            </div>
        </div>
        <div class="row pt-5">

            @foreach($user->posts as $post)
                <div class="card-body text-md-center">
                    <div class="row p-5 justify-content-center"><strong>{{$post->caption}}</strong></div>

                    <img src="/storage/{{ $post->image }}" align="middle" width="500" alt="other">
                    @endforeach

                </div>
        </div>
    </div>
@endsection
