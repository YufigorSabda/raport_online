@extends('layouts.layout')
@section('title', ''.__('menu_wording.menu_staff').'')
@section('content')
<div class="row wrapper white-bg page-heading border">
    <div class="col-lg-6 col-6">
        <h2>{{(__('menu_wording.menu_staff'))}}</h2>
    </div>
    <div class="col-lg-6 col-6">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}" class="strong font-weight-bold">{{(__('menu_wording.menu_home'))}}</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @can('staff.add')
                        <div class="card-title" style="float: right">
                            <a href="{{ route('staff.add')}}" class="btn btn-primary btn-xs" style="display: inline-block;"><span class="fa fa-plus"></span>&nbsp; {{strtoupper(__('menu_wording.btn.add'))}}</a>
                        </div>
                    @endcan
                    @if(session('message'))
                        <div class="alert alert-{{session('message')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('message')['desc'] }}
                        </div>
                    @endif
                    <div class="table-responsive">
                        <table id="table1" class="table table-hover dt-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5px;">{{strtoupper(__('menu_wording.header.no'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.nik'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.name'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.email'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.phone'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.role'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.status'))}}</th>
                                    <th class="text-center">{{strtoupper(__('menu_wording.header.action'))}}</th>
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

@endsection
@push('scripts')
<script type="text/javascript">
    var table,tabledata,table_index;
       $(document).ready(function(){
            $.ajaxSetup({
               headers: { "X-CSRF-Token" : $("meta[name=csrf-token]").attr("content") }
            });

            table= $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 50,
                "select"    : true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
                "ajax":{
                            "url": "{{ route("staff.getdata") }}",
                            "dataType": "json",
                            "type": "POST",
                            data: function ( d ) {
                                d._token= "{{csrf_token()}}";
                            }
                        },

                "columns": [
                    {
                        "data": "no",
                        "orderable" : false,
                    },
                    { "data": "nik","orderable" : false,},
                    { "data": "name","orderable" : false,"className" : "text-uppercase"},
                    { "data": "email","orderable" : false,},
                    { "data": "no_telp","orderable" : false,},
                    { "data": "rolename","orderable" : false,"className" : "text-uppercase"},
                    { "data": "status_user","orderable" : false},
                    { "data" : "action",
                        "orderable" : false,
                        "className" : "text-center",
                    },
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "{{__('menu_wording.datatables.search')}}",
                    emptyTable: "{{__('menu_wording.datatables.no_data')}}",
                    info: "{{__('menu_wording.datatables.showing')}} _START_ {{__('menu_wording.datatables.to')}}  _END_ {{__('menu_wording.datatables.of')}} _MAX_ {{__('menu_wording.datatables.entries')}}.",
                    infoEmpty: "{{__('menu_wording.datatables.info_empty')}}",
                    lengthMenu: "{{__('menu_wording.datatables.show')}} _MENU_ {{__('menu_wording.datatables.entries')}}",
                    loadingRecords: "{{__('menu_wording.datatables.loading')}}",
                    processing: "{{__('menu_wording.datatables.loading')}}",
                    paginate: {
                        "first": "{{__('menu_wording.datatables.first')}}",
                        "last": "{{__('menu_wording.datatables.last')}}",
                        "next": "{{__('menu_wording.datatables.next')}}",
                        "previous": "{{__('menu_wording.datatables.prev')}}",
                    },
                }
            });

            $.fn.dataTable.ext.errMode = 'none';
            $('#table1').on( 'error.dt', function ( e, settings, techNote, message ) {
                console.log( 'Error/Bug : ', message );
            }).DataTable();


            table.on('select', function ( e, dt, type, indexes ){
                table_index = indexes;
                var rowData = table.rows( indexes ).data().toArray();
            });
       });
       function deleteData(e,enc_id){
            var token = '{{ csrf_token() }}';
            Swal.fire({
                text                : "{{__('menu_wording.alert.are_you_sure')}}",
                icon                : 'warning',
                showCancelButton    : true,
                confirmButtonClass  : "btn-danger",
                confirmButtonText   : "{{__('menu_wording.alert.yes')}}",
                cancelButtonText    :"{{__('menu_wording.alert.no')}}",
                confirmButtonColor  : "#ec6c62",
                closeOnConfirm      : false
            }).then(function(result) {
                if (result.value) {
                    $.ajaxSetup({
                        headers: { "X-CSRF-Token" : $("meta[name=csrf-token]").attr("content") }
                    });
                    $.ajax({
                        type    : 'DELETE',
                        url     : '{{route("staff.delete",[null])}}/' + enc_id,
                        headers : {
                            'X-CSRF-TOKEN': token
                        },
                        success : function(data){
                            if (data.status=='success') {
                                Swal.fire('Yes',data.message,'success');
                                table.ajax.reload(null, true);
                            }else{
                                Swal.fire('Ups',data.message,'info');
                            }
                        },
                        error: function(data){
                            console.log(data);
                            Swal.fire("Ups", data.message, "error");
                        }
                    });
                }
            });
       }
 </script>
@endpush
