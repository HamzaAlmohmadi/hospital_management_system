{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">


<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/assets/css/style.css') }}" />

</head>

<body dir="rtl">
    <!-- =============== Navigation ================ -->
    <div class="container">


        @include('frontend.dashboard.doctor.layouts.sidebar')

        <!-- ========================= Main ==================== -->
        <div class="main">

            @include('frontend.dashboard.doctor.layouts.navbar')


            @yield('content')

        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('frontend/dashboard/assets/js/main.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>


</body>

</html> --}}






{{-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Admin Dashboard | Korsat X Parmaga</title>
    <!-- ======= Styles ====== -->
    <link rel="stylesheet" href="{{ asset('frontend/dashboard/assets/css/style.css') }}" />
<!-- FontAwesome للأيقونات -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap JS (مع Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <style>
            .modal-header {
                background-color: #007bff;
                color: white;
            }
            .modal-title {
                font-weight: bold;
            }
            .form-group label {
                font-weight: bold;
                color: #333;
            }
            .btn-primary {
                background-color: #007bff;
                border-color: #007bff;
            }
            .btn-secondary {
                background-color: #6c757d;
                border-color: #6c757d;
            }
            .btn-primary:hover, .btn-secondary:hover {
                opacity: 0.9;
            }
        </style>

</head>

<body dir="rtl">
    <!-- =============== Navigation ================ -->
    <div class="container">
        @include('frontend.dashboard.doctor.layouts.sidebar')

        <!-- ========================= Main ==================== -->
        <div class="main">

            @include('frontend.dashboard.doctor.layouts.navbar')



            @yield('content')
        </div>
    </div>

    <!-- =========== Scripts =========  -->
    <script src="{{ asset('frontend/dashboard/assets/js/main.js') }}"></script>

    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    

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
                            if (!dropdownButton.contains(event.target) {
                                    dropdownMenu.style.display = 'none';
                                }
                            });
                    });
    </script>
    
</body>

</html> --}}




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
        @include('frontend.dashboard.doctor.layouts.sidebar')

        <!-- ========================= Main ==================== -->
        <div class="main">
            @include('frontend.dashboard.doctor.layouts.navbar')
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
