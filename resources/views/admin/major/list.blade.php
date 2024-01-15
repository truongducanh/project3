@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Chuyên ngành
                    <small>Danh sách</small>
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
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên chuyên ngành</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @php $count = 1; @endphp
                    @foreach ($majors as $item)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $item['name'] }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Lựa chọn
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{ route('major.edit.form',['id' => $item['major_id']]) }}">Sửa</a></li>
                                      <li><a href="{{ route('major.delete',['id' => $item['major_id']]) }}" onclick="return confirm('Bạn có muốn xóa lựa chọn này ?');">Xóa</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @php $count++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection