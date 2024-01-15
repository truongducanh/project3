@if (Auth::check())
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ URL::to('/') }}/favicon.ico" />
    <title>{{ Auth::user()->name }}</title>
    <base href="{{ asset('') }}" >
    <!-- Bootstrap Core CSS -->
    <link href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
    	 
       @include('admin.layouts.header')

       @yield('content')

    </div>
    <!-- jQuery -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- DataTables JavaScript -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="assets/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="assets/dist/js/sb-admin-2.js"></script>

    <!-- Ckeditor Library -->
    <script src="assets/ckeditor/ckeditor.js"></script>
    <script>CKEDITOR.replace('content')</script>

    <!-- Handle -->
    <script type="text/javascript" src="assets/dist/js/script.js"></script>
</body>

</html>
@else
    @php echo redirect()->route('index')->with('invalid','Please login account.'); @endphp
@endif