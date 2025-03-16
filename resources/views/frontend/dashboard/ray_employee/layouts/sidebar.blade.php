



<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="scan-outline"></ion-icon> <!-- أيقونة الأشعة -->
                </span>
                <span class="title">قسم الأشعة</span> <!-- اسم القسم أو العلامة التجارية -->
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">لوحة التحكم</span> <!-- Dashboard -->
            </a>
        </li>


        <!-- حالات تحت الإجراء -->
        <li>
            <a href="{{ route('ray.invoices_ray_employe.index') }}">
                <span class="icon">
                    <ion-icon name="hourglass-outline"></ion-icon> <!-- أيقونة الساعة الرملية -->
                </span>
                <span class="title">حالات تحت الإجراء</span> <!-- Pending Cases -->
            </a>
        </li>

        <!-- الحالات المكتملة -->
        <li>
            <a href="{{ route('ray.completed_invoices') }}">
                <span class="icon">
                    <ion-icon name="checkmark-done-outline"></ion-icon> <!-- أيقونة الإكمال -->
                </span>
                <span class="title">الحالات المكتملة</span> <!-- Completed Cases -->
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="calendar-outline"></ion-icon> <!-- أيقونة المواعيد -->
                </span>
                <span class="title">الفحوصات المعلقة</span> <!-- Pending Scans -->
            </a>
        </li>

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </span>
                <span class="title">الرسائل</span> <!-- Messages -->
            </a>
        </li> --}}

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="document-text-outline"></ion-icon> <!-- أيقونة التقارير -->
                </span>
                <span class="title">تقارير الأشعة</span> <!-- Scan Reports -->
            </a>
        </li>




        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </span>
                <span class="title">الملف الشخصي</span> <!-- Profile -->
            </a>
        </li>

        <!-- زر تسجيل الخروج -->
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    <span class="icon">
                        <ion-icon name="log-out-outline"></ion-icon>
                    </span>
                    <span class="title">تسجيل الخروج</span> <!-- Sign Out -->
                </a>
            </form>
        </li>
    </ul>
</div>
