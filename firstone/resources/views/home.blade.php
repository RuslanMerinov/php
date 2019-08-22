@extends('layouts.app2')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            @foreach($posts as $post)

                <?php
                $truename = \App\User::find($post->user_id);
                ?>

                <div class="card-body text-md-center">
                    <div class="row p-5 justify-content-center"><strong>{{$post->caption}}</strong>&nbsp
                        by<strong>&nbsp{{ $truename['name'] }}</strong>

                        @if (Auth::User()->profile()->pluck('role')->contains('1'))
                            &nbsp&nbsp&nbsp&nbsp
                            <a
                                href={{action('PostsController@deletePost', $post->id)}} class="btn-dark">
                                &nbspDELETE&nbsp </a>
                        @endif
                    </div>
                    <img src="/storage/{{ $post->image }}" align="middle" width="500" alt="other">
                    @endforeach

                </div>
        </div>


@endsection

