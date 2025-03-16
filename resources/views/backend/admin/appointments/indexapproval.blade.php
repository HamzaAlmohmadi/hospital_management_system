@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            المواعيد المؤكدة
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
                                    @if ($appointment->status == 'تم التأكيد')
                                        <span class="px-2 py-1 text-sm font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            تم التأكيد
                                        </span>
                                    @elseif($appointment->status == 'في الانتظار')
                                        <span class="px-2 py-1 text-sm font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                            في الانتظار
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-sm font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                            ملغى
                                        </span>
                                    @endif
                                </td>
                            </tr>
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