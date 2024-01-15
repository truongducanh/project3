@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đăng ký sách
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
                <form action="{{ route('form.create') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label>Tên sinh viên:</label>
                        <input type="text" class="form-control" value="{{ $user[0]['username'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Chuyên ngành:</label>
                        <input type="text" class="form-control" value="{{ $user[0]['major_name'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label>Khóa học:</label>
                        <input type="text" class="form-control" value="{{ $user[0]['course_name'] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="book">Chọn sách:</label>
                        <select class="form-control" id="book" name="book[]" multiple required>
                            @php
                                $arr = [];
                            @endphp
                            @foreach ($user as $item)
                                @php
                                    $arr[] = $item['book_id'];
                                @endphp
                                @if (!in_array($item['book_id'],$bookIds))
                                    <option value="{{ $item['book_id'] }}">{{ $item['name'] }}</option>
                                @endif
                            @endforeach
                        </select>
                      </div>
                      @if (!empty($bookIds))
                        @if ($bookIds != $arr)
                        <button type="submit" class="btn btn-primary">Đăng ký</button>
                        @else 
                            <button type="submit" class="btn btn-primary" disabled>Đăng ký</button>
                            <p class="text-danger">Bạn đã đăng ký hết tất cả các sách, vui lòng đợi giáo vụ duyệt đơn.</p>
                        @endif
                      @else
                      <button type="submit" class="btn btn-primary">Đăng ký</button>
                      @endif
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection