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
                        <h3 class="box-title">Edit Employee</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('employee.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name', $employee->name) }}" id="nameInputEmail1" placeholder="Enter name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ old('email', $employee->email) }}" id="exampleInputEmail1" placeholder="Enter email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Designation<span class="text-danger">*</span></label>
                                <select name="designation_id" class="form-control" required>
                                        @foreach($designations as $designation)
                                        <option value="{{ $designation->id }}" {{($employee->designation_id == $designation->id)?'selected':''  }}>{{ ucfirst($designation->designation)}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">Photo</label>
                                <input type="file" name="photo" value="{{ old('photo', $employee->photo) }}" id="exampleInputFile">
                                @error('photo')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @if($employee->photo)
                                <div class="form-group">
                                    <img src="{{ asset('storage/' .$employee->photo) }}" style="width: 50px; height: 50px;">
                                    <input type="hidden" value="{{ $employee->photo }}" name="logo">
                                </div>
                            @endif
                        </div>
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
