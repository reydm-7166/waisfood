<nav class="w-100 border rounded-bottom border-0 d-flex align-items-center" id="navbar">
    <h3 class="font d-inline-block ms-5 me-auto">WAIS FOOD PH</h3>

    {{-- SEARCH BAR --}}
    <form action="" method="get" class="d-inline-block mt-3 me-5">
        <input type="text" name="search" id="search" class="border rounded-pill p-2 icon ps-5 font align-top" placeholder="Search">
    </form>
    {{-- home button --}}
    <ul class="nav d-inline-block float-end me-5 d-flex justify-content-start" id="nav_icons">
        <div class="d-inline-block">
            <li class="nav-item">
                <a href="{{ route('post.index') }}" class="nav-link"><i class="fa-solid fa-house fs-2"></i></a>
            </li>
        </div>
        <span class="badge bg-primary rounded-pill d-inline-block align-top align-self-baseline">14</span>
        <div class="d-inline-block">
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fa-solid fa-bell fs-2"></i></i></a>
            </li>
        </div>
        <span class="badge bg-primary rounded-pill d-inline-block align-top align-self-baseline">14</span>

        <div class="d-inline-block me-1">
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fa-solid fa-gear fs-2"></i></a>
            </li>
        </div>

        <div class="d-inline-block">
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fa-solid fa-palette fs-2"></i></a>
            </li>
        </div>
    </ul>

    <!-- Example split danger button -->
    <div class="btn-group d-flex me-5" id="profile_tab">
        <img src="/img/profile_picture.jpg" alt="aa" class="border rounded-circle border-0" data-bs-toggle="dropdown" id="profile_picture">
        <button type="button" class="dropdown-toggle dropdown-toggle-split bg-transparent border border-0" data-bs-toggle="dropdown" aria-expanded="false">
        <span class="visually-hidden">Toggle Dropdown</span>
        </button>
        
        <ul class="dropdown-menu shadow ps-2 pe-2">
            <li class="border-bottom"><a class="dropdown-item" href="{{ route('profile.index', $user_data['id']) }}"><i class="fa-solid fa-user me-3"></i>View Profile</a></li>
            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa-solid fa-question me-4"></i>Help</a></li>
            <li class="border-bottom"><a class="dropdown-item" href="#"><i class="fa-solid fa-bug me-3"></i>Report</a></li>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                
                <li class="border-bottom"><button type="submit" class="dropdown-item"><i class="fa-solid fa-right-from-bracket d-inline-block me-3"></i>Logout</li>
            </form>
        </ul>
    </div>
</nav>