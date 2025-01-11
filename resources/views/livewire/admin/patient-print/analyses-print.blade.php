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

    .table-custom th,
    .table-custom td {
        border: 1px solid #e0e0e0;
        padding: 10px 15px;
        text-align: left;
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
</style>


<div dir="ltr">
    <htmlpageheader name="page-header">
        <div id="header">
            <img width="100%" height="20%" src="{{ asset('dashboard/img/print-header.jpg') }}" alt="Header Image">
        </div>
    </htmlpageheader>

    <div style="height: 110px;"></div>
    <div style="height:80%" class="container">
        <div class="card">
            <div class="container mt-5">
                @if($analyses->count() > 0)
                    <table class="table table-bordered table-responsive table-custom">
                        <!-- Header -->
                        <thead>
                        <tr>
                            <th class="text-center" colspan="2">Best clinic</th>
                            <th class="text-center" colspan="2">Date: {{ Carbon::now() }}</th>
                        </tr>
                        <tr>
                            <th class="text-center fw-bold" colspan="4"> Medical report</th>
                        </tr>
                        </thead>
                        <!-- Body -->
                        <tbody>
                        <tr>
                            <th class="fw-bold">Name</th>
                            <td>{{ $name_patient ? $name_patient : '' }}</td>
                            <th class="fw-bold">I.D Number</th>
                            <td>{{ $id_number ? $id_number : '' }}</td>
                        </tr>
                        <tr>
                            <th class="fw-bold">Date of Birth</th>
                            <td>{{ $birth_date ? $birth_date : '' }}</td>
                            <th class="fw-bold">Occupation</th>
                            <td>{{ $occupation ? $occupation : '' }}</td>
                        </tr>
                        <tr>
                            <th class="fw-bold">Phone number</th>
                            <td>{{ $mobile ? $mobile : '' }}</td>
                            <th class="fw-bold">Birthplace</th>
                            <td>{{ $birth_place ? $birth_place : '' }}</td>
                        </tr>
                        </tbody>
                    </table>
            </div>
            <table class="table table-bordered table-responsive table-custom">
                @foreach ($analyses as $analyse)
                    <thead>
                    <tr>
                        <th colspan="3">
                            <center>Patient analysis</center>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <center> Date : {{date("Y/m/d")}} </center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Clinic</strong> {{$analyse->category ? $analyse->category->name : __("Nothing") }}
                        </td>
                        <td><strong>Doctor</strong> {{$analyse->doctor ? $analyse->doctor->name : __("Nothing") }}</td>
                        <td><strong>Name Analyse</strong> {{$analyse->name}}</td>
                    </tr>
                    <tr>
                        <td><strong>Number Analyse</strong> {{$analyse->analyse_number}}</td>
                        <td><strong>Analysis Date</strong> {{ date('Y/m/d', strtotime($analyse->analyse_date))   }}</td>
                        <td><strong>Analyse Result</strong> {{$analyse->analyse_result}}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3"><strong>Notes</strong> {{$analyse->notes}}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
            @else
                <h1 style="color: red;text-align: center">Empty list</h1>
            @endif
        </div>
    </div>

    <htmlpagefooter name="page-footer">
        <div id="footer">
            <img width="100%" height="20%" src="{{ asset('dashboard/img/print-footer.jpg') }}" alt="Footer Image">
        </div>
    </htmlpagefooter>
</div>

