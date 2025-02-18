@extends('_layouts.email')

@php
    
    $headerText = $content;

@endphp

@section('email-content')

    <table class="default" align="center" width="570" cellpadding="0" cellspacing="0" role="presentation" style="padding: 10px 20px;">

        <tr align="center" width="570" height="100">
            <td>
                <p style="font-size: 24px; font-weight: bolder; text-align: center;">Salut, {{ $name }}</p>
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td style="text-align:center; font-size:18px;">
                Am primit mesajul tau trimis prin interamediul formularului de contact de pe site-ul nostru.
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td style="text-align:center; font-size:18px;">
                {{ $content }}
            </td>
        </tr>
        <tr align="center" width="570" height="100">
            <td style="text-align:center; font-size:18px;">
                In cel mai scurt timp urmeaza sa fii contactat de catre un reprezentant al firmei noastre.
            </td>
        </tr>
    </table>

@endsection