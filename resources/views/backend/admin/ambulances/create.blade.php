

@extends('backend.admin.layouts.master')

@section('content')
<!-- المحتوى الرئيسي -->
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
        إنشاء سيارة إسعاف جديدة
    </h2>
    <form method="POST" action="{{ route('admin.ambulances.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- إدخال اسم السائق -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> اسم السائق </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="driver_name"
                    placeholder="أدخل اسم السائق"
                    required
                />
                @error('driver_name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال ملاحظات -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> ملاحظات </label>
                <textarea
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="notes"
                    placeholder="أدخل ملاحظات"
                ></textarea>
                @error('notes')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال رقم السيارة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> رقم السيارة </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="car_number"
                    placeholder="أدخل رقم السيارة"
                    required
                />
                @error('car_number')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال موديل السيارة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> موديل السيارة </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="car_model"
                    placeholder="أدخل موديل السيارة"
                    required
                />
                @error('car_model')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال سنة صنع السيارة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> سنة الصنع </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="car_year_made"
                    placeholder="أدخل سنة الصنع"
                    required
                />
                @error('car_year_made')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال رقم رخصة السائق -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> رقم رخصة السائق </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="driver_license_number"
                    placeholder="أدخل رقم رخصة السائق"
                    required
                />
                @error('driver_license_number')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- إدخال رقم هاتف السائق -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> رقم هاتف السائق </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="driver_phone"
                    placeholder="أدخل رقم هاتف السائق"
                    required
                />
                @error('driver_phone')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- تحديد حالة السيارة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> حالة السيارة </label>
                <select
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="is_available"
                    required
                >
                    <option value="1">متاحة</option>
                    <option value="0">غير متاحة</option>
                </select>
                @error('is_available')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <!-- تحديد نوع السيارة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> نوع السيارة </label>
                <select
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="car_type"
                    required
                >
                    <option value="1">نوع 1</option>
                    <option value="2">نوع 2</option>
                    <option value="3">نوع 3</option>
                </select>
                @error('car_type')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- زر الإرسال -->
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                حفظ
            </button>
        </div>
    </form>
</div>
@endsection

@push('js')
@endpush