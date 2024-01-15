@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên ngành
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
                <form action="{{ route('major.edit',['id' => $major['major_id']]) }}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div class="form-group">
                        <label for="major-name">Tên chuyên ngành:</label>
                        <input type="text" class="form-control" id="major-name" name="major-name" value="{{ $major['name'] }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                  </form>
            </div>
        </div>
    </div>    
</div>
@endsection