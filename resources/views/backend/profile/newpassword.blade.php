@extends('layouts.layout')
@php
    $title_header = __('menu_wording.menu_profile_password');
@endphp
@section('title', $title_header)
@section('content')
    <style>
        .swal2-show {
            width: 484px !important;
        }
    </style>
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-6 col-4">
            <h2>{{ strtoupper(__('menu_wording.menu_profile_password')) }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ strtoupper(__('menu_wording.menu_home')) }}</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>{{ strtoupper($title_header) }}</strong>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <form id="submitData">
                    <div class="ibox">
                        <div class="ibox-title">
                            @if (session('message'))
                                <div class="alert alert-{{ session('message')['status'] }}">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    {{ session('message')['desc'] }}
                                </div>
                            @endif
                        </div>
                        <div class="ibox-content">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="password_old">{{ strtoupper(__('menu_wording.form.password_old')) }}
                                            <sup class="red">*</sup></label>
                                        <input type="password" class="form-control" id="password_old" name="password_old">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="password_new">{{ strtoupper(__('menu_wording.form.password_new')) }}
                                            <sup class="red">*</sup></label>
                                        <input type="password" class="form-control" id="password_new" name="password_new"
                                            passwordCheck="passwordCheck">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-right">
                            <button class="btn btn-primary btn-md" type="submit" id="simpan">
                                <svg class="icon icon-cta">
                                    <use xlink:href="{{ asset('svg/action/cta-sprite.svg#save') }}"></use>
                                </svg>
                                {{ strtoupper(__('menu_wording.btn.update')) }}</button>
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
                    password_old: {
                        required: true,
                    },
                    password_new: {
                        required: true,
                        minlength: 8,
                    },
                },
                messages: {
                    password_old: {
                        required: "{{ __('menu_wording.validation.password') }}"
                    },
                    password_new: {
                        required: "{{ __('menu_wording.validation.password') }}",
                        minlength: "Minimal 5 karakter"
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
                url: "{{ route('profile.savePassword') }}",
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
                        Swal.fire('Yes', data.message, 'success');
                        setTimeout(function() {
                            window.location.replace('{{ route('dashboard') }}');
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
                    Swal.fire('Ups', data.message, 'info');
                }
            });
        }
    </script>
@endpush
