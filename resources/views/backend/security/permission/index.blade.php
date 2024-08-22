@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_permission') . '')
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-4">
            <h2>{{ __('menu_wording.menu_permission') }}</h2>
        </div>
        <div class="col-lg-6 col-8">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}">{{ __('menu_wording.menu_home') }}</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="#">{{ __('menu_wording.menu_security.menu') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight ecommerce">
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
                        @can('permission.add')
                            <div class="card-title" style="float: right">
                                <a href="{{ route('permission.add') }}" class="btn btn-primary text-uppercase"><span
                                        class="fa fa-plus"></span>&nbsp; {{ __('menu_wording.btn.add') }}</a>
                            </div>
                        @endcan
                        <div class="table-responsive">
                            <table id="table1" class="table display table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.id')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.name')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.slug')) }}</th>
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($dataObj) > 0)
                                        @foreach ($dataObj as $n => $data)
                                            <tr>
                                                <th scope="row">{{ ++$n }}</th>
                                                <td>{{ $data->nested }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->slug }}</td>
                                                <td class="text-center">
                                                    @can('permission.edit')
                                                        <a href="{{ route('permission.edit', Crypt::encrypt($data->id)) }}"
                                                            class="btn btn-edit btn-rect ml-1">
                                                            <svg class="icon icon-cta">
                                                                <use
                                                                    xlink:href='{{ asset('svg/action/cta-sprite.svg#edit') }}'>
                                                                </use>
                                                            </svg>
                                                        </a>
                                                    @endcan
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">no records</td>
                                        </tr>
                                    @endif
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
            $('#table1').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                "responsive": true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
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
        });
    </script>
@endpush
