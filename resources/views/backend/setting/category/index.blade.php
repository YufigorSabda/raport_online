@extends('layouts.layout')
@section('title', '' . __('menu_wording.categories') . '')
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-3">
            <h2>{{ __('menu_wording.categories') }}</h2>
        </div>
        <div class="col-lg-6 col-9">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
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
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('message')['status'] }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{ session('message')['desc'] }}
                            </div>
                        @endif
                        @can('category.add')
                            <div class="card-title" style="float: right">
                                <a id="add" class="btn btn-primary text-uppercase"><span class="fa fa-plus"></span>&nbsp;
                                    {{ __('menu_wording.btn.add') }}</a>
                            </div>
                        @endcan
                        <div class="table-responsive">
                            <table id="table1" class="table table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5px;">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.name')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.description')) }}</th>
                                        {{-- <th>{{strtoupper(__('menu_wording.header.status'))}}</th> --}}
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalCategory" tabindex="-1" role="dialog" aria-labelledby="modalCategory"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form id="submitData">
                    <input type="hidden" name="enc_id" class="form-control" value="" id="enc_id" />
                    <div class="modal-header">
                        <h3 class="modal-title title-header text-uppercase" id="title"></h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group error-text">
                                    <label for="name">{{ strtoupper(__('menu_wording.form.name')) }} <sup
                                            class="red">*</sup></label>
                                    <input type="text" class="form-control" id="name" role="presentation"
                                        autocomplete="off" name="name" value="">
                                </div>
                            </div>
                            {{-- <div class="col-md-3">
                            <div class="form-group error-text">
                                <label for="status">{{strtoupper(__('menu_wording.form.status'))}} <sup class="red">*</sup></label>
                                <select class="form-control" id="status" name="status">
                                    @foreach ($status as $key => $item)
                                        <option value="{{$key}}">{{$item}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-group error-text">
                                    <label for="description">{{ strtoupper(__('menu_wording.form.description')) }} <sup
                                            class="red">*</sup></label>
                                    <textarea class="form-control" id="description" name="description" role="presentation" autocomplete="off"
                                        cols="5"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary btn-md" type="submit" id="save">
                            <svg class="icon icon-cta">
                                <use xlink:href="{{ asset('svg/action/cta-sprite.svg#save') }}"></use>
                            </svg>
                            <span id="btnText"
                                class="text-uppercase">{{ strtoupper(__('menu_wording.btn.submit')) }}</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <!-- Tags Input -->
    <script type="text/javascript">
        var table, tabledata, table_index;
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
                }
            });

            table = $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 50,
                "select": true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
                "ajax": {
                    "url": "{{ route('category.getdata') }}",
                    "dataType": "json",
                    "type": "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                    }
                },

                "columns": [

                    {
                        "data": "no",
                        "orderable": false,
                    },
                    {
                        "data": "name",
                        "orderable": false,
                    },
                    {
                        "data": "description",
                        "orderable": false,
                    },
                    // { "data": "setStatus","orderable" : false,},
                    {
                        "data": "action",
                        "orderable": false,
                        "className": "text-center",
                    },
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "{{ __('menu_wording.datatables.search') }}",
                    emptyTable: "{{ __('menu_wording.datatables.no_data') }}",
                    info: "{{ __('menu_wording.datatables.showing') }} _START_ {{ __('menu_wording.datatables.to') }}  _END_ {{ __('menu_wording.datatables.of') }} _MAX_ {{ __('menu_wording.datatables.entries') }}.",
                    infoEmpty: "{{ __('menu_wording.datatables.info_empty') }}",
                    lengthMenu: "{{ __('menu_wording.datatables.show') }} _MENU_ {{ __('menu_wording.datatables.entries') }}",
                    loadingRecords: "{{ __('menu_wording.datatables.loading') }}",
                    processing: "{{ __('menu_wording.datatables.loading') }}",
                    paginate: {
                        "first": "{{ __('menu_wording.datatables.first') }}",
                        "last": "{{ __('menu_wording.datatables.last') }}",
                        "next": "{{ __('menu_wording.datatables.next') }}",
                        "previous": "{{ __('menu_wording.datatables.prev') }}",
                    },
                }
            });

            $.fn.dataTable.ext.errMode = 'none';
            $('#table1').on('error.dt', function(e, settings, techNote, message) {
                console.log('Error/Bug : ', message);
            }).DataTable();


            table.on('select', function(e, dt, type, indexes) {
                table_index = indexes;
                var rowData = table.rows(indexes).data().toArray();
            });

            $("#add").click(function() {
                $('#modalCategory').modal('show');
                $('#enc_id').val('');
                $('#name').val('');
                $('#description').val('');
                $('#btnText').html('{{ __('menu_wording.btn.submit') }}');
                $('#title').html('{{ __('menu_wording.categories.add_title') }}');
            });

            $('#submitData').validate({
                rules: {
                    name: {
                        required: true
                    },
                    description: {
                        required: true
                    }
                },
                messages: {
                    name: {
                        required: "{{ __('menu_wording.validation.name') }}"
                    },
                    description: {
                        required: "{{ __('menu_wording.validation.description') }}",
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
            $('#save').addClass("disabled");
            var form = $('#submitData').serializeArray()
            var dataFile = new FormData()
            $.each(form, function(idx, val) {
                dataFile.append(val.name, val.value)
            });
            var token = '{{ csrf_token() }}';
            dataFile.append('_token', token);

            $.ajax({
                type: 'POST',
                url: "{{ route('category.save') }}",
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
                        table.ajax.reload(null, false);
                        $('#modalCategory').modal('hide');
                    } else {
                        Swal.fire('Ups', data.message, 'info');
                    }
                },
                complete: function() {
                    Swal.hideLoading();
                    $('#save').removeClass("disabled");
                },
                error: function(data) {
                    $('#save').removeClass("disabled");
                    Swal.hideLoading();
                    Swal.fire('Ups', 'Ada kesalahan pada sistem', 'info');
                    console.log(data);
                }
            });
        }

        function editData(e, key) {
            $('#modalCategory').modal('show');
            var data = table.row(key).data();
            $('#enc_id').val(data.enc_id);
            $('#name').val(data.name);
            $('#description').val(data.description);
            // $('#status').prop('selected',true).val(data.status);
            $('#btnText').html('{{ __('menu_wording.btn.update') }}');
            $('#title').html('{{ __('menu_wording.categories.edit_title') }}');
        }

        function deleteData(e, enc_id) {
            var token = '{{ csrf_token() }}';
            Swal.fire({
                text: "{{ __('menu_wording.alert.are_you_sure') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "{{ __('menu_wording.alert.yes') }}",
                cancelButtonText: "{{ __('menu_wording.alert.no') }}",
                confirmButtonColor: "#ec6c62",
                closeOnConfirm: false
            }).then(function(result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: {
                            "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
                        }
                    });
                    $.ajax({
                        type: 'DELETE',
                        url: '{{ route('category.delete', [null]) }}/' + enc_id,
                        headers: {
                            'X-CSRF-TOKEN': token
                        },
                        success: function(data) {
                            if (data.status == 'success') {
                                Swal.fire('Yes', data.message, 'success');
                                table.ajax.reload(null, true);
                            } else {
                                Swal.fire('Ups', data.message, 'info');
                            }
                        },
                        error: function(data) {
                            console.log(data);
                            Swal.fire("Ups", data.message, "error");
                        }
                    });
                }
            });
        }
    </script>
@endpush
