@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_teacher') . '')
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-6">
            <h2>{{ __('menu_wording.menu_teacher') }}</h2>
        </div>
        <div class="col-lg-6 col-6">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('dashboard') }}" class="strong font-weight-bold">{{ __('menu_wording.menu_home') }}</a>
                </li>
            </ol>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title" style="float: right">
                            <button type="button"data-toggle="modal" data-target="#createModal"
                                class="btn btn-primary btn-xs" style="display: inline-block;">
                                <span class="fa fa-plus"></span>&nbsp;
                                {{ strtoupper(__('menu_wording.btn.add')) }}
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="table1" class="display table table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5px">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.email')) }}</th>
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.nik')) }}</th>
                                        <th class="text-center" width="120px">
                                            {{ strtoupper(__('menu_wording.header.front_degree')) }}</th>
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.name')) }}</th>
                                        <th class="text-center" width="120px">
                                            {{ strtoupper(__('menu_wording.header.back_degree')) }}</th>
                                        <th class="text-center" width="120px">
                                            {{ strtoupper(__('menu_wording.header.ptk')) }}</th>
                                        <th class="text-center" width="130px">
                                            {{ strtoupper(__('menu_wording.header.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->user->email }}</td>
                                            <td>{{ $value->nik }}</td>
                                            <td>{{ $value->gelar_depan }}</td>
                                            <td>{{ $value->user->name }}</td>
                                            <td>{{ $value->gelar_belakang }}</td>
                                            <td>{{ $value->ref_ptk->nama_ptk }}</td>
                                            <td class="d-flex justify-content-center" style="gap: 5px">
                                                <button class="btn btn-warning"
                                                    onclick="resetPassword({{ $value->user->id }})" data-toggle="modal"
                                                    data-target="#resetpwModal"><i class="fas fa-key"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Create --}}
    @include('backend.teacher.create_modal')

    {{-- Modal Reset --}}
    @include('backend.teacher.resetpw_modal')

@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-Token": $("meta[name=csrf-token]").attr("content")
                }
            });
            $('#table1').DataTable({
                "processing": true,
                "serverSide": false,
                "pageLength": 25,
                "select": true,
                "dom": '<"top">ft<"bottom"lip><"clear">',
                responsive: true,

            });

        });
    </script>
@endpush
