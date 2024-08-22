<!DOCTYPE html>
<html>
<head>
    <title>Report Staff</title>
    <style>
        @page {
            sheet-size: {{$width}} {{$height}}
        }
        @page {
            header: MyHeader1;
            footer: page-footer;
        }
    </style>
</head>
<body>
    <htmlpageheader name="MyHeader1">
    <h4 style="text-align: center">{{strtoupper(__('menu_wording.title.report-staff'))}}</h4>
    <hr style="border-top:2px solid black;"/>
    </htmlpageheader>
    <sethtmlpageheader name="MyHeader1" value="on" show-this-page="1"/>
    <div>
        <table width="100%" cellspacing="0" cellpadding="3" class="table table-bordered"
            style="border-collapse: collapse">
            <thead>
                <tr>
                    <th width="5px;" valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.no'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.nik'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.name'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.email'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.phone'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.gender'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.address'))}}</th>
                    <th valign="top" style='border: 0.4px solid #000;font-size:0.8rem;text-align:left;'>{{strtoupper(__('menu_wording.header.role'))}}</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $key => $value)
                    <tr>
                        <td style="border: 0.4px solid #000;text-align: left;" valign="top">{{$key+1}}</td>
                        <td valign="top" style='border: 0.4px solid #000;text-align:left;'>{{$value->nik}}</td>
                        <td valign="top" style='border: 0.4px solid #000;text-align:left;'>{{$value->name}}</td>
                        <td valign="top" style='border: 0.4px solid #000;text-align:left;'>{{$value->email}}</td>
                        <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->no_telp !!}</td>
                        <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->is_gender !!}</td>
                        <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->address !!}</td>
                        <td valign="top" style="border: 0.4px solid #000;text-align: left;">{!! $value->rolename !!}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    <htmlpagefooter name="page-footer">
        <table width="100%" cellspacing="0" cellpadding="3">
            <tr>
                <td valign="top" colspan="3" style="text-align: left;float:left">
                    Page {PAGENO} / {nb}
                </td>
                <td valign="top" colspan="5" style="text-align: right;float:right">
                        {{__('menu_wording.header.date_download')}}: {{date('d-m-Y H:i')}}
                        {{Auth()->user()->name}}
                </td>
            </tr>
        </table>
    </htmlpagefooter>
</body>
</html>

