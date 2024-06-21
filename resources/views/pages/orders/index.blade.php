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
                    <div class="breadcrumb-item"><a href="#">Orders</a></div>
                    <div class="breadcrumb-item">All Orders</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Orders</h2>
                <p class="section-lead">
                    You can manage all Orders, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-left">
                                    <h4>All Posts</h4>
                                </div>



                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Transaction Time</th>
                                            <th>Total Price</th>
                                            <th>Total Quantity</th>
                                            <th>Payment Method</th>
                                            <th>Kasir</th>
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $order->transaction_time }} </td>
                                                <td> {{ $order->total_price }} </td>
                                                <td>{{ $order->total_item }}</td>
                                                <td>{{ $order->payment_method }}</td>
                                                <td>{{ $order->kasir->name }}</td>
                                                <td><a href="{{ route('order.show', $order->id) }}" class="btn btn-primary">
                                                        <i class="fas fa-eye"></i>
                                                </td>

                                            </tr>
                                        @endforeach


                                    </table>
                                </div>
                                <div class="float-right">
                                    {{ $orders->withQueryString()->links() }}
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
