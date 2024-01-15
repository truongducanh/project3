@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
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
                <form action="{{ route('book.edit',['id' => $book['book_id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="book-name">Tên sách:</label>
                        <input type="text" class="form-control" id="book-name" placeholder="Nhập tên sách" name="book-name" value="{{ $book['name'] }}" required>
                    </div>
                    <div class="form-group">
                        <label for="qty">Số lượng:</label>
                        <input type="number" class="form-control" placeholder="Nhập số lượng sách" id="qty" name="qty" value="{{ $book['qty'] }}" min=1 required>
                    </div>
                    <div class="form-group">
                        <label for="category_id">Chọn thể loại:</label>
                        <select class="form-control" name="category_id" id="category_id" required>
                            @foreach ($categories as $category)
                                @if ($book['category_id'] == $category['category_id'])
                                    <option value="{{ $category['category_id'] }}" selected>{{ $category['name'] }}</option>
                                @else
                                    <option value="{{ $category['category_id'] }}">{{ $category['name'] }}</option>
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