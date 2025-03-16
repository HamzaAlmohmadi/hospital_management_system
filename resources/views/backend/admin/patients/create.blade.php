@extends('backend.admin.layouts.master')

@section('content')
    <!-- المحتوى الرئيسي -->
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
            إنشاء مريض جديد
        </h2>
        <form method="POST" action="{{ route('admin.patients.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- إدخال اسم المريض -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> اسم المريض </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="name" placeholder="أدخل اسم المريض" required />
                    @error('name')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال العنوان -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> العنوان </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="Address" placeholder="أدخل العنوان" required />
                    @error('Address')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال البريد الإلكتروني -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> البريد الإلكتروني </label>
                    <input type="email"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="email" placeholder="أدخل البريد الإلكتروني" required />
                    @error('email')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال كلمة المرور -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> كلمة المرور </label>
                    <input type="password"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="password" placeholder="أدخل كلمة المرور" required />
                    @error('password')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال تاريخ الميلاد -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> تاريخ الميلاد </label>
                    <input type="date"
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="Date_Birth" placeholder="أدخل تاريخ الميلاد" required />
                    @error('Date_Birth')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال رقم الهاتف -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> رقم الهاتف </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="Phone" placeholder="أدخل رقم الهاتف" required />
                    @error('Phone')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- تحديد الجنس -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> الجنس </label>
                    <select
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                        name="Gender" required>
                        <option value="Male">ذكر</option>
                        <option value="Female">أنثى</option>
                    </select>
                    @error('Gender')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>

                <!-- إدخال فصيلة الدم -->
                <div class="block text-sm">
                    <label class="text-gray-700 dark:text-gray-300"> فصيلة الدم </label>
                    <input
                        class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                        name="Blood_Group" placeholder="أدخل فصيلة الدم" required />
                    @error('Blood_Group')
                        <span class="text-red-500 text-xs">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <!-- زر الإرسال -->
            <div class="mt-6">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                    حفظ
                </button>
            </div>
        </form>
    </div>
@endsection

@push('js')
@endpush
