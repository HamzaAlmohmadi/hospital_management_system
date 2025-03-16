{{-- @extends('backend.admin.layouts.master')

@section('content')
<!-- المحتوى الرئيسي -->
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700">
        تعديل الخدمة
    </h2>
    <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- إدخال اسم الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700"> اسم الخدمة </label>
                <input class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" name="name" placeholder="أدخل اسم الخدمة" value="{{ old('name', $service->name) }}" required />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال سعر الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700"> السعر </label>
                <input type="number" step="0.01" class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" name="price" placeholder="أدخل سعر الخدمة" value="{{ old('price', $service->price) }}" required />
                @error('price')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال وصف الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700"> الوصف </label>
                <textarea class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input" name="description" placeholder="أدخل وصف الخدمة">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- تحديد حالة الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700"> حالة الخدمة </label>
                <select class="block w-full mt-1 text-sm focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select" name="status" required>
                    <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>مفعل</option>
                    <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>غير مفعل</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- زر الإرسال -->
        <div class="mt-6">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue"> حفظ التغييرات </button>
        </div>
    </form>
</div>
@endsection

@push('js')
@endpush --}}


@extends('backend.admin.layouts.master')

@section('content')
<!-- المحتوى الرئيسي -->
<div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-300">
        تعديل الخدمة
    </h2>
    <form method="POST" action="{{ route('admin.services.update', $service->id) }}">
        @csrf
        @method('PUT')
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- إدخال اسم الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> اسم الخدمة </label>
                <input
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="name" placeholder="أدخل اسم الخدمة" value="{{ old('name', $service->name) }}" required />
                @error('name')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال سعر الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> السعر </label>
                <input type="number" step="0.01"
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="price" placeholder="أدخل سعر الخدمة" value="{{ old('price', $service->price) }}" required />
                @error('price')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- إدخال وصف الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> الوصف </label>
                <textarea
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-input"
                    name="description" placeholder="أدخل وصف الخدمة">{{ old('description', $service->description) }}</textarea>
                @error('description')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>

            <!-- تحديد حالة الخدمة -->
            <div class="block text-sm">
                <label class="text-gray-700 dark:text-gray-300"> حالة الخدمة </label>
                <select
                    class="block w-full mt-1 text-sm text-gray-700 bg-gray-100 border-0 rounded-md dark:bg-gray-700 dark:text-gray-200 dark:placeholder-gray-500 focus:border-blue-400 focus:outline-none focus:shadow-outline-blue form-select"
                    name="status" required>
                    <option value="1" {{ old('status', $service->status) == 1 ? 'selected' : '' }}>مفعل</option>
                    <option value="0" {{ old('status', $service->status) == 0 ? 'selected' : '' }}>غير مفعل</option>
                </select>
                @error('status')
                    <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <!-- زر الإرسال -->
        <div class="mt-6">
            <button type="submit"
                class="px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue dark:bg-blue-700 dark:hover:bg-blue-600">
                حفظ التغييرات
            </button>
        </div>
    </form>
</div>
@endsection

@push('js')
@endpush