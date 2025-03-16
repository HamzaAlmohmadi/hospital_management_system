@extends('frontend.dashboard.patient.layouts.master')
@section('title')
    الكشوفات
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/css/lightgallery.min.css">
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">صور الاشعة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    {{ $ray->Patient->name }}</span>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="form-group">
        <label for="exampleFormControlTextarea1">ملاحظات دكتور الاشعة</label>
        <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $ray->description_employee }}</textarea>
    </div>

    <div class="demo-gallery">
        <ul id="lightgallery" class="list-unstyled row row-sm pr-0">
            @foreach ($ray->images as $image)
                <li class="col-sm-6 col-lg-4" data-src="{{ Storage::url($image->filename) }}">
                    <a href="{{ Storage::url($image->filename) }}">
                        <img width="350px" height="350px" class="img-responsive" src="{{ Storage::url($image->filename) }}"
                            alt="NoImg">
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lightgallery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lg-thumbnail.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.10.0/js/lg-fullscreen.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            lightGallery(document.getElementById('lightgallery'), {
                thumbnail: true,
                mode: 'lg-fade',
                download: false
            });
        });
    </script>
@endsection
