@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_student') . '')
@section('content')
    <div class="row wrapper white-bg page-heading border">
        <div class="col-lg-6 col-6">
            <h2>{{ __('menu_wording.menu_student') }}</h2>
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
                            <button type="button" data-toggle="modal" data-target="#createModal"
                                class="btn btn-primary btn-xs" style="display: inline-block;">
                                <span class="fa fa-plus"></span>&nbsp;
                                {{ strtoupper(__('menu_wording.btn.add')) }}
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table id="table1" class="display table table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5px;">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.nisn')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.name')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.phone')) }}</th>
                                        <th>{{ strtoupper(__('menu_wording.header.status')) }}</th>
                                        <th class="text-center">{{ strtoupper(__('menu_wording.header.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->nisn }}</td>
                                            <td>{{ $value->nama_siswa }}</td>
                                            <td>{{ $value->telp_seluler }}</td>
                                            <td>
                                                @if ($value->is_active == 1)
                                                    <span class="text-success font-weight-bold">Aktif</span>
                                                @else
                                                    <span class="text-danger font-weight-bold">Tidak Aktif</span>
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-center" style="gap: 5px">
                                                <button class="btn btn-warning"
                                                    onclick="openEditModal({{ $value->id }})" data-toggle="modal"
                                                    data-target="#editModal"><i class="fas fa-edit"></i></button>

                                                <button type="submit" class="btn btn-danger"
                                                    onclick="openDeleteModal({{ $value->id }})" data-toggle="modal"
                                                    data-target="#deleteModal"><i class="fas fa-trash"></i></button>
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
    @include('backend.student.create_modal')

    {{-- Modal Edit --}}
    @include('backend.student.edit_modal')

    {{-- Modal Delete --}}
    @include('backend.student.delete_modal')

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
