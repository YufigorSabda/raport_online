@extends('layouts.layout')
@php
    $title_header = isset($user)? __('menu_wording.role.edit_title') : __('menu_wording.role.add_title');
@endphp
@section('title', $title_header)
@section('content')
<div class="row wrapper white-bg page-heading border">
    <div class="col-lg-6 col-4">
        <h2>{{$title_header}}</h2>
    </div>
    <div class="col-lg-6 col-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">{{(__('menu_wording.menu_home'))}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('role.index')}}">{{(__('menu_wording.menu_role'))}}</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row mb-4">
        <div class="col-lg-12">
            <div class="card card-body">
                <div class="card-title">
                    @if(session('message'))
                        <div class="alert alert-{{session('message')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('message')['desc'] }}
                        </div>
                    @endif
                </div>
                <form class="form-horizontal" id="submitData" method="POST">
                    {{ csrf_field() }}
                    <div class="">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="enc_id" id="enc_id" value="">

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group error-text">
                                    <label for="full_name" class="text-uppercase">{{__("menu_wording.form.name")}} <sup class="red">*</sup></label>
                                    <input type="text" class="form-control" id="name" name="name" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group error-text">
                                    <label for="permission" id="permission" class="text-uppercase">{{__("menu_wording.form.permission")}} </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group error-text">
                                    <?php echo $checkbox_loop; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group m-3">
                    <div class="text-right">
                        <button class="btn btn-primary btn-md" type="submit" id="simpan">{{strtoupper(__("menu_wording.btn.submit"))}}</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection
@push('scripts')
<script src="{{ asset('assets/js/plugins/iCheck/icheck.min.js')}}"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/iCheck/1.0.2/skins/all.css" rel="stylesheet"/>
<script type="text/javascript">
    $(document).ready(function(){
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-green',
            radioClass   : 'iradio_minimal-green'
        })

        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass   : 'iradio_flat-green'
        });

        $('#submitData').validate({
            rules: {
                name:{
                    required: true
                },
            },
            messages: {
                name: {
                    required: "{{__('menu_wording.validation.role-name')}}"
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.error-text').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
            submitHandler: function(form) {
                Swal.showLoading();
                saveData();
            }
        });
    });

    function saveData(){
        $('#simpan').addClass("disabled");
        var form        = $('#submitData').serializeArray()
        var dataFile    = new FormData()
        $.each(form, function(idx, val) {
            dataFile.append(val.name, val.value)
        })
        $.ajax({
            type: 'POST',
            url : "{{route('role.save')}}",
            headers: {'X-CSRF-TOKEN': $('[name="_token"]').val()},
            data:dataFile,
            processData: false,
            contentType: false,
            dataType: "json",
            beforeSend: function () {
                Swal.showLoading();
            },
            success: function(data){
                if (data.success) {
                    Swal.close();
                    $('#alert_modal_success').modal('show');
                    $('#info_alert').html(data.message);
                    setTimeout(function () {
                        window.location.replace('{{route("role.index")}}');
                    }, 1000);
                } else {
                    Swal.fire('Ups',data.message,'info');
                }
            },
            complete: function () {
                Swal.hideLoading();
                $('#simpan').removeClass("disabled");
            },
            error: function(data){
                $('#simpan').removeClass("disabled");
                Swal.hideLoading();
                Swal.fire('Ups','Ada kesalahan pada sistem','info');
                console.log(data);
            }
        });
    }

    $(function() {
          $('.check_tree').on('ifClicked', function(e){
              var $this     = $(this),
                  checked   = $this.prop("checked"),
                  container = $this.closest("li"),
                  parents   = container.parents("li").first().find('.check_tree').first(),
                  all       = true;

              // Centang juga anak2nya
              container.find('.check_tree').each(function() {
                  if(checked) {
                      $(this).iCheck('uncheck');
                  }else{
                      $(this).iCheck('check');
                  }
              });

              // Cek sodaranya
              container.siblings().each(function() {
                  return all = ($(this).find('.check_tree').first().prop("checked") === false);
              });

              // Cek bapaknya
              if(checked) {
                  parents.iCheck('check');
              }
          });

          $('.check_tree').on('ifChanged', function(e){
                  var $this     = $(this),
                      checked   = $this.prop("checked"),
                      parents   = $this.closest("li").parents("li").first().find('.check_tree').first(),
                      all       = true;

                  // Cek bapaknya
                  if(checked) {
                      parents.iCheck('check');
                  }
          });
    });
    </script>
@endpush
