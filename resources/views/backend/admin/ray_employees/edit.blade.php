@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto dark:bg-gray-900">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            تعديل موظف
        </h2>
        <form method="POST" action="{{ route('admin.ray_employees.update', $rayEmployee->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- استخدام طريقة PUT للتحديث -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- إدخال اسم الموظف -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> اسم الموظف </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input"
                        name="name" placeholder="أدخل اسم الموظف" value="{{ old('name', $rayEmployee->name) }}"
                        required />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال البريد الإلكتروني -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> البريد الإلكتروني </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input"
                        type="email" name="email" placeholder="أدخل البريد الإلكتروني"
                        value="{{ old('email', $rayEmployee->email) }}" required />
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال كلمة المرور -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> كلمة المرور </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input"
                        type="password" name="password" placeholder="أدخل كلمة المرور" />
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال تأكيد كلمة المرور -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> تأكيد كلمة المرور </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input"
                        type="password" name="password_confirmation" placeholder="أعد إدخال كلمة المرور" />
                </div>
            </div>
            <!-- زر الإرسال -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                    تحديث
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
@endpush
