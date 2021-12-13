@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        @if(session('status'))
            <h6 class="alert alert-success">{{ session('status') }}</h6>
        @endif
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" id="nameInputEmail1" placeholder="Enter name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email') }}" id="exampleInputEmail1" placeholder="Enter email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation<span class="text-danger">*</span></label>
                                <select name="designation_id" class="form-control" required>
                                    @if(count($designations) > 0)
                                        @foreach($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->designation }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Photo</label>
                                <input type="file" name="photo" class="form-control" value="{{ old('photo') }}" id="exampleInputEmail1" placeholder="Enter Photo">
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </section>
@endsection
