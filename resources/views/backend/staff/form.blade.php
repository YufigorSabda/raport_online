@extends('layouts.layout')
@php
    $title_header = isset($user) ? __('menu_wording.staff.edit_title') : __('menu_wording.staff.add_title');
@endphp
@section('title', $title_header)
@section('content')
    <style>
        .swal2-show {
            width: 484px !important;
        }
    </style>
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-5">
            <h2>{{ $title_header }}</h2>
        </div>
        <div class="col-lg-6 col-7">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('staff.index') }}"
                        class="strong font-weight-bold">{{ __('menu_wording.menu_staff') }}</a>
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
                            <div class="ibox-title">
                                @if (session('message'))
                                    <div class="alert alert-{{ session('message')['status'] }}">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">&times;</span></button>
                                        {{ session('message')['desc'] }}
                                    </div>
                                @endif
                            </div>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="enc_id" id="enc_id" value="{{ isset($user) ? $enc_id : '' }}">

                            <div class="form-group row">
                                <div class="col-md-1">
                                    <div class="form-group error-text">
                                        <img src="{{ isset($user) ? url($user->photo) : url('files/staff/no_img.png') }}"
                                            class="img-fluid" width="100px;" id="preview_img" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group error-text">
                                        <label for="file">{{ __('menu_wording.form.foto') }} <sup
                                                class="opsional">Opsional</sup></label>
                                        <input type="file" class="form-control" id="file" name="file">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="nik">{{ __('menu_wording.form.nik') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="nik" name="nik"
                                            value="{{ isset($user) ? $user->nik : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="name">{{ __('menu_wording.form.name') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ isset($user) ? $user->name : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group error-text">
                                        <label for="email">{{ __('menu_wording.form.email') }} <sup
                                                class="red">*</sup></label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ isset($user) ? $user->email : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group error-text">
                                        <label for="phone">{{ __('menu_wording.form.phone') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            onkeypress="return isPhone(event)"
                                            value="{{ isset($user) ? $user->no_telp : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="gender">{{ __('menu_wording.form.gender') }} <sup
                                                class="red">*</sup></label>
                                        <br />
                                        <div class="form-check form-check-inline mt-2">
                                            <input class="form-check-input" type="radio" name="gender" id="male"
                                                value="0"
                                                {{ isset($user) ? ($user->gender == '0' ? 'checked' : '') : 'checked' }}>
                                            <label class="form-check-label"
                                                for="male">{{ __('menu_wording.form.male') }}</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="female"
                                                value="1"
                                                {{ isset($user) ? ($user->gender == '1' ? 'checked' : '') : '' }}>
                                            <label class="form-check-label"
                                                for="female">{{ __('menu_wording.form.female') }}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="address">{{ __('menu_wording.form.address') }} <sup
                                                class="red">*</sup></label>
                                        <input type="text" class="form-control" id="address" name="address"
                                            value="{{ isset($user) ? $user->address : '' }}" role="presentation"
                                            autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <div class="form-group error-text">
                                        <label for="role">{{ __('menu_wording.form.role') }} <sup
                                                class="red">*</sup></label>
                                        <select name="role" class="form-control" id="role">
                                            <option value="">{{ __('menu_wording.form.selectrole') }}</option>
                                            @foreach ($roles as $key => $row)
                                                <option
                                                    value="{{ $row->id }}"{{ $selectedrole == $row->id ? 'selected=""' : '' }}>
                                                    {{ ucfirst($row->name) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group error-text">
                                        <label for="password">{{ __('menu_wording.form.password') }}
                                            {!! isset($user) ? '' : '<sup class="red">*</sup>' !!}</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            passwordCheck="passwordCheck">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group error-text">
                                        <label for="status">{{ __('menu_wording.form.status') }}</label>
                                        <br />
                                        <select class="form-control" id="status" name="status">
                                            @foreach ($status as $key => $item)
                                                <option value="{{ $key }}"
                                                    {{ $selectedstatus === $key ? 'selected' : '' }}>{{ $item }}
                                                </option>
                                            @endforeach
                                        </select>
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
                                </svg>
                                {{ isset($user) ? strtoupper(__('menu_wording.btn.update')) : strtoupper(__('menu_wording.btn.submit')) }}</button>
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
            $('.date').datepicker({
                format: 'dd/mm/yyyy'
            });

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

            var role_id = $('#role').val();
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
                        required: true
                    },
                    date_join: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    role: {
                        required: true,
                    },
                    {!! isset($user)
                        ? ''
                        : 'password:{
                                                            required: true,
                                                            minlength: 5,
                                                        },' !!}
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
                    password: {
                        required: "{{ __('menu_wording.validation.password') }}",
                        minlength: "Minimal 5 Karakter"
                    },
                    phone: {
                        required: "{{ __('menu_wording.validation.phone') }}"
                    },
                    address: {
                        required: "{{ __('menu_wording.validation.address') }}",
                    },
                    date_join: {
                        required: "{{ __('menu_wording.validation.date_join') }}",
                    },
                    role: {
                        required: "{{ __('menu_wording.validation.role') }}",
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
            var status = $('#status').is(':checked');
            var dataFile = new FormData()
            $.each(form, function(idx, val) {
                dataFile.append(val.name, val.value)
            })
            dataFile.append('file', file_data);
            $.ajax({
                type: 'POST',
                url: "{{ route('staff.save') }}",
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
                            window.location.replace('{{ route('staff.index') }}');
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
