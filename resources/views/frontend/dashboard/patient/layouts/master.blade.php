<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>

    @yield('css')
    <!-- ======= CSS Files ====== -->
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/assets/css/style.css') }}" />

    <!-- Bootstrap JS (مع Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>






</head>

<body dir="rtl">
    <!-- =============== Navigation ================ -->
    <div class="container">


        @include('frontend.dashboard.patient.layouts.sidebar')

        <!-- ========================= Main ==================== -->
        <div class="main">
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

                <div class="user">
                    <img src="#" alt="" />
                </div>
            </div>

            @yield('content')

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Bootstrap JS (مع Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="{{ asset('frontend/dashboard/assets/js/main.js') }}"></script>
    <!-- ionicons -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


    <!-- ======= Custom Scripts ====== -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownButton = document.querySelector('.dropdown-toggle');
            const dropdownMenu = document.querySelector('.dropdown-menu');

            dropdownButton.addEventListener('click', function() {
                const isVisible = dropdownMenu.style.display === 'block';
                dropdownMenu.style.display = isVisible ? 'none' : 'block';
            });

            // إغلاق القائمة عند النقر خارجها
            document.addEventListener('click', function(event) {
                if (!dropdownButton.contains(event.target)) {
                    dropdownMenu.style.display = 'none';
                }
            });
        });
    </script>

    @yield('js')
</body>

</html>
