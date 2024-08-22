@extends('layouts.layout')
@section('title', __('menu_wording.company'))
@section('content')
    <style>
        .swal2-show {
            width: 484px !important;
        }
    </style>
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-4">
            <h2>{{ __('menu_wording.company') }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('setting.index') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_setting') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <form id="submitData">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>{{ strtoupper(__('menu_wording.company')) }}</h4>
                                @if (session('message'))
                                    <div class="alert alert-{{ session('message')['status'] }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        {{ session('message')['desc'] }}
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group row">
                                <div class="col-md-1">
                                    <div class="form-group error-text">
                                        <img src="{{ isset($company) ? url($company->logo) : url('files/logo/no_img.png') }}"
                                            class="img-fluid rounded-circle" id="preview_img" width="100px;" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group error-text">
                                        <label for="file">{{ __('menu_wording.form.company_logo') }}</label>
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="code">{{ __('menu_wording.form.company_code') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="code" role="presentation"
                                            autocomplete="off" name="code"
                                            value="{{ isset($company) ? $company->code : '' }}"
                                            onblur="this.value=removeSpaces(this.value);">
                                        <span style="margin-top: 0.25rem;font-size: 80%;color: #41393a;"
                                            class="font-italic">Contoh 001 (digunakan untuk penomoran nota)</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="name">{{ __('menu_wording.form.company_name') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="name" role="presentation"
                                            autocomplete="off" name="name"
                                            value="{{ isset($company) ? $company->name : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="phone">{{ __('menu_wording.form.company_phone') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            role="presentation" onkeypress="return isPhone(event)"
                                            value="{{ isset($company) ? $company->no_hp : '' }}" autocomplete="off">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="address">{{ __('menu_wording.form.company_address') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            role="presentation" autocomplete="off"
                                            value="{{ isset($company) ? $company->address : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="email">{{ __('menu_wording.form.company_email') }} <sup
                                                class="red">*</sup></label>
                                        <input type="email" class="form-control" id="email" role="presentation"
                                            autocomplete="off" name="email"
                                            value="{{ isset($company) ? $company->email : '' }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <div class="form-group error-text">
                                        <label for="date_join">{{ __('menu_wording.form.company_npwp') }}</label>
                                        <input type="text" class="form-control" id="npwp" role="presentation"
                                            autocomplete="off" name="npwp"
                                            value="{{ isset($company) ? $company->npwp : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group error-text">
                                        <label for="date_join">{{ __('menu_wording.form.company_situs') }}</label>
                                        <input type="text" class="form-control" id="situs" role="presentation"
                                            autocomplete="off" name="situs"
                                            value="{{ isset($company) ? $company->situs : '' }}">
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group error-text">
                                        <label
                                            for="company_min_cod">{{ __('menu_wording.form.company_min_cod') }}</label>
                                        <input type="text" class="form-control" id="min_value" role="presentation"
                                            autocomplete="off" name="min_value"
                                            value="{{ isset($company) ? number_format($company->min_value, 0, ',', '.') : 0 }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="about">{{ __('menu_wording.form.company_about') }} <sup
                                                class="red">*</sup></label>
                                        <textarea class="form-control" id="description" name="description" role="presentation" autocomplete="off"
                                            cols="4">{{ isset($company) ? $company->description : '' }}</textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-5 mt-3">
                        <div class="text-right">
                            <button class="btn btn-primary btn-md" type="submit" id="simpan">
                                <svg class="icon icon-cta">
                                    <use xlink:href="{{ asset('svg/action/cta-sprite.svg#save') }}"></use>
                                </svg>
                                {{ strtoupper(__('menu_wording.btn.submit')) }}</button>
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
            $('#file').on('change', function() {
                var reader = new FileReader();
                if (this.files[0].size > 1 * 1024 * 1024) {
                    Swal.fire('Ups', "{{ __('menu_wording.max_file_size', ['max' => '1MB']) }}", 'info');
                    $('#file').val('');
                    return false;
                } else {
                    reader.onload = function(event) {
                        $('#preview_img').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            });
            $('#min_value').on('keyup', function() {
                var x = document.getElementById("min_value");
                var value = formatRupiah(this.value);

                if (value.charAt(0) > 0) {
                    x.value = value;
                } else if (value.charAt(1) == '0' || value.charAt(0) == '') {
                    x.value = 0;
                } else {
                    x.value = Number(value);
                }
                return false;
            });

            $('#submitData').validate({
                rules: {
                    code: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    phone: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    code: {
                        required: "{{ __('menu_wording.validation.company_code') }}"
                    },
                    name: {
                        required: "{{ __('menu_wording.validation.company_name') }}"
                    },
                    phone: {
                        required: "{{ __('menu_wording.validation.company_phone') }}",
                    },
                    address: {
                        required: "{{ __('menu_wording.validation.company_address') }}",
                    },
                    email: {
                        required: "{{ __('menu_wording.validation.company_email') }}",
                        email: "{{ __('menu_wording.validation.email-example') }}",
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
            var file_data = $('#file').prop('files')[0];
            var dataFile = new FormData()
            $.each(form, function(idx, val) {
                dataFile.append(val.name, val.value)
            });
            dataFile.append('file', file_data);
            $.ajax({
                type: 'POST',
                url: "{{ route('company.submit') }}",
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
                        Swal.fire('Yes', data.message, 'success');
                        setTimeout(function() {
                            window.location.replace('{{ route('setting.index') }}');
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
                    Swal.fire('Ups', 'Error System', 'info');
                    console.log(data);
                }
            });
        }
    </script>
@endpush
