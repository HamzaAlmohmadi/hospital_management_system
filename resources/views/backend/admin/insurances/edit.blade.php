@extends('backend.admin.layouts.master')

@section('content')
<!-- المحتوى الرئيسي -->
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
        تعديل تأمين
    </h2>
    <form method="POST" action="{{ route('admin.insurances.update', $insurance->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- إدخال اسم التأمين -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> اسم التأمين </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="name"
                    placeholder="أدخل اسم التأمين"
                    value="{{ old('name', $insurance->name) }}"
                    required
                />
                @error('name')
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
                >{{ old('notes', $insurance->notes) }}</textarea>
                @error('notes')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال كود التأمين -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> كود التأمين </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="insurance_code"
                    placeholder="أدخل كود التأمين"
                    value="{{ old('insurance_code', $insurance->insurance_code) }}"
                    required
                />
                @error('insurance_code')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال نسبة الخصم -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> نسبة الخصم </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="discount_percentage"
                    placeholder="أدخل نسبة الخصم"
                    value="{{ old('discount_percentage', $insurance->discount_percentage) }}"
                    required
                />
                @error('discount_percentage')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال نسبة الشركة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> نسبة الشركة </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="Company_rate"
                    placeholder="أدخل نسبة الشركة"
                    value="{{ old('Company_rate', $insurance->Company_rate) }}"
                    required
                />
                @error('Company_rate')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- تحديد حالة التأمين -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> حالة التأمين </label>
                <select
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="status"
                    required
                >
                    <option value="1" {{ $insurance->status == 1 ? 'selected' : '' }}>فعال</option>
                    <option value="0" {{ $insurance->status == 0 ? 'selected' : '' }}>غير فعال</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- زر الإرسال -->
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                حفظ التعديلات
            </button>
        </div>
    </form>
</div>
@endsection

@push('js')
@endpush