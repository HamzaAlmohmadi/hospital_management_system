


<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="medical-outline"></ion-icon> <!-- أيقونة طبية -->
                </span>
                <span class="title">العيادة الطبية</span> <!-- اسم العيادة أو العلامة التجارية -->
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

        <li>
            <a href="{{ route('doctor.newCases') }}">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">حالات تحت الاجراء</span> <!-- New Cases -->
            </a>
        </li>

        <!-- الحالات المكتملة -->
        <li>
            <a href="{{ route('doctor.completedCases') }}">
                <span class="icon">
                    <ion-icon name="checkmark-done-outline"></ion-icon> <!-- أيقونة الحالات المكتملة -->
                </span>
                <span class="title">الحالات المكتملة</span> <!-- Completed Cases -->
            </a>
        </li>

        <!-- حالات قيد المراجعة -->
        <li>
            <a href="{{ route('doctor.underReviewCases') }}">
                <span class="icon">
                    <ion-icon name="time-outline"></ion-icon> <!-- أيقونة حالات قيد المراجعة -->
                </span>
                <span class="title">حالات قيد المراجعة</span> <!-- Pending Cases -->
            </a>
        </li>

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">المرضى</span> <!-- Patients -->
            </a>
        </li> --}}

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="calendar-outline"></ion-icon> <!-- أيقونة المواعيد -->
                </span>
                <span class="title">المواعيد</span> <!-- Appointments -->
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
                <span class="title">التقارير</span> <!-- Reports -->
            </a>
        </li>

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="settings-outline"></ion-icon>
                </span>
                <span class="title">الإعدادات</span> <!-- Settings -->
            </a>
        </li> --}}

        <li>
            <a href="{{ route('doctor.profile.index') }}">
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
