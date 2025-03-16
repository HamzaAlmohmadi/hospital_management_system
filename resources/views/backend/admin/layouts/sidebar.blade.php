<aside class="z-20 hidden w-64 overflow-y-auto bg-white dark:bg-gray-800 md:block flex-shrink-0">
    <div class="py-4 text-gray-500 dark:text-gray-400">
        <div class="py-4 text-gray-500 dark:text-gray-400">
            <a class="text-lg font-bold text-gray-800 dark:text-gray-200 block text-center" href="#">
                لوحة التحكم admin
            </a>
        </div>

        <ul class="mt-6">
            <li class="relative px-6 py-3">
                <span class="absolute inset-y-0 left-0 w-1 bg-purple-600 rounded-tr-lg rounded-br-lg"
                    aria-hidden="true"></span>
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="index.html">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                        </path>
                    </svg>
                    <span class="ml-4">الواجهة الرئيسية</span>
                </a>
            </li>
        </ul>

        <ul>

            {{-- <!-- المحادثات -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.messages.index') }}">
                    <!-- أيقونة المحادثات -->
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    <span class="ml-4">المحادثات</span>
                </a>
            </li> --}}

            <!-- الأقسام -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.sections.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">الاقسام</span>
                </a>
            </li>

            <!-- إدارة الأطباء -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.doctors.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                        </path>
                    </svg>
                    <span class="ml-4">ادارة الاطباء</span>
                </a>
            </li>

            <!-- إدارة المرضى -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.patients.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                        <path d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
                    </svg>
                    <span class="ml-4">ادارة المرضى</span>
                </a>
            </li>

            <!-- سيارات الإسعاف -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.ambulances.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122">
                        </path>
                    </svg>
                    <span class="ml-4">سيارات الاسعاف</span>
                </a>
            </li>

            <!-- موظف الأشعة -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.ray_employees.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                    </svg>
                    <span class="ml-4"> موظف الأشعة </span>
                </a>
            </li>

            <!-- موظف المختبر -->
            <li class="relative px-6 py-3">
                <a class="inline-flex items-center w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                    href="{{ route('admin.laboratorie_employees.index') }}">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z">
                        </path>
                    </svg>
                    <span class="ml-4"> موظف المختبر </span>
                </a>
            </li>
            <!-- الخدمات -->
            <li class="relative px-6 py-3" x-data="{ toggleServicesMenu: false }">
                <button
                    class="inline-flex items-center justify-between w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800"
                    @click="toggleServicesMenu = !toggleServicesMenu" aria-haspopup="true">
                    <span class="inline-flex items-center">
                        <!-- أيقونة الخدمات -->
                        <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z">
                            </path>
                        </svg>
                        <span class="ml-4">الخدمات</span>
                    </span>
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <ul x-show="toggleServicesMenu" x-transition
                    class="p-2 mt-2 space-y-2 text-sm font-medium text-gray-500 rounded-md shadow-inner bg-gray-50">
                    <!-- خدمة مفردة -->
                    <li class="px-2 py-1 hover:text-gray-800">
                        <a class="flex items-center" href="{{ route('admin.services.index') }}">
                            <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            خدمة مفردة
                        </a>
                    </li>

                    <!-- خدمة مجمعة  -->
                    <li class="px-2 py-1 hover:text-gray-800"></li>
                    <a class="flex items-center" href="{{ route('group-services') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        خدمة مجمعة
                    </a>
            </li>


            <!-- إنشاء تأمين جديد -->
            <li class="px-2 py-1 hover:text-gray-800">
                <a class="flex items-center" href="{{ route('admin.insurances.index') }}">
                    <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 4v16m8-8H4"></path>
                    </svg>
                    عرض التأمينات
                </a>
            </li>

        </ul>

        </li>

        <!-- الفواتير (قائمة منسدلة) -->
        <li class="relative px-6 py-3" x-data="{ toggleInvoicesMenu: false }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                @click="toggleInvoicesMenu = !toggleInvoicesMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01">
                        </path>
                    </svg>
                    <span class="ml-4">الفواتير</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <ul x-show="toggleInvoicesMenu" x-transition x-cloak
                class="p-2 mt-2 space-y-2 text-sm font-medium text-gray-500 dark:text-gray-400 rounded-md shadow-inner bg-gray-50 dark:bg-gray-700 z-50">
                <!-- فواتير مجمعة -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.group_invoices.index') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        فواتير مجمعة
                    </a>
                </li>

                <!-- فواتير مفردة -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.single_invoices.index') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        فواتير مفردة
                    </a>
                </li>

            </ul>
        </li>

        <!-- الحسابات (قائمة منسدلة) -->
        <li class="relative px-6 py-3" x-data="{ toggleAccountsMenu: false }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                @click="toggleAccountsMenu = !toggleAccountsMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                        </path>
                    </svg>
                    <span class="ml-4">الحسابات</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <ul x-show="toggleAccountsMenu" x-transition x-cloak
                class="p-2 mt-2 space-y-2 text-sm font-medium text-gray-500 dark:text-gray-400 rounded-md shadow-inner bg-gray-50 dark:bg-gray-700 z-50">
                <!-- سند قبض -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.receipts.index') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        سند قبض
                    </a>
                </li>

                <!-- سند صرف -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.payments.index') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        سند صرف
                    </a>
                </li>
            </ul>
        </li>


        <li class="relative px-6 py-3" x-data="{ toggleAppointmentsMenu: false }">
            <button
                class="inline-flex items-center justify-between w-full text-sm font-semibold text-gray-800 dark:text-gray-200 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-100"
                @click="toggleAppointmentsMenu = !toggleAppointmentsMenu" aria-haspopup="true">
                <span class="inline-flex items-center">
                    <!-- أيقونة المواعيد -->
                    <svg class="w-5 h-5" aria-hidden="true" fill="none" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                        </path>
                    </svg>
                    <span class="ml-4">إدارة المواعيد</span>
                </span>
                <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>

            <ul x-show="toggleAppointmentsMenu" x-transition x-cloak
                class="p-2 mt-2 space-y-2 text-sm font-medium text-gray-500 dark:text-gray-400 rounded-md shadow-inner bg-gray-50 dark:bg-gray-700 z-50">


                <!-- المواعيد تحت الإجراء -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.appointments.index') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        مواعيد تحت الإجراء
                    </a>
                </li>

                <!-- المواعيد المؤكدة -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="{{ route('admin.appointments.indexapproval') }}">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                        مواعيد مؤكدة
                    </a>
                </li>



                <!-- المواعيد المنتهية -->
                <li class="px-2 py-1 hover:text-gray-800 dark:hover:text-gray-100">
                    <a class="flex items-center" href="#">
                        <svg class="w-4 h-4 mr-2" aria-hidden="true" fill="none" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M5 13l4 4L19 7"></path>
                        </svg>
                        المواعيد المنتهية
                    </a>
                </li>
            </ul>
        </li>




        </ul>


    </div>
</aside>
