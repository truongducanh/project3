@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sinh viên
                    <small>Cập nhật</small>
                </h1>
                @if(Session::has('invalid'))
                    <div class="alert alert-danger alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('invalid')}}
                    </div>
               @endif
               @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                         <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
                         {{Session::get('success')}}
                    </div>
               @endif
                <form action="{{ route('student.edit',['id' => $student['id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="student-name">Tên:</label>
                        <input type="text" class="form-control" id="student-name" name="student-name" value="{{ $student['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $student['email'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="major_id">Chọn chuyên ngành:</label>
                        <select class="form-control" name="major_id" id="major_id" required>
                            @foreach ($majors as $major)
                                @if ($major['major_id'] == $student['major_id'])
                                    <option value="{{ $major['major_id'] }}" selected>{{ $major['name'] }}</option>
                                @else
                                    <option value="{{ $major['major_id'] }}">{{ $major['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="class_id">Chọn lớp học:</label>
                        <select class="form-control" name="class_id" id="class_id" required>
                            @foreach ($classes as $class)
                                @if ($class['class_id'] == $student['class_id']) 
                                    <option value="{{ $class['class_id'] }}" selected>{{ $class['code'] }}</option>
                                @else
                                    <option value="{{ $class['class_id'] }}">{{ $class['code'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ $student['password'] }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection