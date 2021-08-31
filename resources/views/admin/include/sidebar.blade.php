{{--//side navbar--}}

<nav class="col-sm-3 col-md-2 bg-light sidebar py-5 d-print-none">
    <div class="sidebar-sticky position-fixed">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.home')}}">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{route('admin.courselist')}}>
                    Courses
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.userlist')}}">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.lessons')}}">
                    Lessons
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href=""
                   onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                    Logout
                </a>
                <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</nav>
