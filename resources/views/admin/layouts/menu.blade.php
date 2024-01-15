<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            @canany(['admin','menistry'])
            <li>
                <a href="{{ route('dashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i> Đơn đăng ký</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-cube fa-fw"></i> Khóa học<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('course.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('course.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-key" aria-hidden="true"></i> Lớp học<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('class.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('class.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-bookmark" aria-hidden="true"></i> Chuyên ngành<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('major.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('major.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Môn học<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('subject.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('subject.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @can('admin')
                <li>
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Giáo vụ<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('menistry.list') }}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{ route('menistry.create.form') }}">Tạo mới</a>
                        </li>
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            @endcan
                <li>
                    <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Sinh viên<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('student.list') }}">Danh sách</a>
                        </li>
                        @can('admin')
                        <li>
                            <a href="{{ route('student.create.form') }}">Tạo mới</a>
                        </li>
                        @endcan
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            <li>
                <a href="#"><i class="fa fa-book" aria-hidden="true"></i> Sách<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('book.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('book.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            <li>
                <a href="#"><i class="fa fa-cubes" aria-hidden="true"></i> Thể loại<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{ route('category.list') }}">Danh sách</a>
                    </li>
                    <li>
                        <a href="{{ route('category.create.form') }}">Tạo mới</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
            @endcanany
            @can('student')
                <li>
                    <a href="#"><i class="fa fa-file-text-o" aria-hidden="true"></i> Đơn đăng ký<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="{{ route('form.list') }}">Danh sách</a>
                        </li>
                        <li>
                            <a href="{{ route('form.create.form') }}">Tạo mới</a>
                        </li>
                    </ul>
                </li>
            @endcan
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>