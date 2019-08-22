@extends('layouts.app2')

@section('content')
    <div class="container">

        <form action="/profile/{{$user->id }}" enctype="multipart/form-data" method="post">

            @csrf
            @method('PATCH')

            <div class="alert-info pd-md-6" align="center">
                <h2 style="background-color: #d3d9df">Edit profile</h2>

            </div>
            <div class="row  p-3" align="center">
                <label for="title" class="col-md-5 col-form-label text-md-right">Title</label>

                <div class="col-md-4">
                    <input id="title"
                           type="text"
                           name="title"
                           class="form-control @error('title') is-invalid @enderror"

                           value="{{ old('title') ?? $user->profile->title}}"
                           autocomplete="title"
                           autofocus>

                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row p-3" align="center">
                <label for="description" class="col-md-5 col-form-label text-md-right">Description</label>

                <div class="col-md-4">
                    <input id="description"
                           type="text"
                           name="description"
                           class="form-control @error('description') is-invalid @enderror"

                           value="{{ old('description') ?? $user->profile->description }}"
                           autocomplete="description"
                           autofocus>

                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>




            <div class="row justify-content-center pt-3">
                <button class="btn btn btn-secondary">Save it</button>

            </div>



        </form>
    </div>
@endsection
