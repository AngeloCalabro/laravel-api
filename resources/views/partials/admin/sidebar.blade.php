<nav id="sidebarMenu" class="bg-dark navbar-dark">
        <a href="/" class="nav-link text-white" >
            <h2 class="p-2"><i class="fa-solid fa-square-rss"></i> Boolpress</h2>
        </a>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}" href="{{route('admin.dashboard')}}">
                <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.projects.index' ? 'bg-secondary' : '' }}" href="{{route('admin.projects.index')}}">
                    <i class="fa-solid fa-newspaper fa-lg fa-fw"></i> Projects
                </a>
            </li>
             @if(Auth::check() && Auth::user()->isAdmin())
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.categories.index' ? 'bg-secondary' : '' }}" href="{{route('admin.categories.index')}}">
                        <i class="fa-solid fa-folder-open fa-lg fa-fw"></i> Categories
                    </a>
                </li>
                <li>
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.languages.index' ? 'bg-secondary' : '' }}" href="{{route('admin.languages.index')}}">
                    <i class="fa-solid fa-bookmark fa-lg fa-fw"></i> Languages
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.users.index' ? 'bg-secondary' : '' }}" href="{{route('admin.users.index')}}">
                        <i class="fa-solid fa-users fa-lg fa-fw"></i> Users
                    </a>
                </li>
            @endif
        </ul>
    </nav>
