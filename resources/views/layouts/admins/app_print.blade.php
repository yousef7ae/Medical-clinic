<!doctype html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{date('dmYgis')}}</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
            integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <!-- Mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


    <style>
        thead {
            display: table-header-group;
        !important;
        }

        tfoot {
            display: table-footer-group;
        }

        body {
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }

        table, th, td {
            /*border-bottom: 1px solid #C0DFEE;*/
            border-collapse: collapse;
        }

        .table-title {
            color: #fff;
            padding-top: 3px;
            padding-bottom: 3px
        }

        .bg-primary {
            background-color: #006da7
        }

        .bg-light {
            background-color: #D4EAF5
        }

        .text-white {
            color: #fff;
        }

        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            right: 0;
        }

        h3, h5 {
            margin: 0;
            margin-bottom: 15px;
        }

        @page {
            margin: 0mm
        }

        @media print {

        }
    </style>
    @livewireStyles
</head>
<body>

@yield('content')

{{ isset($slot) ? $slot : null }}

@livewireScripts

@yield('js_code')

</body>
</html>
