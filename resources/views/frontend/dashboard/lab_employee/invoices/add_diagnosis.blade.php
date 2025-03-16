@extends('frontend.dashboard.lab_employee.layouts.master')

@section('title')
    اضافة تشخيص
@stop

@section('css')
    <!-- إضافة أي ملفات CSS إضافية هنا -->
@endsection

@section('content')


    <div class="text-right">
        <section class="section">
            <div class="section-header">
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">لوحة التحكم</a></div>
                    <div class="breadcrumb-item">اضافة تشخيص</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('lab.invoices_lab_employe.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="invoice_id" value="{{ $invoice->id }}">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">التشخيص</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description_employee" rows="3"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">المرفقات</label>
                                        <input type="file" name="photos[]" accept="image/*" multiple>
                                    </div>
                                    <button type="submit" class="btn btn-primary">تاكيد</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <!-- إضافة أي ملفات JS إضافية هنا -->
@endsection