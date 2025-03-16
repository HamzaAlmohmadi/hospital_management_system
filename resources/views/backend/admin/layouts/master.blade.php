

<!DOCTYPE html>
<html lang="ar" dir="rtl" :class="{ 'theme-dark': dark }" x-data="data()">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('title') لوحة التحكم</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- الخطوط -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.css') }}">


    <!-- ملفات CSS المخصصة -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/tailwind.output.css') }}">

    <!-- مكتبات أخرى -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">

    
    @stack('css')
</head>

<body class="font-[Tajawal]">
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <!-- الشريط الجانبي -->
        @include('backend.admin.layouts.sidebar')

        <div class="flex flex-col flex-1 w-full">
            @include('backend.admin.layouts.header')

            <main class="h-full overflow-y-auto">
                <div class="container px-6 mx-auto grid">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>


    <!-- مكتبات JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- ملفات JavaScript المخصصة -->
    <script src="{{ asset('admin/assets/js/init-alpine.js') }}"></script>
    <script src="{{ asset('admin/assets/js/charts-lines.js') }}"></script>
    <script src="{{ asset('admin/assets/js/charts-pie.js') }}"></script>

    @stack('js')

    <!-- Dynamic Delete Alert -->
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('click', '.delete-item', function(event) {
                event.preventDefault();
                let deleteUrl = $(this).data('url');
                console.log("رابط الحذف:", deleteUrl);

                if (!deleteUrl) {
                    Swal.fire('خطأ', 'الرابط غير موجود!', 'error');
                    return;
                }

                let $item = $(this).closest('tr');

                Swal.fire({
                    title: 'هل أنت متأكد؟',
                    text: "لن تتمكن من استرجاع هذه البيانات بعد الحذف!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'نعم، احذفها!',
                    cancelButtonText: 'إلغاء'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'DELETE',
                            url: deleteUrl,
                            success: function(data) {
                                Swal.fire({
                                    title: 'تم الحذف!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                });
                                $item.remove();
                            },
                            error: function(xhr) {
                                Swal.fire('حدث خطأ', xhr.responseJSON.message ||
                                    'لم يتم تنفيذ عملية الحذف.', 'error');
                                console.error(xhr);
                            }
                        });
                    }
                });
            });
        });
    </script>

</body>

</html>
