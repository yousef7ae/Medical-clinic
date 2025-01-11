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
                <table class="table table-bordered table-responsive table-custom">
                    <!-- Header -->
                    <thead>
                    <tr>
                        <th class="text-center" colspan="2">Best clinic</th>
                        <th class="text-center" colspan="2">Date: {{ Carbon::now() }}</th>
                    </tr>
                    <tr>
                        <th class="text-center fw-bold" colspan="4">Medical report</th>
                    </tr>
                    </thead>
                    <!-- Body -->
                    <tbody>
                    <tr>
                        <th class="fw-bold">Name</th>
                        <td>{{ $patient_name }}</td>
                        <th class="fw-bold">I.D Number</th>
                        <td>{{ $id_number }}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Date of Birth</th>
                        <td>{{ $birth_date }}</td>
                        <th class="fw-bold">Occupation</th>
                        <td>{{ $occupation }}</td>
                    </tr>
                    <tr>
                        <th class="fw-bold">Phone number</th>
                        <td>{{ $mobile }}</td>
                        <th class="fw-bold">Birthplace</th>
                        <td>{{ $birth_place }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <table class="table table-bordered table-responsive table-custom">
                @foreach ($consultations as $consultation)
                    <thead>
                    <tr>
                        <th colspan="2">
                            <center> Personal Medical History</center>
                        </th>
                    </tr>
                    <tr>
                        <th colspan="2">
                            <center>Date : {{ $consultation->date }} </center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td><strong>Diabetes mellitus:</strong> {{ $medical_history_text }}</td>
                        <td><strong>Medication:</strong> {{ $consultation->medical_history_drug }}</td>
                    </tr>
                    <tr>
                        <td><strong>Hypertension:</strong> {{ $consultation->medical_history_text2 }}</td>
                        <td><strong>Medication:</strong> {{ $consultation->medical_history_drug2 }}</td>
                    </tr>
                    <tr>
                        <td><strong>Cardiovascular Disease:</strong> {{ $consultation->medical_history_text3 }}
                        </td>
                        <td><strong>Medication:</strong> {{ $consultation->medical_history_drug3 }}</td>
                    </tr>
                    <tr>
                        <td><strong>Other Diagnosis:</strong> {{ $consultation->other_diagnosis }}</td>
                        <td><strong>Other Medication:</strong> {{ $consultation->other_medication }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Drug Allergies:</strong>
                            {{ $consultation->drug_allergies == 1 ? 'Yes' : 'No' }}</td>
                    </tr>
                    <tr>
                        <th colspan="3">
                            <center> Past Surgery</center>
                        </th>
                    </tr>
                    <tr>
                        <td><strong>Past Surgery:</strong> {{ $consultation->surgery ? 'yes' : 'no' }}</td>
                        <td><strong>Since:</strong> {{ $consultation->surgery_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Abdominal surgery:</strong> {{ $consultation->surgery2 ? 'yes' : 'no' }}</td>
                        <td><strong>Since:</strong> {{ $consultation->surgery2_date }}</td>
                    </tr>
                    <tr>
                        <td><strong>Back surgery:</strong> {{ $consultation->surgery3 ? 'yes' : 'no' }}</td>
                        <td><strong>Since:</strong> {{ $consultation->surgery3_date }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Other surgery:</strong> {{ $consultation->other_surgery }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Lab Result:</strong> {{ $consultation->lab }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>IIEF 5 Score:</strong> {{ $consultation->international_index }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Examination:</strong> {{ $consultation->examination }}</td>
                    </tr>
                    <tr>
                        <td colspan="2"><strong>Diagnosis and Recommendation:</strong>
                            {{ $consultation->impression_recommendation }}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>

    <htmlpagefooter name="page-footer">
        <div id="footer">
            <img width="100%" height="20%" src="{{ asset('dashboard/img/print-footer.jpg') }}" alt="Footer Image">
        </div>
    </htmlpagefooter>
</div>
