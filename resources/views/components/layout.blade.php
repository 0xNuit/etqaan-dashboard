<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <title>إتقان العقارية</title>
</head>

<body>


    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bx-analyse'></i>
            {{-- <iconify-icon icon="bx:analyse" style="color: blue;"></iconify-icon> --}}
            <span class="text">لوحة التحكم</span>
        </a>
        <ul class="side-menu top">
            <li class="{{ strtok(request()->route()->uri, '/') == '' ? 'active' : '' }}">
                <a href="{{ route('home') }}">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">الرئيسية</span>
                </a>
            </li>
            <li class="{{ strtok(request()->route()->uri, '/') == 'asset' ? 'active' : '' }}">
                <a href="{{ route('asset.index') }}">
                    {{-- <i class='bx bxs-shopping-bag-alt' ></i> --}}
                    <iconify-icon class='bx' icon="et:layers"></iconify-icon>
                    <span class="text">الأصول</span>
                </a>
            </li>
            <li class="{{ strtok(request()->route()->uri, '/') == 'committee_chiefs' ? 'active' : '' }}">
                <a href="{{ route('committee_chiefs.index') }}">
                    {{-- <i class='bx bxs-doughnut-chart' ></i> --}}
                    {{-- <iconify-icon class='bx' icon="openmoji:judge" style="color: blue;"></iconify-icon> --}}
                        <i class='bx bxs-group'></i>
                    <span class="text">العملاء</span>
                </a>
            </li>
            <li class="{{ strtok(request()->route()->uri, '/') == 'project_managers' ? 'active' : '' }}">
                <a href="{{ route('project_managers.index') }}">
                    <iconify-icon class='bx' icon="icon-park-solid:user-business"></iconify-icon>
                    <span class="text">الموظفين</span>
                </a>
            </li>
            <li class="{{ strtok(request()->route()->uri, '/') == 'logs' ? 'active' : '' }}">
                <a href="{{ route('logs.index') }}">
                    <iconify-icon class='bx' icon="bx:file"></iconify-icon>
                    <span class="text">السجلات</span>
                </a>
            </li>
        
        </ul>
        <ul class="side-menu">
            {{-- <li>
				<a href="#">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</a>
			</li> --}}
            @auth
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <i class='bx bxs-log-out-circle'></i>
                    <button type="submit" class="text">تسجيل الخروج</button>
                </form>
            </li>
            @endauth
            @guest
            <li>
                <a  href="{{ route('login') }}" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">تسجيل الدخول</span>
                </a>
            </li>
            @endguest
        </ul>
    </section>
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            {{-- <a href="#" class="nav-link">Categories</a> --}}
            <form action="#">
                <div class="form-input">
                    {{-- <input type="search" placeholder="Search...">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button> --}}
                </div>
            </form>
            <input type="checkbox" id="switch-mode" hidden>
            <label for="switch-mode" class="switch-mode"></label>
            <a href="#" class="notification">
                <i class='bx bxs-bell'></i>
                <span class="num">0</span>
            </a>
            <a href="#" class="profile">
                <img src="{{ asset('assets/etqaan.png') }}">
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- NAVBAR -->
        <!-- START MAIN -->
        <main>{{ $slot }}</main>
        <!-- END MAIN -->
    </section>
    <!-- CONTENT -->

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
$(document).ready(function () {
    // Click event handler for the element that toggles the modal
    $('[data-toggle="modal"]').click(function () {
        var targetModal = $($(this).data("target")); // Get the modal element
        if (targetModal.hasClass("show")) {
            // If the modal is currently visible, hide it
            targetModal.modal("hide");
        } else {
            // If the modal is hidden, show it
            targetModal.modal("show");
        }
    });
     // Click event handler for the close button inside the modal
     $('.modal').on('click', '.close', function () {
        var targetModal = $(this).closest('.modal'); // Get the parent modal
        if (targetModal.hasClass("show")) {
            // If the modal is currently visible, hide it
            targetModal.modal("hide");
        }
    });
});

    </script>
    
</body>

</html>
