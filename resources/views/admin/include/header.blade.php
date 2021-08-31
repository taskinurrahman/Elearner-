<!-- Top Navbar -->
<nav class="navbar navbar-dark fixed-top bg-info p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="{{route('admin.home')}}">Elearner admin area</a>

    <ul class="navbar navbar-expand-md ml-auto sticky-top">
        <li class="nav-item dropdown" style="list-style: none">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('user.profile') }}">profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>
            </div>
        </li>

        </div>
    </ul>
    </ul>
</nav>

<!-- Side Bar -->


