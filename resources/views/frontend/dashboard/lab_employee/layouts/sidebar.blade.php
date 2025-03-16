


<div class="navigation">
    <ul>
        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="flask-outline"></ion-icon> <!-- أيقونة المختبر -->
                </span>
                <span class="title">المختبر الطبي</span> <!-- اسم المختبر أو العلامة التجارية -->
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

        {{-- <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="people-outline"></ion-icon>
                </span>
                <span class="title">المرضى</span> <!-- Patients -->
            </a>
        </li> --}}

        <li>
            <a href="{{ route('lab.invoices_lab_employe.index') }}">
                <span class="icon">
                    <ion-icon name="hourglass-outline"></ion-icon> <!-- أيقونة الحالات تحت الإجراء -->
                </span>
                <span class="title">حالات تحت الإجراء</span> <!-- Pending Cases -->
            </a>
        </li>

        <li>
            <a href="{{ route('lab.completed_invoices') }}">
                <span class="icon">
                    <ion-icon name="checkmark-done-outline"></ion-icon> <!-- أيقونة الحالات المكتملة -->
                </span>
                <span class="title">حالات مكتملة</span> <!-- Completed Cases -->
            </a>
        </li>

        <li>
            <a href="#">
                <span class="icon">
                    <ion-icon name="calendar-outline"></ion-icon> <!-- أيقونة المواعيد -->
                </span>
                <span class="title">التحاليل المعلقة</span> <!-- Pending Tests -->
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
                <span class="title">تقارير التحاليل</span> <!-- Test Reports -->
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