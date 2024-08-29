@extends('layouts.layout')
@section('title', '' . __('menu_wording.menu_walikelas') . '')
@section('content')
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
                        <div class="table-responsive">
                            <table id="table1" class="display table table-hover dt-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="5px">{{ strtoupper(__('menu_wording.header.no')) }}</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Wali Kelas</th>
                                        <th class="text-center" width="130px">
                                            {{ strtoupper(__('menu_wording.header.action')) }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="text-center">{{ $value->nama_kelas }}</td>
                                            <td class="text-center">{{ $value->ref_guru->user->name }}</td>
                                            <td class="d-flex justify-content-center" style="gap: 5px">
                                                <button class="btn btn-warning" onclick="openEditModal({{ $value->id }})"
                                                    data-toggle="modal" data-target="#editModal"><i
                                                        class="fas fa-edit"></i></button>
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

    {{-- Modal Edit --}}
    @include('backend.wali_kelas.edit_modal')

    {{-- Modal Reset --}}

@endsection
