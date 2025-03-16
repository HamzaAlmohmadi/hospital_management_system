@extends('frontend.dashboard.patient.layouts.master')






@section('content')
    <!-- المحتوى الرئيسي -->
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">5</div>
                <div class="cardName">المواعيد القادمة</div> <!-- Upcoming Appointments -->
            </div>

            <div class="iconBx">
                <ion-icon name="calendar-outline"></ion-icon> <!-- أيقونة المواعيد -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">3</div>
                <div class="cardName">التقارير الطبية</div> <!-- Medical Reports -->
            </div>

            <div class="iconBx">
                <ion-icon name="document-text-outline"></ion-icon> <!-- أيقونة التقارير -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">2</div>
                <div class="cardName">الرسائل غير المقروءة</div> <!-- Unread Messages -->
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon> <!-- أيقونة الرسائل -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">$120</div>
                <div class="cardName">الفواتير المعلقة</div> <!-- Pending Bills -->
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon> <!-- أيقونة الفواتير -->
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>المواعيد الأخيرة</h2> <!-- Recent Appointments -->
                <a href="#" class="btn">عرض الكل</a> <!-- View All -->
            </div>

            <table>
                <thead>
                    <tr>
                        <td>التاريخ</td> <!-- Date -->
                        <td>الطبيب</td> <!-- Doctor -->
                        <td>الحالة</td> <!-- Status -->
                        <td>الإجراءات</td> <!-- Actions -->
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>10/10/2023</td>
                        <td>د. أحمد محمد</td> <!-- Dr. Ahmed Mohamed -->
                        <td><span class="status delivered">مكتمل</span></td> <!-- Completed -->
                        <td><a href="#" class="btn">تفاصيل</a></td> <!-- Details -->
                    </tr>

                    <tr>
                        <td>15/10/2023</td>
                        <td>د. سارة علي</td> <!-- Dr. Sara Ali -->
                        <td><span class="status pending">قيد الانتظار</span></td> <!-- Pending -->
                        <td><a href="#" class="btn">تفاصيل</a></td> <!-- Details -->
                    </tr>

                    <tr>
                        <td>20/10/2023</td>
                        <td>د. خالد حسن</td> <!-- Dr. Khaled Hassan -->
                        <td><span class="status inProgress">قيد التجهيز</span></td> <!-- In Progress -->
                        <td><a href="#" class="btn">تفاصيل</a></td> <!-- Details -->
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- ================= New Notifications ================ -->
        <div class="recentCustomers">
            <div class="cardHeader">
                <h2>الإشعارات الأخيرة</h2> <!-- Recent Notifications -->
            </div>

            <table>
                <tr>
                    <td width="60px">
                        <div class="iconBx">
                            <ion-icon name="notifications-outline"></ion-icon> <!-- أيقونة الإشعارات -->
                        </div>
                    </td>
                    <td>
                        <h4>
                            تم تأكيد موعدك مع د. أحمد محمد <br />
                            <span>10/10/2023</span> <!-- Date -->
                        </h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="iconBx">
                            <ion-icon name="notifications-outline"></ion-icon> <!-- أيقونة الإشعارات -->
                        </div>
                    </td>
                    <td>
                        <h4>
                            تقريرك الطبي جاهز للتحميل <br />
                            <span>05/10/2023</span> <!-- Date -->
                        </h4>
                    </td>
                </tr>

                <tr>
                    <td width="60px">
                        <div class="iconBx">
                            <ion-icon name="notifications-outline"></ion-icon> <!-- أيقونة الإشعارات -->
                        </div>
                    </td>
                    <td>
                        <h4>
                            لديك رسالة جديدة من د. سارة علي <br />
                            <span>01/10/2023</span> <!-- Date -->
                        </h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection






