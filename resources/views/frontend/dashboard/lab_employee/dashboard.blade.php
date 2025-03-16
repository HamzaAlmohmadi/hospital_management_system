@extends('frontend.dashboard.lab_employee.layouts.master')

@section('title')
    لوحة تحكم موظف المختبر
@endsection

@section('content')
    <!-- المحتوى الرئيسي -->
    <!-- ======================= Cards ================== -->
    <div class="cardBox">
        <div class="card">
            <div>
                <div class="numbers">15</div>
                <div class="cardName">التحاليل اليوم</div> <!-- Today's Tests -->
            </div>

            <div class="iconBx">
                <ion-icon name="flask-outline"></ion-icon> <!-- أيقونة التحاليل -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">8</div>
                <div class="cardName">المرضى الجدد</div> <!-- New Patients -->
            </div>

            <div class="iconBx">
                <ion-icon name="people-outline"></ion-icon> <!-- أيقونة المرضى -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">5</div>
                <div class="cardName">الرسائل غير المقروءة</div> <!-- Unread Messages -->
            </div>

            <div class="iconBx">
                <ion-icon name="chatbubbles-outline"></ion-icon> <!-- أيقونة الرسائل -->
            </div>
        </div>

        <div class="card">
            <div>
                <div class="numbers">$1,200</div>
                <div class="cardName">الإيرادات الشهرية</div> <!-- Monthly Earnings -->
            </div>

            <div class="iconBx">
                <ion-icon name="cash-outline"></ion-icon> <!-- أيقونة الإيرادات -->
            </div>
        </div>
    </div>

    <!-- ================ Order Details List ================= -->
    <div class="details">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>التحاليل المعلقة</h2> <!-- Pending Tests -->
                <a href="#" class="btn">عرض الكل</a> <!-- View All -->
            </div>

            <table>
                <thead>
                    <tr>
                        <td>التاريخ</td> <!-- Date -->
                        <td>اسم المريض</td> <!-- Patient Name -->
                        <td>نوع التحليل</td> <!-- Test Type -->
                        <td>الحالة</td> <!-- Status -->
                        <td>الإجراءات</td> <!-- Actions -->
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>10/10/2023</td>
                        <td>محمد أحمد</td> <!-- Mohamed Ahmed -->
                        <td>تحليل دم</td> <!-- Blood Test -->
                        <td><span class="status pending">قيد الانتظار</span></td> <!-- Pending -->
                        <td><a href="#" class="btn">تفاصيل</a></td> <!-- Details -->
                    </tr>

                    <tr>
                        <td>15/10/2023</td>
                        <td>سارة خالد</td> <!-- Sara Khaled -->
                        <td>تحليل بول</td> <!-- Urine Test -->
                        <td><span class="status inProgress">قيد التجهيز</span></td> <!-- In Progress -->
                        <td><a href="#" class="btn">تفاصيل</a></td> <!-- Details -->
                    </tr>

                    <tr>
                        <td>20/10/2023</td>
                        <td>علي حسن</td> <!-- Ali Hassan -->
                        <td>تحليل كوليسترول</td> <!-- Cholesterol Test -->
                        <td><span class="status delivered">مكتمل</span></td> <!-- Completed -->
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
                            تم إضافة تحليل جديد لمحمد أحمد <br />
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
                            تقرير تحليل جاهز لسارة خالد <br />
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
                            لديك رسالة جديدة من علي حسن <br />
                            <span>01/10/2023</span> <!-- Date -->
                        </h4>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
