@extends('layouts.layout')
@section('title', __('menu_wording.staff.view_title'))
<style>
    .swal2-show{
        width:484px !important;
    }
</style>
@section('content')
<div class="row wrapper white-bg page-heading border">
    <div class="col-lg-6 col-4">
        <h2>{{(__('menu_wording.btn.view'))}}</h2>
    </div>
    <div class="col-lg-6 col-8">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}" class="strong font-weight-bold">{{(__('menu_wording.menu_home'))}}</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{route('staff.index')}}" class="strong font-weight-bold">{{(__('menu_wording.menu_staff'))}}</a>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-body">
                <div class="text-center">
                    <div class="m-b-sm">
                        <img src="{{ url($user->photo) }}" class="img-fluid rounded-circle" width="100px;"/>
                    </div>
                    <h2>{{ $user->nik }}</h2>
                    <h1 class="title-header mt-1">{{ strtoupper($user->name) }}</h1>
                </div>
                <div class="">
                    <div class="mb-5 mt-5">
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.email')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{ $user->email }}</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.gender')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{ $user->gender==0? __('menu_wording.header.male') : __('menu_wording.header.female')}}</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.phone')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{ $user->no_telp }}</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.address')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{ $user->address }}</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.role')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{strtoupper($role)}}</div>
                        </div>
                        <div class="row g-0">
                            <div class="col-lg-4 col-4">
                                <p>{{__('menu_wording.header.date_join')}}</p>
                            </div>
                            <div class="col text-alternate align-middle">{{ date('d/m/Y',strtotime($user->created_at)) }}</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body mt-3">
                    <div class="card-title">
                        <h5 class="title-header">RIWAYAT PEGAWAI {{strtoupper(__('menu_wording.header.7daysago'))}} </h5>
                    </div>
                    <div class="table-responsive">
                        <table id="table1" class="table display" style="width:100%">
                            <thead>
                                <tr>
                                    <th width="5px;">{{strtoupper(__('menu_wording.header.no'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.date'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.modul'))}}</th>
                                    <th>{{strtoupper(__('menu_wording.header.activity'))}}</th>
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
<script language="javascript" type="text/javascript">
    var table;
    $(document).ready(function () {
        table= $('#table1').DataTable({
                "processing": true,
                "serverSide": true,
                "pageLength": 50,
                "select"    : true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
                "ajax":{
                            "url": "{{ route("staff.getdatadetail") }}",
                            "dataType": "json",
                            "type": "POST",
                            data: function ( d ) {
                                d._token= "{{csrf_token()}}";
                                d.enc_id = "{{$enc_id}}";
                            }
                        },

                "columns": [
                    {
                        "data": "no",
                        "orderable" : false,
                    },
                    { "data": "tgl","orderable" : false,},
                    { "data": "modul","orderable" : false,},
                    { "data": "info","orderable" : false,},
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
    });
</script>
@endpush
