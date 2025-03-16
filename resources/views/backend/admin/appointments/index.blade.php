@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            إدارة المواعيد
        </h2>

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">اسم المريض</th>
                            <th class="px-4 py-3">البريد الالكتروني</th>
                            <th class="px-4 py-3">القسم</th>
                            <th class="px-4 py-3">الدكتور</th>
                            <th class="px-4 py-3">الهاتف</th>
                            <th class="px-4 py-3">ملاحظات</th>
                            <th class="px-4 py-3">الحالة</th> <!-- العمود الجديد -->
                            <th class="px-4 py-3">العمليات</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($appointments as $appointment)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->name }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->email }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->section->name ?? 'null' }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->doctor->name ?? 'null' }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->phone }}</td>
                                <td class="px-4 py-3 text-sm">{{ $appointment->notes }}</td>
                                <td class="px-4 py-3 text-sm">
                                    <!-- عرض الحالة -->
                                    {{-- @if ($appointment->status == 'تم التأكيد')
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            تم التأكيد
                                        </span>
                                    @elseif($appointment->status == 'في الانتضار')
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-green-400 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            تحت الاجراء
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            ملغى
                                        </span>
                                    @endif --}}


                                    {{-- @if ($appointment->status == 'تم التأكيد')
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            تم التأكيد
                                        </span>
                                    @elseif($appointment->status == 'في الانتضار')
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-yellow-900 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            في الانتظار
                                        </span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-sm font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            ملغى
                                        </span>
                                    @endif --}}

                                    @if ($appointment->status == 'تم التأكيد')
                                    <span
                                        class="px-2 py-1 text-sm font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                        تم التأكيد
                                    </span>
                                @elseif($appointment->status ==  'في الانتضار')
                                    <span
                                    class="px-2 py-1 text-sm font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        في الانتظار
                                    </span>
                                @else
                                    <span
                                        class="px-2 py-1 text-sm font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                        ملغى
                                    </span>
                                @endif
                                

                                </td>
                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <!-- زر التأكيد -->
                                    <button type="button"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-green-400 dark:hover:text-green-300 hover:bg-green-50 dark:hover:bg-green-900 transition duration-200"
                                        data-bs-toggle="modal" data-bs-target="#approval{{ $appointment->id }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <!-- زر الرفض -->
                                    <button type="button"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-red-400 dark:hover:text-red-300"
                                        data-toggle="modal" data-target="#Refusal{{ $appointment->id }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>

                            <!-- Modal للتأكيد -->
                            @include('backend.admin.appointments.approval')

                            <!-- Modal للرفض -->
                            {{-- @include('Dashboard.appointments.refusal', ['appointment' => $appointment]) --}}
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sm:grid-cols-9">
                <span class="flex items-center col-span-3">
                    {{-- يعرض {{ $appointments->firstItem() }} - {{ $appointments->lastItem() }} من {{ $appointments->total() }} --}}
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination Links -->
                {{-- {{ $appointments->links() }} --}}
            </div>
        </div>
    </div>
@endsection

@push('js')
    <!-- Scripts للتعامل مع Modals -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // إضافة أي scripts إضافية هنا
        });
    </script>
@endpush
