@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_report.staff') . '')
@section('content')
    <div class="row wrapper white-bg page-heading">
        <div class="col-lg-6 col-3">
            <h2>{{ __('menu_wording.menu_report.staff') }}</h2>
        </div>
        <div class="col-lg-6 col-9">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('menu_wording.menu_home') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-lg-8">
                    </div>
                    <div class="col-lg-4 loginRight">
                        <div class="align-middle mt-4">
                            @can('reportstaff.excel')
                                <button id="excel" class="btn btn-warning" target="_blank">
                                    <svg class="icon icon-cta">
                                        <use xlink:href="{{ asset('svg/action/cta-sprite.svg#excel') }}"></use>
                                    </svg>{{ strtoupper(__('menu_wording.btn.export_excel')) }}
                                </button>
                            @endcan
                            @can('reportstaff.pdf')
                                <button id="pdf" class="btn btn-secondary" target="_blank">
                                    <svg class="icon icon-cta">
                                        <use xlink:href="{{ asset('svg/action/cta-sprite.svg#pdf') }}"></use>
                                    </svg>
                                    {{ strtoupper(__('menu_wording.btn.export_pdf')) }}
                                </button>
                            @endcan
                        </div>
                    </div>
                </div>
                <div class="card mt-2">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-{{ session('message')['status'] }}">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                                {{ session('message')['desc'] }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table id="table1" class="table table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5px;">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.nik')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.name')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.email')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.phone')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.gender')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.address')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.role')) }}</th>
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
                    "url": "{{ route('reportstaff.getdata') }}",
                    "dataType": "json",
                    "type": "POST",
                    data: function(d) {
                        d._token = "{{ csrf_token() }}";
                        d.outlet = $('#outlet').val();
                    }
                },

                "columns": [{
                        "data": "no",
                        "orderable": false,
                    },
                    {
                        "data": "nik",
                        "orderable": false,
                    },
                    {
                        "data": "name",
                        "orderable": false,
                        "className": "text-uppercase"
                    },
                    {
                        "data": "email",
                        "orderable": false,
                    },
                    {
                        "data": "no_telp",
                        "orderable": false,
                    },
                    {
                        "data": "is_gender",
                        "orderable": false,
                    },
                    {
                        "data": "address",
                        "orderable": false,
                    },
                    {
                        "data": "rolename",
                        "orderable": false,
                        "className": "text-uppercase"
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

            $("#filter").click(function(event) {
                event.preventDefault();
                table.ajax.reload(null, false);
            });

            $("#excel").click(function(event) {
                var url = "{{ route('reportstaff.excel') }}";
                window.open(url, '_blank');
            });

            $("#pdf").click(function(event) {
                var url = "{{ route('reportstaff.pdf') }}";
                window.open(url, '_blank');
            });


            table.on('select', function(e, dt, type, indexes) {
                table_index = indexes;
                var rowData = table.rows(indexes).data().toArray();
            });
        });
    </script>
@endpush
