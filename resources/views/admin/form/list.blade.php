@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Đơn đăng ký
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
                        <th>Mã đơn</th>
                        <th>Thời gian làm đơn</th>
                        <th>Trạng thái</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <tbody align="center">
                    @foreach ($forms as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ date('d-m-Y H:i:s',strtotime($item['created_at'])) }}</td>
                            <td>{{ $item['status'] == 0 ? 'Chưa kiểm duyệt':'Kiểm duyệt' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" data-toggle="dropdown">Lựa chọn
                                    <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{ route('form.delete',['id' => $item['id']]) }}" onclick="return confirm('Bạn có muốn xóa lựa chọn này ?');">Xóa</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection