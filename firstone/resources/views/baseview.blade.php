@extends('layouts.app2')

@section('content')
    <section class="bg-gray text-center">
        <div class="container">
            <h2>Users:</h2>

            @foreach ($users as $user)


                <div class="card-header text-md-center">

                    @if ($user->profile()->pluck('role')->contains('1'))
                        <strong>admin&nbsp&nbsp</strong>
                    @else <strong>nobody&nbsp&nbsp</strong>
                    @endif

                    <a href='/profile/{{$user->id}}'><strong> {{$user->username}}</strong></a>
                    , also known as <strong>"{{$user->name}}"</strong>&nbsp&nbsp

                    @if ($user->profile()->pluck('role')->contains('1'))
                        <a href={{action('baseviewController@makeUser', $user)}} class="btn btn-secondary">Make him
                        Nobody</a>
                    @else <a href={{action('baseviewController@makeAdmin', $user)}} class="btn btn-warning">Make him
                    Admin</a>
                    @endif
                    <a href={{action('baseviewController@killUser', $user)}} class="btn btn-dark">Kill him</a>


                </div>



            @endforeach
        </div>


    </section>
@endsection

