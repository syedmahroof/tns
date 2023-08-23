<div class="horizontal-menu">
    <nav class="navbar top-navbar">
        <div class="container">
            <div class="navbar-content">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="wd-30 ht-30 rounded-circle"
                                src="@if (auth()->user()->profile_image != '') {{ asset(auth()->user()->profile_image) }} @else {{ url('https://via.placeholder.com/30x30') }} @endif"
                                alt="profile">
                        </a>
                        <div class="dropdown-menu p-0" aria-labelledby="profileDropdown">
                            <div class="d-flex flex-column align-items-center border-bottom px-5 py-3">
                                <div class="mb-3">
                                    <img class="wd-80 ht-80 rounded-circle"
                                        src="@if (auth()->user()->profile_image != '') {{ asset(auth()->user()->profile_image) }} @else {{ url('https://via.placeholder.com/80x80') }} @endif"
                                        alt="">
                                </div>
                                <div class="text-center">
                                    <p class="tx-16 fw-bolder"> {{ auth()->user()->name }} </p>
                                    <p class="tx-12 text-muted">{{ auth()->user()->email }}</p>
                                </div>
                            </div>
                            <ul class="list-unstyled p-1">
                                <li class="dropdown-item py-2">
                                    <a href="{{ route('profile.index') }}" class="text-body ms-0 d-flex">
                                        <i class="me-2 icon-md" data-feather="user"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>

                                <li class="dropdown-item py-2">
                                    <a href="{{ route('logout') }}" class="text-body ms-0 d-flex">
                                        <i class="me-2 icon-md" data-feather="log-out"></i>
                                        <span>Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="horizontal-menu-toggle">
                    <i data-feather="menu"></i>
                </button>
            </div>
        </div>
    </nav>
    <nav class="bottom-navbar">
        <div class="container">
            <ul class="nav page-navigation">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/dashboard') }}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('company.list') }}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Companies</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact.list') }}">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="menu-title">Contacts</span>
                    </a>
                </li> --}}
            </ul>
        </div>
    </nav>
</div>
