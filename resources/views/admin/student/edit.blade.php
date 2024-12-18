@extends('admin.layout')

@section('content')
    <div class="content-wrapper">

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Update Student Data</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Update Student Data</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">

                    <div class="col-md-12">

                        <div class="card card-primary">

                            @if (Session::has('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="card-header">
                                <h3 class="card-title">Update Student Data</h3>
                            </div>


                            <form action="{{ route('student.update') }}" method="post">
                                @csrf
                                <input type="hidden" name="id" value="{{ $student->id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="InputStudentID">Student ID</label>
                                        <input type="text" name="student_id" class="form-control" id="InputStudentID"
                                            placeholder="Enter Student ID" value="{{ old('name', $student->student_id) }}">
                                    </div>
                                    @error('student_id')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="InputName">Student Name</label>
                                        <input type="text" name="name" class="form-control" id="InputName"
                                            placeholder="Enter Student Name" value="{{ old('name', $student->name) }}">
                                    </div>
                                    @error('name')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <div class="form-group">
                                        <label for="InputEmail">Student Email</label>
                                        <input type="email" name="email" class="form-control" id="InputEmail"
                                            placeholder="Enter Student Email" value="{{ old('name', $student->email) }}">
                                    </div>
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror

                                    <label for="InputYear">Student Year</label>
                                    <select name="year" class="form-control" id="InputYear">
                                        <option value="">Select Student Year</option>
                                        @foreach ($academic_year as $item)
                                            <option value="{{ $item->name }}"
                                                {{ old('year', $student->academic_year) == $item->name ? 'selected' : '' }}>
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('year')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update Student Data</button>
                                </div>
                            </form>
                        </div>


                    </div>
                </div>
        </section>

    </div>
@endsection

@section('content')
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endsection
