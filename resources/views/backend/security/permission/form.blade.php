@extends('layouts.layout')
@php
    $title_header = isset($permission)
        ? __('menu_wording.permission.edit_title')
        : __('menu_wording.permission.add_title');
@endphp
@section('title', $title_header)
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-4">
            <h2>{{ $title_header }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('menu_wording.menu_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('permission.index') }}">{{ __('menu_wording.menu_permission') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            @if (session('message'))
                                <div class="alert alert-{{ session('message')['status'] }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session('message')['desc'] }}
                                </div>
                            @endif
                        </div>
                        <form id="submitData" method="POST"
                            action="{{ isset($permission) ? route('permission.save', $enc_id) : route('permission.save') }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-group error-text">
                                        <label for="name">{{ strtoupper(__('menu_wording.form.name')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ isset($permission) ? $permission->name : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="slug">{{ strtoupper(__('menu_wording.form.slug')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="slug" name="slug"
                                            value="{{ isset($permission) ? $permission->slug : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="order">{{ strtoupper(__('menu_wording.form.order')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="urutan" name="urutan"
                                            value="{{ isset($permission) ? $permission->nested : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-right">
                                    <button class="btn btn-primary btn-md" type="submit" id="simpan">
                                        <svg class="icon icon-cta">
                                            <use xlink:href="{{ asset('svg/action/cta-sprite.svg#save') }}"></use>
                                        </svg>
                                        {{ isset($permission) ? strtoupper(__('menu_wording.btn.update')) : strtoupper(__('menu_wording.btn.submit')) }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {

            $('#submitData').validate({
                focusInvalid: false,
                rules: {
                    name: {
                        required: true
                    },
                    slug: {
                        required: true
                    },
                    urutan: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "{{ __('menu_wording.validation.name') }}"
                    },
                    slug: {
                        required: "{{ __('menu_wording.validation.slug') }}"
                    },
                    urutan: {
                        required: "{{ __('menu_wording.validation.order') }}"
                    }
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.error-text').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endpush
