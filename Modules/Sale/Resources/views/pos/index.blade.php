@extends('layouts.app')

@section('title', 'POS')

@section('third_party_stylesheets')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">POS</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('utils.alerts')
            </div>
            <div class="col-lg-7">
                <livewire:search-product />
                <livewire:pos.product-list :categories="$product_categories" />
            </div>
            <div class="col-lg-5">
                <livewire:pos.checkout :cart-instance="'sale'" :customers="$customers" />
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {{-- <script src="{{ asset('js/jquery-mask-money.js') }}"></script> --}}
    {{-- <script>
        const totalamount = document.getElementById('total_amount').value;
        const paidamount = document.getElementById('paid_amount').value;
        window.autoNumericElements = [{
                id: 'total_amount',
                value: totalamount
            },
            {
                id: 'paid_amount',
                value: paidamount
            }
        ];
    </script> --}}
    <script>
        $(document).ready(function() {
            window.addEventListener('showCheckoutModal', event => {
                $('#checkoutModal').modal('show');

                // Initialize AutoNumeric for total_amount
                new AutoNumeric('#total_amount', {
                    currencySymbol: 'Rp ',
                    decimalPlaces: 2,
                    unformatOnSubmit: true,
                    minValue: 0,
                });

                // Initialize AutoNumeric for paid_amount
                new AutoNumeric('#paid_amount', {
                    currencySymbol: 'Rp ',
                    decimalPlaces: 2,
                    unformatOnSubmit: true,
                    minValue: 0,
                });
            });
        });
    </script>
@endpush
