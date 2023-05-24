@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Priorities</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th>ID</th>
                                    <th> Title</th>
                                    <th>Action</th>
                                    <a class="btn btn-sm btn-primary" href="{{ route('priorit.create') }}">+ Add</a>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($priorities as $p)
                                    <tr>
                                        <td scope="row">{{ $loop->iteration }}</td>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->title }}</td>
                                        <td class="row">
                                            <div class="col-6">
                                                <a class="btn btn-warning btn-sm col-7"
                                                    href="{{ route('priorit.edit', $p->id) }}">Edit</a>
                                            </div>
                                            <div class="col-6">
                                                <form action="{{ route('priorit.destroy', $p->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </div>


                                        </td>

                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>

                        @if (Session::has('saved'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ Session('saved') }}</strong>
                            </div>

                            <script>
                                $(".alert").alert();
                            </script>
                        @endif

                        @if (Session::has('delete'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <strong>{{ Session('delete') }}</strong>
                        </div>

                        <script>
                            $(".alert").alert();
                        </script>
                    @endif

                        <input type="hidden" name="id" id="id" value="">
                      
                    </div>
                </div>
            </div>
        </div>
    @endsection
