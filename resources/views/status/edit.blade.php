@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="color-white">{{ __('Edit Status') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('status.update', $status->id) }}">
                        @csrf
                        @method('PATCH')
                        @if($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-8">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $status->name }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success" style="margin-left: 50%">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
