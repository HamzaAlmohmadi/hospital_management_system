
@extends('frontend.dashboard.doctor.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>الملف الشخصي</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/">لوحة التحكم</a></div>
                <div class="breadcrumb-item">الملف الشخصي</div>
            </div>
        </div>
        <div class="section-body">
            <form action="{{ route('doctor.profile.updateProfile') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group wsus__input">
                    <label>معاينة</label>
                    <br>
                    <img src="{{ asset('storage/' . $profile->image) }}" alt="Doctor Image" width="200">
                    {{-- <img width="200px" src="{{ asset($profile->image) ?? 'null' }}" alt=""> --}}
                </div>






                <div class="row">


                    <div class="col-md-6 form-group wsus__input">
                        <label>الصورة</label>
                        <input type="file" class="form-control" name="image">
                        @error('image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group wsus__input">
                        <label>رقم الجوال </label>
                        <input type="text" class="form-control" name="phone"  value="{{ $profile->phone }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group wsus__input">
                        <label>الاسم</label>
                        <input type="text" class="form-control" name="name" value="{{ $profile->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group wsus__input">
                        <label>البريد الإلكتروني</label>
                        <input type="text" class="form-control" name="email" value="{{ $profile->email }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group wsus__input">
                        <label>كلمة المرور الجديدة</label>
                        <input type="password" class="form-control" name="password">
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-6 form-group wsus__input">
                        <label>تأكيد كلمة المرور</label>
                        <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">تحديث</button>
            </form>
        </div>
    </section>
@endsection

