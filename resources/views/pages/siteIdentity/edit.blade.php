@extends('layouts.app')

@section('title', 'Product Create')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Site Identity</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Site Identity</a></div>
                    <div class="breadcrumb-item">Edit Site Identity</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Site Identity</h2>
                <div class="card">
                    <form action="{{ route('site-identity.update', $siteIdentity->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name Website</label>
                                <input type="text" class="form-control @error('name_website') is-invalid  @enderror"
                                    name="name_website" value="{{ $siteIdentity->name_website }}">
                                @error('name_website')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Name Apk</label>
                                <input type="text" class="form-control @error('name_apk') is-invalid  @enderror"
                                    name="name_apk" value="{{ $siteIdentity->name_apk }}">
                                @error('name_apk')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Logo <span>upluod Logo jika ingin mengganti</span></label>
                                <br>
                                <img class="img-fluid my-3" src="{{ asset($siteIdentity->logo) }}" alt="">
                                <br>
                                <input type="file" class="form-control @error('logo') is-invalid  @enderror"
                                    name="logo">
                                @error('logo')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
