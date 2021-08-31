<!-- Side Bar -->
<nav class="col-sm-2 col-md-2 bg-light sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <img src="{{asset('images/default.png')}}" alt="studentimage" class="avatar">
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.dashboard')}}">
                    <i class="fas fa-user"></i>
                    Dashboard
                </a>

            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('user.profile')}}">
                    <i class="fab fa-accessible-icon"></i>
                    My profile
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
