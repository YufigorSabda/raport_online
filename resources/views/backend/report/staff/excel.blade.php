<!DOCTYPE html>
<html>

<head>
    <title>Data Pegawai</title>
</head>

<body>
    <table width="100%" cellspacing="0" cellpadding="3" class="table table-bordered">
        <thead>
            <tr>
                <th colspan="8" style="text-align: center">
                    <h4 style="text-align: center;"><b>{{ strtoupper(__('menu_wording.title.report-staff')) }}</b></h4>
                </th>
            </tr>
    </table>

    <table width="100%" cellspacing="0" cellpadding="3" class="table table-bordered" style="border-collapse: collapse">
        <thead>
            <tr>
                <th width="5px;" valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.no')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.nik')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.name')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.email')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.phone')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.gender')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.address')) }}</b></th>
                <th valign="top" style='border: 0.4px solid #000;text-align:left;'>
                    <b>{{ strtoupper(__('menu_wording.header.role')) }}</b></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key => $value)
                <tr>
                    <td style="border: 0.4px solid #000;text-align: left;" valign="top">{{ $key + 1 }}</td>
                    <td data-format="0" valign="top" style='border: 0.4px solid #000;text-align:left;'>
                        {!! $value->nik !!}</td>
                    <td valign="top" style='border: 0.4px solid #000;text-align:left;'>{{ $value->name }}</td>
                    <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->email !!}</td>
                    <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->no_telp !!}</td>
                    <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->is_gender !!}</td>
                    <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->address !!}</td>
                    <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->rolename !!}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <table width="100%" cellspacing="0" cellpadding="3">
        <tr>
            <td valign="top" colspan="4" style="text-align: left;float:left">

            </td>
            <td valign="top" colspan="4" style="text-align: right;float:right">
                {{ __('menu_wording.header.date_download') }}: {{ date('d-m-Y H:i') }}
                {{ Auth()->user()->name }}
            </td>
        </tr>
    </table>
</body>

</html>
