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
                <div>
                    <form action="{{ route('employee.index') }}" method="GET">
                        <input type="text" name="serach_keyword" value="{{ isset($_GET['serach_keyword'])?$_GET['serach_keyword']:''}}">
                        <input type="submit" class="btn btn-primary" value="Search">
                    </form>
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
