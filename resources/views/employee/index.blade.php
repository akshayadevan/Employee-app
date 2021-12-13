
{{--@extends('layouts.app')--}}

{{--@push('styles')--}}
{{--    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">--}}
{{--    <link rel="stylesheet" href="cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">--}}

{{--@endpush--}}

{{--@section('content')--}}
{{--    <div>--}}
{{--        <form action="{{ route('employee.index') }}" method="GET">--}}
{{--            <input type="text" name="search_keyword" placeholder="Enter Email to search">--}}
{{--            <input type="submit" class="btn btn-primary">Search--}}
{{--        </form>--}}
{{--    </div>--}}
{{--    <div class="row">--}}
{{--        <div class="col-12">--}}
{{--            <div class="card">--}}
{{--                <div class="card-body table-responsive">--}}
{{--                    <table id="dataTable1" class="table table-bordered table-striped">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th class="text-center">Name</th>--}}
{{--                            <th class="text-center">Email</th>--}}
{{--                            <th class="text-center">Designation</th>--}}
{{--                            <th class="text-center">Image</th>--}}
{{--                            <th class="text-center">Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($employees as $employee)--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">{{ $employee->name }}</td>--}}
{{--                                <td class="text-center">{{ $employee->email }}</td>--}}
{{--                                <td class="text-center">{{ $employee->designation }}</td>--}}
{{--                                <td>--}}
{{--                                    @if($employee->photo)--}}
{{--                                        <div class="form-group">--}}
{{--                                            <img src="{{ asset('storage/' .$employee->photo) }}" style="width: 50px; height: 50px;">--}}
{{--                                            <input type="hidden" value="{{ $employee->photo }}" name="logo">--}}
{{--                                        </div>--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <div class="btn-group btn-group-sm">--}}
{{--                                        &nbsp;<a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info" title="Edit"><i class="fas fa-edit"></i>Edit</a>--}}
{{--                                        &nbsp;<a href="javascript:;" data-href="{{route('employee.destroy', $employee->id)}}" class="btn btn-danger delete" title="Delete"><i class="fas fa-trash"></i>Delete</a>--}}
{{--                                    </div>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--@endsection--}}

{{--@push('scripts')--}}

{{--    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>--}}
{{--    <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>--}}
{{--    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>--}}
{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            var App = {--}}
{{--                initialize: function () {--}}
{{--                    var datatable = $('#dataTable1').DataTable({--}}
{{--                        "paging": true,--}}
{{--                        "lengthChange": true,--}}
{{--                        "searching": false,--}}
{{--                        "ordering": true,--}}
{{--                        "info": true,--}}
{{--                        "autoWidth": false,--}}
{{--                    });--}}
{{--                    $('#dataTable1').on('click', '.delete', function(e) {--}}
{{--                        e.preventDefault();--}}
{{--                        var row = datatable.rows( $(this).parents('tr') );--}}
{{--                        var url = $(this).data('href');--}}
{{--                        App.deleteItem(row, url);--}}
{{--                    })--}}
{{--                },--}}
{{--                deleteItem: function(row, url) {--}}
{{--                    if (confirm('Are you sure you want to remove this employee?')) {--}}
{{--                        $.ajax({--}}
{{--                            url: url,--}}
{{--                            method: 'POST',--}}
{{--                            success : function(data) {--}}
{{--                                row.remove().draw();--}}
{{--                                toastr.success(data.success);--}}
{{--                            }--}}
{{--                        });--}}
{{--                    }--}}
{{--                }--}}

{{--            };--}}
{{--            App.initialize();--}}
{{--        })--}}
{{--    </script>--}}
{{--@endpush--}}



@extends('layouts.app')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">List Of Employees</h3>
                </div>
                <div class="-align-right">
                    <a href="{{ route('employee.create') }}">Add Employee</a>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th class="text-center">Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Designation</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        @if(count($employees) > 0)
                            <tbody>
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
{{--                                            &nbsp;<a href="javascript:;" data-href="{{route('employee.destroy', $employee->id)}}" class="btn btn-danger delete" title="Delete"><i class="fas fa-trash"></i>Delete</a>--}}
                                            <form method="POST" action="{{ route('employee.destroy', $employee->id) }}">
                                                @csrf
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @else
                                <div>No company found!!</div>
                            </tbody>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')
    <script src="{{ asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{ asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $( document ).ready(function() {
            console.log('hi');
            $(function () {
                $('#example2').DataTable({
                    'paging'      : true,
                    'lengthChange': false,
                    'searching'   : true,
                    'ordering'    : false,
                    'info'        : false,
                    'autoWidth'   : false
                })
            })
        });
    </script>
@endpush
