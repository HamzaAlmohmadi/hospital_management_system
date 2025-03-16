<div class="topbar">
    <div class="toggle">
        <ion-icon name="menu-outline"></ion-icon>
    </div>

    <div class="search">
        <label>
            <input type="text" placeholder="Search here" />
            <ion-icon name="search-outline"></ion-icon>
        </label>
    </div>

    {{-- <div class="user">
        @if (Auth::user()->doctor->image)
            <img src="{{ asset('storage/' . Auth::user()->doctor->image) }}" alt="Doctor Image">
        @else
            <img src="{{ asset('frontend/dashboard/assets/images/default-avatar.png') }}" alt="Default Avatar">
        @endif
    </div> --}}

    <div class="user" onclick="toggleDropdown()">
        @if (Auth::user()->doctor->image)
            <img src="{{ asset('storage/' . Auth::user()->doctor->image) }}" alt="Doctor Image">
        @else
            <img src="{{ asset('frontend/dashboard/assets/images/default-avatar.png') }}" alt="Default Avatar">
        @endif

        <!-- القائمة المنسدلة -->
        <div class="dropdown-menu" id="dropdownMenu">
            <a href="{{ route('doctor.profile.index') }}">
                <ion-icon name="person-circle-outline"></ion-icon>
                الملف الشخصي
            </a>
            <a href="#">
                <ion-icon name="settings-outline"></ion-icon>
                الإعدادات
            </a>
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <ion-icon name="log-out-outline"></ion-icon>
                تسجيل الخروج
            </a>
            <!-- Form for Logout -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

</div>
