@extends('layouts.layout')
@php
    $title_header = isset($paper) ? __('menu_wording.paper.edit_title') : __('menu_wording.paper.add_title');
@endphp
@section('title', $title_header)
@section('content')
    <style>
        .swal2-show {
            width: 484px !important;
        }
    </style>
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-4">
            <h2>{{ $title_header }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('paperprint.index') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_paper') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row mb-5">
            <div class="col-lg-12">
                <form id="submitData">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>{{ strtoupper($title_header) }}</h4>
                                @if (session('message'))
                                    <div class="alert alert-{{ session('message')['status'] }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        {{ session('message')['desc'] }}
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="enc_id" id="enc_id" value="{{ isset($paper) ? $enc_id : '' }}">

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-group error-text">
                                        <label for="code">{{ strtoupper(__('menu_wording.form.code')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="code" role="presentation"
                                            autocomplete="off" name="code"
                                            value="{{ isset($paper) ? $paper->code : '' }}"
                                            {{ isset($paper) ? 'readonly' : '' }}>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group error-text">
                                        <label for="name">{{ strtoupper(__('menu_wording.form.name')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="name" role="presentation"
                                            autocomplete="off" name="name"
                                            value="{{ isset($paper) ? $paper->name : '' }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-4">
                                    <div class="form-group error-text">
                                        <label for="width">{{ strtoupper(__('menu_wording.form.width')) }} (CM)<sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="width" name="width"
                                            role="presentation" value="{{ isset($paper) ? $paper->width : '' }}"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group error-text">
                                        <label for="height">{{ strtoupper(__('menu_wording.form.height')) }} (CM)<sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="height" role="presentation"
                                            autocomplete="off" name="height"
                                            value="{{ isset($paper) ? $paper->height : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group error-text">
                                        <label for="status">{{ strtoupper(__('menu_wording.form.status')) }}<sup
                                                class="red">*</sup></label>
                                        <br />
                                        <select class="form-control" id="status" name="status">
                                            @foreach ($status as $key => $item)
                                                <option value="{{ $key }}"
                                                    {{ $selectedstatus == $key ? 'selected' : '' }}>{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="form-group error-text">
                                        <label for="description">{{ strtoupper(__('menu_wording.form.description')) }} <sup
                                                class="red">*</sup></label>
                                        <textarea class="form-control" id="description" name="description" role="presentation" autocomplete="off"
                                            cols="3">{{ isset($paper) ? $paper->description : '' }}</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <div class="text-right">
                            <button class="btn btn-primary btn-md" type="submit" id="simpan">
                                <svg class="icon icon-cta">
                                    <use xlink:href="{{ asset('svg/action/cta-sprite.svg#save') }}"></use>
                                </svg>{{ isset($paper) ? strtoupper(__('menu_wording.btn.update')) : strtoupper(__('menu_wording.btn.submit')) }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script language="javascript" type="text/javascript">
        $(document).ready(function() {
            $('#submitData').validate({
                rules: {
                    code: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    width: {
                        required: true,
                    },
                    height: {
                        required: true,
                    },
                    description: {
                        required: true
                    },
                    status: {
                        required: true
                    }
                },
                messages: {
                    code: {
                        required: "{{ __('menu_wording.validation.code') }}"
                    },
                    name: {
                        required: "{{ __('menu_wording.validation.name') }}"
                    },
                    width: {
                        required: "{{ __('menu_wording.validation.width') }}",
                    },
                    height: {
                        required: "{{ __('menu_wording.validation.height') }}",
                    },
                    description: {
                        required: "{{ __('menu_wording.validation.description') }}",
                    },
                    status: {
                        required: "{{ __('menu_wording.validation.status') }}",
                    },
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
                submitHandler: function(form) {
                    Swal.showLoading();
                    SimpanData();
                }
            });
        });

        function SimpanData() {
            $('#simpan').addClass("disabled");
            var form = $('#submitData').serializeArray()
            var dataFile = new FormData()
            $.each(form, function(idx, val) {
                dataFile.append(val.name, val.value)
            })
            $.ajax({
                type: 'POST',
                url: "{{ route('paperprint.submit') }}",
                headers: {
                    'X-CSRF-TOKEN': $('[name="_token"]').val()
                },
                data: dataFile,
                processData: false,
                contentType: false,
                dataType: "json",
                beforeSend: function() {
                    Swal.showLoading();
                },
                success: function(data) {
                    if (data.success) {
                        Swal.close();
                        Swal.fire('Yes', data.message, 'info');
                        setTimeout(function() {
                            window.location.replace('{{ route('paperprint.index') }}');
                        }, 1000);
                    } else {
                        Swal.fire('Ups', data.message, 'info');
                    }
                },
                complete: function() {
                    Swal.hideLoading();
                    $('#simpan').removeClass("disabled");
                },
                error: function(data) {
                    $('#simpan').removeClass("disabled");
                    Swal.hideLoading();
                    Swal.fire('Ups', data.message, 'error');
                }
            });
        }
    </script>
@endpush
