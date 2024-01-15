@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Khóa học
                    <small>Cập nhật</small>
                </h1>
                <form action="{{ route('course.edit',['id' => $course['course_id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit"
                                    class="btn btn-primary">
                                Cập nhật
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="course-name">Tên khóa học:</label>
                        <input type="text" class="form-control" placeholder="Nhập tên khóa học" id="course-name" name="course-name" value="{{ $course['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Mô tả:</label>
                        <textarea class="form-control" id="content" name="content" required>{{ $course['content'] }}</textarea>
                    </div>
                    @php 
                        $subjectIds = implode(',', $subject).',';
                    @endphp
                    <input type="hidden" name="subject_ids" value="{{ $subjectIds }}">
                    <label>Môn học</label>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên môn học</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($subjects as $item)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox"
                                        data-checked={{ in_array($item['subject_id'], $subject) ? '1' : '0' }}
                                               name="subject-course"
                                               {{ in_array($item['subject_id'], $subject) ? 'checked' : '' }}
                                               class="form-check-input subject-course"
                                               value="{{ $item['subject_id'] }}">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection