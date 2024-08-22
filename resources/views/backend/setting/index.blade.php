@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_setting') . '')
@section('css')
@endsection
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-4">
            <h2>{{ __('menu_wording.menu_setting') }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row mb-3">
            @can('company.index')
                <div class="col-lg-6 col-12">
                    <a href="{{ route('company.index') }}">
                        <div class="widget style1 bg-white">
                            <div class="row">
                                <div class="col-2">
                                    <svg class="icon-2">
                                        <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_setting_company') }}"></use>
                                    </svg>
                                </div>
                                <div class="col-10 text-left pl-3">
                                    <span class="h6 text-title">{{ __('menu_wording.company') }}</span>
                                    <p class="m-b-xs text-sub">
                                        {{ __('menu_wording.company_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('category.index')
                <div class="col-lg-6 col-12">
                    <a href="{{ route('category.index') }}">
                        <div class="widget style1 bg-white">
                            <div class="row">
                                <div class="col-2">
                                    <svg class="icon-2">
                                        <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_setting_categories') }}"></use>
                                    </svg>
                                </div>
                                <div class="col-10 text-left pl-3">
                                    <span class="h6 text-title">{{ __('menu_wording.categories') }}</span>
                                    <p class="m-b-xs text-sub">
                                        {{ __('menu_wording.categories_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('paperprint.index')
                <div class="col-lg-6 col-12">
                    <a href="{{ route('paperprint.index') }}">
                        <div class="widget style1 bg-white">
                            <div class="row">
                                <div class="col-2">
                                    <svg class="icon-2">
                                        <use xlink:href="{{ asset('svg/icon/icon-sprite.svg#ic_setting_print') }}"></use>
                                    </svg>
                                </div>
                                <div class="col-10 text-left">
                                    <span class="h6 text-title">{{ __('menu_wording.print_paper') }}</span>
                                    <p class="m-b-xs text-sub">
                                        {{ __('menu_wording.print_paper_desc') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

        </div>
    </div>

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush
