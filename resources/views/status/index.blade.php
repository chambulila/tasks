@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Statuses</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>ID</th>
                                    <th> Name</th>
                                    <th>Action</th>
                                    <a class="btn btn-sm btn-primary" href="{{ route('status.create') }}">+ Add</a>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statuses as $st)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $st->id }}</td>
                                        <td>{{ $st->name }}</td>
                                        <td class="row">
                                            <div class="col-6">
                                                <a class="btn btn-warning btn-sm col-7"
                                                    href="{{ route('status.edit', $st->id) }}">Edit</a>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('status.destroy', $st->id) }}" method="POST">
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

                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ Session('success') }}</strong>
                            </div>

                            <script>
                                $(".alert").alert();
                            </script>
                        @endif

                        @if (Session::has('updated'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ Session('updated') }}</strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif
                    
                    @if (Session::has('deleted'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>{{ Session('deleted') }}</strong>
                    </div>

                    <script>
                        $(".alert").alert();
                    </script>
                @endif
                     
                      
                    </div>
                </div>
            </div>
        </div>
    @endsection
