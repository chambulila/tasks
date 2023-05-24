@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-center">
                    <h2 class="color-white">{{ __('Create Task') }}</h2>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('task.store') }}">
                        @if($errors->any())
                        <div class="alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li> {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-8">
                                <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-8">
                                <input type="text" name="description" class="form-control @error('Description') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        
                   <div class="form-group row">
                    <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Category') }}</label>
                    <div class="col-md-8">
                        <select name="category" class="form-control">
                        @foreach ($category as $cat)
                        <option value="{{ $cat->id }}"> {{ $cat->name }}</option>
                        @endforeach
                    </select>
                    </div>
                   </div>
                   <div class="form-group row">
                    <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
                    <div class="col-md-8">
                        <select name="priority" class="form-control">
                        @foreach ($priorities as $p)
                        <option value="{{ $p->id }}"> {{ $p->title }}</option>
                        @endforeach
                    </select>
                    </div>
                   </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" style="margin-left: 50%">
                                    {{ __('Save') }}
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
