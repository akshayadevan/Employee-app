
@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
@endpush

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body table-responsive">
                    <table id="dataTable1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($employees) > 0)
                        @foreach($employees as $employee)
                            <tr>
                                <td class="text-center">{{ $employee->name }}</td>
                                <td class="text-center">{{ $employee->email }}</td>
                                <td class="text-center">{{ $employee->designation }}</td>
                                <td>
                                    @if($employee->photo)
                                        <div class="form-group">
                                            <img src="{{ asset('storage/' .$employee->photo) }}" style="width: 50px; height: 50px;">
                                            <input type="hidden" value="{{ $employee->photo }}" name="logo">
                                        </div>
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">
                                        &nbsp;<a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i>Edit</a>
                                        &nbsp;<a href="javascript:;" data-href="{{route('employee.destroy', $employee->id)}}" class="btn btn-danger delete" title="Delete"><i class="fas fa-trash"></i>Delete</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(document).ready(function () {
            var App = {
                initialize: function () {
                    var datatable = $('#dataTable1').DataTable({
                        "paging": true,
                        "lengthChange": true,
                        "searching": true,
                        "ordering": true,
                        "info": true,
                        "autoWidth": false,
                    });
                    $('#dataTable1').on('click', '.delete', function(e) {
                        e.preventDefault();
                        var row = datatable.rows( $(this).parents('tr') );
                        var url = $(this).data('href');
                        App.deleteItem(row, url);
                    })
                },
                deleteItem: function(row, url) {
                    if (confirm('Are you sure you want to remove this employee?')) {
                        $.ajax({
                            url: url,
                            method: 'POST',
                            success : function(data) {
                                row.remove().draw();
                                toastr.success(data.success);
                            }
                        });
                    }
                }

            };
            App.initialize();
        })
    </script>
@endpush
