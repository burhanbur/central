<header class="header navbar navbar-expand-sm">

    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a>
    
    <div class="nav-logo align-self-center">
        <a class="navbar-brand" href="{{ route('home') }}"><img alt="logo" src="{{ asset('assets/square-logo-no-text.png') }}"> <span class="navbar-brand-name">Central</span></a>
    </div>

    <ul class="navbar-item flex-row mr-auto">
        <li class="nav-item align-self-center search-animated">
            <form class="form-inline search-full form-inline search" role="search">
                <div class="search-bar">
                    <input type="text" class="form-control search-form-control  ml-lg-auto" placeholder="Search...">
                </div>
            </form>
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search toggle-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
        </li>
    </ul>

    <ul class="navbar-item flex-row nav-dropdowns">
        <li class="nav-item dropdown user-profile-dropdown order-lg-0 order-1">
            <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="user-profile-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media">
                    <div class="media-body align-self-center">
                        <h6>{{ @Auth::user()->person->name }}</h6>
                        <p>{{ @Auth::user()->email }}</p>
                    </div>
                    <img src="{{ asset('assets/assets/img/default.png') }}" class="img-fluid" alt="admin-profile">
                    <span class="badge badge-success"></span>
                </div>
            </a>

            <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
                <div class="dropdown-item">
                    <a href="">
                        <i class="fas fa-user"></i> &nbsp;
                        <span> Profile</span>
                    </a>
                </div>
                <div class="dropdown-item">
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-sign-out-alt"></i> &nbsp;
                        <span>Logout</span>
                    </a>
                </div>
            </div>
        </li>
    </ul>
</header>