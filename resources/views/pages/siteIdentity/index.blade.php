@extends('layouts.app')

@section('title', 'All Orders')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Orders</h1>

                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Site Identity</a></div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">

                </div>
                <h2 class="section-title">Site Identity</h2>
                <p class="section-lead">
                    You can manage all Site Identity
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <h4>All Site Identity</h4>
                                </div>
                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Name Website</th>
                                            <th>Name Apk</th>
                                            <th>Logo</th>
                                            <th>Action</th>
                                        </tr>
                                        <tr>
                                            <td>{{ $siteIdentity->name_website }} </td>
                                            <td> {{ $siteIdentity->name_apk }} </td>
                                            <td><img src="{{ asset($siteIdentity->logo) }}" width="100" alt="">
                                            </td>
                                            <td><a href="{{ route('site-identity.edit', $siteIdentity->id) }}"
                                                    class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>
                                            </td>

                                        </tr>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
