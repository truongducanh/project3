@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Lớp học
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
                <form action="{{ route('class.edit',['id' => $class['class_id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="code">Mã lớp học:</label>
                        <input type="text" class="form-control" id="code" name="code" value="{{ $class['code'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="course_id">Chọn khóa học:</label>
                        <select class="form-control" name="course_id" id="course_id" required>
                            @foreach ($courses as $course)
                                @if ($class['course_id'] == $course['course_id'])
                                    <option value="{{ $course['course_id'] }}" selected>{{ $course['name'] }}</option>
                                @else
                                    <option value="{{ $course['course_id'] }}">{{ $course['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection