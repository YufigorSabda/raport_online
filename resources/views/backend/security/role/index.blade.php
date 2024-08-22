@extends('layouts.layout')
@section('title', ''.__('menu_wording.menu_role').'')
@section('content')
<div class="row wrapper white-bg page-heading border">
    <div class="col-lg-6 col-4">
        <h2>{{(__('menu_wording.menu_role'))}}</h2>
    </div>
    <div class="col-lg-6 col-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">{{(__('menu_wording.menu_home'))}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#">{{(__('menu_wording.menu_security.menu'))}}</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight ecommerce">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-{{session('message')['status']}}">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('message')['desc'] }}
                        </div>
                    @endif
                    @can('role.add')
                        <div class="card-title" style="float: right">
                            <a  href="{{route('role.add')}}" class="btn btn-primary text-uppercase"><span class="fa fa-plus"></span>&nbsp; {{__('menu_wording.btn.add')}}</a>
                        </div>
                    @endcan
                    <div class="table-responsive">
                        <table id="table1" class="table display">
                            <thead>
                                <tr>
                                    <th width="5px;">{{strtoupper(__('menu_wording.header.no'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.name'))}}</th>
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
                "pageLength": 25,
                "select"    : true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
                "ajax":{
                            "url": "{{ route("role.getdata") }}",
                            "dataType": "json",
                            "type": "POST",
                            data: function ( d ) {
                                d._token= "{{csrf_token()}}";
                                d.search_model = $('#search_model').val();
                            }
                        },

                "columns": [

                    {
                        "data": "no",
                        "orderable" : false,
                    },

                    { "data": "name"},
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

            $('#search_model').keyup(function(){
                table.ajax.reload(null, false);
            });

            table.on('select', function ( e, dt, type, indexes ){
                table_index = indexes;
                var rowData = table.rows( indexes ).data().toArray();
            });
       });

       $(document.body).on("keydown", function(e){
         ele = document.activeElement;
           if(e.keyCode==38){
             table.row(table_index).deselect();
             table.row(table_index-1).select();
           }
           else if(e.keyCode==40){

             table.row(table_index).deselect();
             table.rows(parseInt(table_index)+1).select();
             console.log(parseInt(table_index)+1);

           }
           else if(e.keyCode==13){

           }
       });
 </script>
@endpush
