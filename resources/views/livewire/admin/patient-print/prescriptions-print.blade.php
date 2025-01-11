@php use Carbon\Carbon; @endphp
<style type="text/css">
    @page {
        header: page-header;
        footer: page-footer;
    }

    #header {
        padding-bottom: 100px;
    }

    #footer {
        padding-top: 100px;
    }

    /* Styling for the table */
    .table-custom {
        width: 100%;
        border-collapse: collapse;
    }

    .table-custom thead {
        background-color: #f5f5f5;
    }

    .w-100 {
        width: 100%;
    }

    .table-custom th,
    .table-custom td {
        /* border: 1px solid #e0e0e0; */
        padding: 10px 50px;
        /* text-align: center; */
        margin-bottom: 20px;
        margin-top: 20px;
    }

    .table-custom th {
        font-weight: bold;
    }

    .table-custom tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .table-custom tbody tr:hover {
        background-color: #e6f7ff;
    }

    .table-custom .fw-bold {
        font-weight: bold;
    }

    h2 {
        color: #0082c0;
    }

    .text-start {
        text-align: left;
    }

    .text-center {
        text-align: center;
        display: flex;
        justify-content: center;
    }

    .mt-2 {
        margin-top: 2rem;
    }

    .container .mt-5 {
        margin-top: 25px
    }
</style>

<div dir="ltr">
    <htmlpageheader name="page-header">
        <div id="header">
            <img width="100%" height="20%" src="{{ asset('dashboard/img/print-header.jpg') }}" alt="Header Image">
        </div>
    </htmlpageheader>

    <div style="height: 110px;"></div>
    <!-- Start Check .. -->
    <div style="height:80%" class="container">

        <div class="container mt-5">

            <h2 class="text-center" style="margin-bottom: 40px; text-align: center">Prescription</h2>

            @if ($prescriptions->count() > 0)
            <div style="margin-top: 45px">
                <h4 class=" fw-bold w-100 text-start">Patient Name:
                    <span>{{ $name_patient ? $name_patient : '' }}</span>
                </h4>
                <h4 class=" fw-bold w-100 text-start">I.D Number:
                    <span>{{ $id_number ? $id_number : '' }}</span>
                </h4>
            </div>

            @foreach ($prescriptions as $prescription)
            <div colspan="3" class="text-start " style="margin-top: 2rem">
                <h3>Rx:</h3>
            </div>
            <table class="table table-bordered table-responsive table-custom">
                <tbody>
                    <tr class="w-100 ">
                        <td class="fw-bold w-100 ">{{ $prescription->take_method }} {{ $prescription->name_drug }}</td>
                    </tr>
                    <tr class="w-100">
                        <td class="w-100 ">{{ $prescription->number_drug }}</td>
                    </tr>
                    <tr class="w-100">
                        <td class="w-100 ">{{ $prescription->medicine_dose }} {{ $prescription->medicine_unit }}</td>
                    </tr>
                    <tr class="w-100">
                        <td class="w-100 ">{{ $prescription->dosing_frequency }}</td>
                    </tr>
                </tbody>
            </table>
            @endforeach

            <div style="margin-top: 55px">
                <h4 class=" fw-bold w-100 text-start">Doctors Name: <span>{{ $prescription->doctor ? $prescription->doctor->name : __('Nothing') }}</span></h4>
                <h4 class=" fw-bold w-100 text-start">Date: <span>{{ $prescription->date }}</span></h4>
            </div>
            @else
            <h1 style="color: red;text-align: center">Empty list</h1>
            @endif
        </div>
    </div>
    <!-- End Check .. -->

    <htmlpagefooter name="page-footer">
        <div id="footer">
            <img width="100%" height="20%" src="{{ asset('dashboard/img/print-footer.jpg') }}" alt="Footer Image">
        </div>
    </htmlpagefooter>
</div>