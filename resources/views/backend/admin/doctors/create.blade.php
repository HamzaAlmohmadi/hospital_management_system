
@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto dark:bg-gray-900">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            إنشاء طبيب جديد
        </h2>
        <form method="POST" action="{{ route('admin.doctors.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- إدخال اسم الطبيب -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> اسم الطبيب </label>
                    <input class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input" name="name" placeholder="أدخل اسم الطبيب" required />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال البريد الإلكتروني -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> البريد الإلكتروني </label>
                    <input class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input" type="email" name="email" placeholder="أدخل البريد الإلكتروني" required />
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال كلمة المرور -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> كلمة المرور </label>
                    <input class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input" type="password" name="password" placeholder="أدخل كلمة المرور" required />
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال رقم الهاتف -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> رقم الهاتف </label>
                    <input class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input" name="phone" placeholder="أدخل رقم الهاتف" required />
                    @error('phone')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- إدخال الصورة -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> صورة </label>
                    <input class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-input" type="file" name="image" />
                    @error('image')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- تحديد القسم -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> القسم </label>
                    <select class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-select" name="section_id" required>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}">{{ $section->name }}</option>
                        @endforeach
                    </select>
                    @error('section_id')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- تحديد حالة الطبيب -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> حالة الطبيب </label>
                    <select class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-select" name="status" required>
                        <option value="1">مفعل</option>
                        <option value="0">غير مفعل</option>
                    </select>
                    @error('status')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
                <!-- تحديد أيام الدوام -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> أيام الدوام </label>
                    <select class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 form-select" name="days[]" multiple required>
                        @foreach($days as $day)
                            <option value="{{ $day->id }}">{{ $day->name }}</option>
                        @endforeach
                    </select>
                    @error('days')
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
