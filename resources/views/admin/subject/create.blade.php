@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Môn học
                    <small>Tạo mới</small>
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
                <form action="{{ route('subject.create') }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit"
                                    class="btn btn-primary">
                                Tạo mới
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="subject-name">Tên môn học:</label>
                        <input type="text" class="form-control" id="subject-name" name="subject-name" required>
                    </div>
                    <input type="hidden" name="book_ids">
                    <label>Sách</label>
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Tên sách</th>
                                <th>Thể loại</th>
                            </tr>
                        </thead>
                        <tbody align="center">
                            @foreach ($books as $item)
                                <tr>
                                    <td class="text-center">
                                        <input type="checkbox"
                                               data-checked="0"
                                               name="subject-book"
                                               class="form-check-input subject-book"
                                               value="{{ $item['book_id'] }}">
                                    </td>
                                    <td>{{ $item['name'] }}</td>
                                    <td>{{ $item['category_name'] }}</td>
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