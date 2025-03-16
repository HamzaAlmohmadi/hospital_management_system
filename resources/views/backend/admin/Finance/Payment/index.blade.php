@extends('backend.admin.layouts.master')

@section('css')
    <link href="{{ URL::asset('dashboard/plugins/pickerjs/picker.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('dashboard/plugins/spectrum-colorpicker/spectrum.css') }}" rel="stylesheet">
@endsection

@section('title')
    سندات الصرف
@stop

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            سندات الصرف
        </h2>

        <!-- زر إضافة سند جديد -->
        <div class="mb-4">
            <a href="{{ route('admin.payments.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200 dark:bg-purple-700 dark:hover:bg-purple-600">
                إضافة سند جديد
            </a>
        </div>

        <!-- جدول عرض بيانات السندات -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">اسم المريض</th>
                            <th class="px-4 py-3">المبلغ</th>
                            <th class="px-4 py-3">البيان</th>
                            <th class="px-4 py-3">تاريخ الإضافة</th>
                            <th class="px-4 py-3">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($payments as $receipt)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3">{{ $receipt->patient->name }}</td>
                                <td class="px-4 py-3">{{ number_format($receipt->amount, 2) }}</td>
                                <td class="px-4 py-3">{{ \Str::limit($receipt->description, 50) }}</td>
                                <td class="px-4 py-3">{{ $receipt->created_at->diffForHumans() }}</td>
                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('admin.payments.edit', $receipt->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-purple-400 dark:hover:text-purple-300"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button type="button"
                                        class="delete-item flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-red-400 dark:hover:text-red-300"
                                        data-url="{{ route('admin.payments.destroy', $receipt->id) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>

                                    <a href="{{ route('admin.payments.show', $receipt->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-green-600 rounded-lg dark:text-green-400 dark:hover:text-green-300"
                                        target="_blank" title="طباعة سند قبض">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ URL::asset('dashboard/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ URL::asset('/plugins/notify/js/notifit-custom.js') }}"></script>
@endpush
