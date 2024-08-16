@extends('_layouts.email')

@php
    
    $headerText = $content;

@endphp

@section('email-content')

    <table class="default" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation">

        <tr align="center" width="570" height="100">
            <td colspan="3">
                <p style="font-size: 24px; font-weight: bolder; text-align: center;">Salut, {{ $name }}</p>
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td colspan="3" style="text-align:center; font-size:18px;">
                Ai primit un mesaj de la un utilizator care a completat formularul de contact de pe site.
            </td>
        </tr>
        <tr align="center" width="570" height="20">
            <td colspan="3" style="text-align:left; font-size:18px; font-weight:bold">
                User: {{ $data->name }}
            </td>
        </tr>
        <tr align="center" width="570" height="20">
            <td colspan="3" style="text-align:left; font-size:18px;">
                Email: {{ $data->email }}
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td colspan="3" style="text-align:left; font-size:18px;">
                Message: {{  Str::of($data->message)->limit(20) }}
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td colspan="3" style="text-align:left; font-size:18px;">
                Referrer: <a href="{{ env('APP_URL') .'/'. $data->referrer }}">{{ env('APP_URL') .'/'. $data->referrer }}</a>
            </td>
        </tr>
        <tr align="center" width="570" height="30">
                <td>&nbsp;</td>
                <td>
                <a 
                    style="font-size:18px; text-decoration:none; width:230px; text-align:center; background-color: #111827; color: #FFFFFF; padding: 6px 8px"
                    href="{{ env('APP_URL') .'/admin/contact-form-submissions/'. $data->id .'/edit' }}" target="_blank">Vezi mesajul</a>
            </td>
            <td>&nbsp;</td>
        </tr>
        <tr align="center" width="570" height="30">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
    </table>

@endsection