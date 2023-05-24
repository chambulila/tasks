@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">Tasks</div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th> Title</th>
                                    <th> Description</th>
                                    <th> Category</th>
                                    <th> Priority</th>
                                    <th>Action</th>
                                    <div class="row">
                                        <div class="col-6">
                                            <a class="btn btn-sm btn-primary" href="{{ route('task.create') }}">+ Add</a>
                                        </div>
                                        <div class="col-6">
                                            <div class="btn-group" role="group">
                                                <button id="dropdownId" type="button"
                                                    class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Sort by category
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownId">
                                                    @foreach ($category as $item)
                                                        <a class="dropdown-item"
                                                            href="{{ route('task-sort-category', $item->id) }}">{{ $item->name }}</a>
                                                        {{-- <a class="dropdown-item" href="#">ww</a> --}}
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </div>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td scope="row">{{ $loop->iteration }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->cartegor->name }}</td>
                                <td>{{ $task->priorit->title }}</td>
                                <td class="row">
                                    <div class="col-6">
                                        <a class="btn btn-warning btn-sm col-7"
                                            href="{{ route('task.edit', $task->id) }}">Edit</a>
                                    </div>
                                    <div class="col-6">
                                        <form action="{{ route('task.destroy', $task->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </div>


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @if (session()->has('task_saved'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{ session('task_saved') }}</strong>
                        </div>
                    @endif

                    @if (session()->has('deleted'))
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{ session('deleted') }}</strong>
                        </div>
                    @endif

                    @if (session()->has('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                <span class="sr-only">Close</span>
                            </button>
                            <strong>{{ session('updated') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
