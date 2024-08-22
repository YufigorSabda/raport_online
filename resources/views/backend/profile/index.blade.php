@extends('layouts.layout')
@php
    $title_header = __('menu_wording.menu_profile');
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
            <h2>{{ strtoupper(__('menu_wording.menu_profile')) }}</h2>
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
                                <div class="col-md-1">
                                    <div class="form-group error-text">
                                        <img src="{{ isset($profile) ? url($profile->photo) : asset('files/staff/no_img.png') }}"
                                            class="img-fluid" width="100px;" id="preview_img" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group error-text">
                                        <label for="file">{{ strtoupper(__('menu_wording.form.foto')) }} <sup
                                                class="opsional">Opsional</sup></label>
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="nik">{{ strtoupper(__('menu_wording.form.nik')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="nik" name="nik"
                                            value="{{ isset($profile) ? $profile->nik : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="name">{{ strtoupper(__('menu_wording.form.name')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ isset($profile) ? $profile->name : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="phone">{{ strtoupper(__('menu_wording.form.phone')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            onkeypress="return isPhone(event)"
                                            value="{{ isset($profile) ? $profile->no_telp : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="email">{{ strtoupper(__('menu_wording.form.email')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ isset($profile) ? $profile->email : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="address">{{ strtoupper(__('menu_wording.form.address')) }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ isset($profile) ? $profile->address : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="gender">{{ strtoupper(__('menu_wording.form.gender')) }} <sup
                                                class="red">*</sup></label>
                                        <br />
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="0"
                                                {{ isset($profile) ? ($profile->gender == '0' ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label"
                                                for="male">{{ strtoupper(__('menu_wording.form.male')) }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="1"
                                                {{ isset($profile) ? ($profile->gender == '1' ? 'checked' : '') : '' }}>
                                            <label class="form-check-label"
                                                for="female">{{ strtoupper(__('menu_wording.form.female')) }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="date_join">{{ strtoupper(__('menu_wording.form.date_join')) }} <sup
                                                class="red">*</sup></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span> <input
                                                type="text" class="form-control" id="date_join" name="date_join"
                                                value="{{ isset($profile) ? date('d/m/Y', strtotime($profile->created_at)) : date('d/m/Y') }}"
                                                role="presentation" autocomplete="off" readonly>
                                        </div>
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
                                {{ isset($profile) ? strtoupper(__('menu_wording.btn.update')) : strtoupper(__('menu_wording.btn.submit')) }}</button>
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
                reader.onload = function(event) {
                    $('#preview_img').attr('src', event.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            });
            $.validator.addMethod("startsWith08", function(value, element) {
                return this.optional(element) || /^08/.test(value);
            }, "No Whatsapp harus dimulai dari '08'");
            $('#submitData').validate({
                rules: {
                    nik: {
                        required: true
                    },
                    name: {
                        required: true
                    },
                    email: {
                        required: true
                    },
                    phone: {
                        required: true,
                        startsWith08: true
                    },
                    date_join: {
                        required: true,
                    },
                    address: {
                        required: true,
                    }
                },
                messages: {
                    nik: {
                        required: "{{ __('menu_wording.validation.nik') }}"
                    },
                    name: {
                        required: "{{ __('menu_wording.validation.name') }}"
                    },
                    email: {
                        required: "{{ __('menu_wording.validation.email') }}"
                    },
                    phone: {
                        required: "{{ __('menu_wording.validation.phone') }}"
                    },
                    address: {
                        required: "{{ __('menu_wording.validation.address') }}",
                    },
                    date_join: {
                        required: "{{ __('menu_wording.validation.date_join') }}",
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
            })
            dataFile.append('file', file_data);
            $.ajax({
                type: 'POST',
                url: "{{ route('profile.save') }}",
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
