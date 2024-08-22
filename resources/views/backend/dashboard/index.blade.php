@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_home') . '')
@section('css')
    <style>
        .bg {
            background-color: '#828280';
        }
    </style>
@endsection
@section('content')
    <div class="row wrapper page-heading">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-10 text-left pl-3" style="display: flex;align-items: center;">
                    <svg class="icon-2" style="margin-right: 10px;">
                        <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_company') }}"></use>
                    </svg>
                    <div style="display: flex;flex-direction: column;">
                        <span class="h6 text-title">Halo, {{ ucfirst(Auth::user()->name) }}</span>
                        <p class="m-b-xs text-uppercase strong font-weight-bold">
                            SMK YPM 4 Taman
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="widget style1">
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>Order Today</span>
                            <h3 class="font-weight-bold" style="margin-top: -7px;">UNPAID</h3>
                        </div>
                        <div class="col-12 text-right">
                            <h3 class="font-weight-bold txt-primary" style="margin-top: -5px;">10</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="widget style1">
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>Order Today</span>
                            <h3 class="font-weight-bold" style="margin-top: -7px;">PAID</h3>
                        </div>
                        <div class="col-12 text-right">
                            <h3 class="font-weight-bold txt-primary" style="margin-top: -5px;">20</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="widget style1">
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>Monthly</span>
                            <h3 class="font-weight-bold" style="margin-top: -7px;">ORDER</h3>
                        </div>
                        <div class="col-12 text-right">
                            <h3 class="font-weight-bold txt-primary" style="margin-top: -5px;">Rp. 30000</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="widget style1">
                    <div class="row">
                        <div class="col-12 text-left">
                            <span>Monthly</span>
                            <h3 class="font-weight-bold" style="margin-top: -7px;">PAYMENT</h3>
                        </div>
                        <div class="col-12 text-right">
                            <h3 class="font-weight-bold txt-primary" style="margin-top: -5px;">Rp. 40000</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12">
                <div class="widget style1">
                    <div class="mb-5">
                        <div class="col-12 text-left mb-5">
                            <h3 class="font-weight-bold" style="margin-top: -10px;">Yearly’s Orders</h3>
                            <span>{{ date('d F Y H:i') }}</span>
                        </div>
                        <canvas id="barChart2" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {

            });

        });
    </script>
@endpush
