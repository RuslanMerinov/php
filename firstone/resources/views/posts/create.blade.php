@extends('layouts.app2')

@section('content')
    <div class="container">

        <form action="/p" enctype="multipart/form-data" method="post">

            @csrf

            <div class="alert-info pd-md-6" align="center">

                <h2 style="background-color: #d3d9df">Post something</h2>

            </div>
            <div class="row p-3" align="center">
                <label for="caption" class="col-md-5 col-form-label text-md-right">Post Caption</label>

                <div class="col-md-4">
                    <input id="caption"
                           type="text"
                           name="caption"
                           class="form-control @error('caption') is-invalid @enderror"

                           value="{{ old('caption') }}"
                           autocomplete="caption"
                           autofocus>

                    @error('caption')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center">

                <label for="image" class="col-md-4 col-form-label text-md-right">Post Image</label>
                <div class="col-md-6">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>

                @if ($errors->has('image'))

                    <strong>{{$errors->first('image')}}</strong>

                @endif

            </div>

            <div class="row justify-content-center pt-3">
                <button class="btn btn btn-secondary">Add this post</button>

            </div>


        </form>

    </div>
@endsection
