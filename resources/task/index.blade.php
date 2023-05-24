@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Tasks</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Sn</th>
                                    <th> Title</th>
                                    <th>Description</th>
                                    <th>Priority</th>
                                    <th>Action</th>
                                    <a class="btn btn-sm btn-primary" href="{{ route('task.create') }}">+ Add</a>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($tasks as $ho) --}}
                                <tr>
                                    <td scope="row">23</td>
                                    <td>23</td>
                                    <td>23</td>
                                    <td>23</td>
                                    <td class="row">
                                        <div class="col-6">
                                            <a class="btn btn-warning btn-sm col-7" href="#">Edit</a>
                                        </div>
                                        <div class="col-6">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="onDeleteInfo()"
                                                    class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#deleteModel">Delete</button>
                                            </form>
                                        </div>


                                    </td>

                                </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>

                        @if (Session::has('success'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>{{ Session('success') }}</strong>
                            </div>

                            <script>
                                $(".alert").alert();
                            </script>
                        @endif

                        {{-- modal for delete  --}}
                        <div class="modal fade" id="deleteModel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-warning">Warning!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="container-fluid">
                                        <p class="text-danger text-bold">Are you sure you want to delete this hostel ?</p>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id" id="id" value="">
                                    <button type="button" class="btn btn-success" data-dismiss="modal">No, cancel!</button>
                                    <button type="button" class="btn btn-danger" onclick="deleteInfo()">Yes, Delete!</button>
                                </div>
                            </div>
                        </div>
                    </div>
                      {{-- end modal for delete owner --}}

                        {{-- success update owner --}}
                        @if (Session::has('Hownerupdated'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <strong>{{ Session('Hownerupdated') }}</strong> 
                            </div>
                            
                            <script>
                              $(".alert").alert();
                            </script>
                        @endif
                    {{-- end success update owner --}}
                        </div>
            </div>


                        {{-- </div>
    </div>
</div>  --}}
                    @endsection

                    <script src="{{ asset('js/work/sweetalert2.js') }}"></script>
                    <script src="asset('js/jqueriii.min.js')"></script>
                    <script src="{{ asset('bootstrap-5.2.0-beta1-dist\js\bootstrap.min.js') }}"></script>


                    <script>
                        function onDeleteInfo(id) {
                            $("#id").val(id);
                        }

                        function deleteInfo() {
                            let id = $("#id").val();
                            let _url = '/categor/{categor}/' + id;
                            let _token = $('meta[name="csrf-token"]').attr('content');

                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 5000
                            });

                            $.ajax({
                                url: _url,
                                type: 'DELETE',
                                data: {
                                    _token: _token
                                },
                                success: function(response) {
                                    if (response.status) {
                                        Toast.fire({
                                            type: 'success',
                                            title: response.message
                                        });
                                    } else {
                                        Toast.fire({
                                            type: 'error',
                                            title: 'An error occurred. Please try again !!!.       '
                                        });
                                    }
                                }
                            });
                            location.reload();
                        }
                    </script>
