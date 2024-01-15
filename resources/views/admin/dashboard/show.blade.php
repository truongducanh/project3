@extends('admin.layouts.index')


@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sách
                    <small>Danh sách</small>
                </h1>
                <ul>
                    @foreach ($books as $item)
                        <li>{{ $item['name'] }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection