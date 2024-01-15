@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
                    <small>Thống kê</small>
                </h1>
                <p>Sách đã đăng ký</p>
                
                    <ul>
                        @if (count($bookReg) > 0)
                        @foreach ($bookReg as $item)
                            <li>{{ $item['name'] }}</li>
                        @endforeach
                        @else
                            <i>Chưa có</i>
                        @endif
                    </ul>
                <p>Sách đã nhận</p>
                <ul>
                    @if (count($bookRec) > 0)
                        @foreach ($bookRec as $item)
                            <li>{{ $item['name'] }}</li>
                        @endforeach
                    @else
                        <i>Chưa có</i>
                    @endif
                </ul>
                <p>Sách chưa nhận</p>
                <ul>
                    @if (count($bookNotRec) > 0)
                        @foreach ($bookNotRec as $item)
                            <li>{{ $item['name'] }}</li>
                        @endforeach
                    @else
                        <i>Chưa có</i>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection