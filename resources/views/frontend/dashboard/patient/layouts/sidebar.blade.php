




<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="medical-outline"></ion-icon> <!-- أيقونة طبية -->
                </span>
                <span class="title">المستشفى</span> <!-- اسم المستشفى أو العلامة التجارية -->
            </a>
        </li>

        <li>
            <a href="{{ route('patient.dashboard') }}">
                <span class="icon">
                    <ion-icon name="home-outline"></ion-icon>
                </span>
                <span class="title">لوحة التحكم</span> <!-- Dashboard -->
            </a>
        </li>

        <li>
            <a href="{{ route('patient.payments') }}">
                <span class="icon">
                    <ion-icon name="calendar-outline"></ion-icon> <!-- أيقونة المواعيد -->
                </span>
                <span class="title">الحسابات والدفع</span> <!-- My Appointments -->
            </a>
        </li>
{{-- 
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="document-text-outline"></ion-icon> <!-- أيقونة التقارير -->
                </span>
                <span class="title">تقاريري الطبية</span> <!-- Medical Reports -->
            </a>
        </li> --}}

        <li>
            <a href="{{ route('patient.rays') }}">
                <span class="icon">
                    <ion-icon name="scan-outline"></ion-icon> <!-- أيقونة الأشعة -->
                </span>
                <span class="title">نتائج الأشعة</span> <!-- Radiology Results -->
            </a>
        </li>

        <li>
            <a href="{{ route('patient.laboratories') }}">
                <span class="icon">
                    <ion-icon name="flask-outline"></ion-icon> <!-- أيقونة المختبر -->
                </span>
                <span class="title">نتائج الفحوصات </span> <!-- Laboratory Results -->
            </a>
        </li>


        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="medkit-outline"></ion-icon> <!-- أيقونة التشخيص -->
                </span>
                <span class="title">تشخيصات الأطباء</span> <!-- Doctor Diagnoses -->
            </a>
        </li> --}}

        <li>
            <a href="{{ route('patient.invoices') }}">
                <span class="icon">
                    <ion-icon name="card-outline"></ion-icon> <!-- أيقونة الفواتير -->
                </span>
                <span class="title">الفواتير </span> <!-- Bills & Payments -->
            </a>
        </li>

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="chatbubble-outline"></ion-icon>
                </span>
                <span class="title">الدردشة مع الطبيب</span> <!-- Chat with Doctor -->
            </a>
        </li> --}}

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="notifications-outline"></ion-icon> <!-- أيقونة الإشعارات -->
                </span>
                <span class="title">الإشعارات</span> <!-- Notifications -->
            </a>
        </li> --}}

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">الإعدادات</span> <!-- Settings -->
            </a>
        </li> --}}

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
