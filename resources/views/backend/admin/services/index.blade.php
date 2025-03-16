@extends('backend.admin.layouts.master')

@section('content')
    {{-- <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            قائمة الخدمات
        </h2>

        <!-- زر إنشاء خدمة جديدة -->
        <div class="mb-4">
            <a href="{{ route('admin.services.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
                إنشاء خدمة جديدة
            </a>
        </div>

        <!-- جدول عرض بيانات الخدمات -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3">اسم الخدمة</th>
                            <th class="px-4 py-3">السعر</th>
                            <th class="px-4 py-3">الحالة</th>
                            <th class="px-4 py-3">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($services as $service)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3">{{ $service->name }}</td>
                                <td class="px-4 py-3">{{ $service->price }}</td>
                                <td class="px-4 py-3">
                                    @if ($service->status)
                                        <span
                                            class="px-2 py-1 text-sm font-medium leading-5 text-green-900 bg-green-100 rounded-full">مفعل</span>
                                    @else
                                        <span
                                            class="px-2 py-1 text-sm font-medium leading-5 text-red-900 bg-red-100 rounded-full">غير
                                            مفعل</span>
                                    @endif
                                </td>

                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>

                                    <button type="button"
                                        class="delete-item flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray"
                                        data-url="{{ route('admin.services.destroy', $service->id) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700">
            قائمة الخدمات
        </h2>
    
        <!-- زر إنشاء خدمة جديدة -->
        <div class="mb-4">
            <a href="{{ route('admin.services.create') }}"
                class="bg-purple-600 text-white px-4 py-2 rounded-lg hover:bg-purple-700 transition duration-200">
                إنشاء خدمة جديدة
            </a>
        </div>
    
        <!-- جدول عرض بيانات الخدمات -->
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
{{-- 
                <table class="w-full whitespace-no-wrap border-collapse">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-right text-gray-500 uppercase border-b bg-gray-50">
                            <th class="px-4 py-3 align-middle">اسم الخدمة</th>
                            <th class="px-4 py-3 align-middle">السعر</th>
                            <th class="px-4 py-3 align-middle">الحالة</th>
                            <th class="px-4 py-3 align-middle">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @foreach ($services as $service)
                            <tr class="text-gray-700">
                                <td class="px-4 py-3 text-right align-middle">{{ $service->name }}</td>
                                <td class="px-4 py-3 text-right align-middle">{{ trim($service->price) }}</td>
                                <td class="px-4 py-3 text-right align-middle">
                                    @if ($service->status)
                                        <span class="px-2 py-1 text-sm font-medium leading-5 text-green-900 bg-green-100 rounded-full">مفعل</span>
                                    @else
                                        <span class="px-2 py-1 text-sm font-medium leading-5 text-red-900 bg-red-100 rounded-full">غير مفعل</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <!-- الإجراءات -->
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> --}}

                <table class="w-full whitespace-no-wrap border-collapse dark:bg-gray-800">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-right text-gray-500 uppercase border-b bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                            <th class="px-4 py-3 align-middle">اسم الخدمة</th>
                            <th class="px-4 py-3 align-middle">السعر</th>
                            <th class="px-4 py-3 align-middle">الحالة</th>
                            <th class="px-4 py-3 align-middle">الإجراءات</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($services as $service)
                            <tr class="text-gray-700 dark:text-gray-300">
                                <td class="px-4 py-3 text-right align-middle">{{ $service->name }}</td>
                                <td class="px-4 py-3 text-right align-middle">{{ trim($service->price) }}</td>
                                <td class="px-4 py-3 text-right align-middle">
                                    @if ($service->status)
                                        <span class="px-2 py-1 text-sm font-medium leading-5 text-green-900 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">مفعل</span>
                                    @else
                                        <span class="px-2 py-1 text-sm font-medium leading-5 text-red-900 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">غير مفعل</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm flex space-x-2">
                                    <a href="{{ route('admin.services.edit', $service->id) }}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-purple-400 dark:hover:text-purple-300"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                    
                                    <button type="button"
                                        class="delete-item flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-red-600 rounded-lg focus:outline-none focus:shadow-outline-gray dark:text-red-400 dark:hover:text-red-300"
                                        data-url="{{ route('admin.services.destroy', $service->id) }}">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
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
@endpush
