@php use App\Models\Consultation; @endphp

<style type="text/css">
    @page {
        size: auto;
        margin-top: 4cm;
        margin-bottom: 6cm;
        header: page-header;
        footer: page-footer;
    }

    .print-page {
        page-break-before: auto;
        /* Ensure a page break before each element with class .print-page */
        page-break-after: always;
        /* Ensure a page break after each element with class .print-page */
    }

    /* Prevent a page break before the first .print-page element */
    .print-page:first-of-type {
        page-break-before: auto;
        page-break-after: avoid;
    }

    .table-custom tbody {
        max-height: calc(100% - 3.4cm);
        /* Adjust the maximum height based on your header and footer heights */
        overflow: hidden;
        page-break-inside: avoid;
        /* Avoid breaking rows inside a page */
    }

    /* Add specific styles for page header and footer */
    #header {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
    }

    #footer {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
    }

    /* Add a page break class to control page breaks */
    .page-break {
        page-break-before: always;
    }

    .table-custom {
        width: 100%;
        max-height: calc(100% - 4.4cm);
        /* Adjust the maximum height based on your header and footer heights */
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
    .pColor{
        color: #0082c0;
    }
    .fs-2{
        font-size: 20px;
        font-weight: bold;
    }
</style>

<div dir="ltr">
    <htmlpageheader name="page-header">
        <div id="header">
            <img width="100%" src="{{ asset('dashboard/img/print-header.jpg') }}" alt="Header Image">
        </div>
    </htmlpageheader>

    @if ($consultation)
    <table class="table-custom">
        <thead>
            <tr>
                <th colspan="3">
                    <center>Consultation information</center>
                </th>
            </tr>
            <tr>
                <th colspan="3">
                    <center> Date: {{ date('Y/m/d') }} </center>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <strong>Counseling type :</strong> {{ Consultation::typeList($consultation->type) }}
                </td>
                <td>
                    <strong>The Category:</strong> {{ $consultation->category ? $consultation->category->name : __('Nothing') }}
                </td>
            </tr>
            <!-- start -->
            <!-- Medical history -->
            <tr>
           <tr>
                <td colspan="3"><center class="pColor fs-2">Medical history</center></td>
            </tr>
           </tr>
            <tr>
                <td>
                    <strong>DIABETES MELLITUS:</strong>
                    {{ $consultation->medical_history ? $consultation->medical_history : __('Nothing') }}
                </td>
                <td>
                    <strong>From: </strong>
                    {{ $consultation->medical_history_text ? $consultation->medical_history_text : __('Nothing') }}

                </td>
            </tr>
            <tr>
                <td>
                    <strong>DRUG: </strong>{{ $consultation->medical_history_drug ? $consultation->medical_history_drug : __('Nothing') }}
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <strong>HYPERTENSION:</strong>
                    {{ $consultation->medical_history2 ? $consultation->medical_history2 : __('Nothing') }}
                </td>
                <td>
                    <strong>From:</strong>{{ $consultation->medical_history_text2 ? $consultation->medical_history_text2 : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>DRUG:</strong>{{ $consultation->medical_history_drug2 ? $consultation->medical_history_drug2 : __('Nothing') }}
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <strong>CARDIOVASCULAR DISEASE:</strong>
                    {{ $consultation->medical_history3 ? $consultation->medical_history3 : __('Nothing') }}
                </td>
                <td>
                    <strong>From:</strong>
                    {{ $consultation->medical_history_text3 ? $consultation->medical_history_text3 : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>DRUG:</strong>{{ $consultation->medical_history_drug3 ? $consultation->medical_history_drug3 : __('Nothing') }}
                </td>
                <td>
                </td>
            </tr>
            
             <!-- جراحة -->
             <tr style="border: 0cm;">
                <td colspan="3"></td>
            </tr>
             <tr style="border: 0cm;">
                <td colspan="3"></td>
            </tr>
           <tr>
                <td colspan="3"><center class="pColor fs-2">Surgery</center></td>
            </tr>
            <tr>
                <td>
                    <strong>RADICAL
                        PROSTATECTOMY:</strong>{{ $consultation->surgery ? $consultation->surgery : __('Nothing') }}
                </td>
                <td>
                    <!-- <strong>Abdominal
                    Surgery:</strong>{{ $consultation->surgery2 ? $consultation->surgery2 : __('Nothing') }} -->
                    <strong>Date:</strong>{{ $consultation->f ? $consultation->surgery_date : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        DRUG</strong>{{ $consultation->surgery ? $consultation->surgery : __('Nothing') }}
                </td>
                <td>
                    <!-- <strong>From:</strong>{{ $consultation->f ? $consultation->surgery_text : __('Nothing') }} -->
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                    Abdominal Surgery: </strong>{{ $consultation->surgery2 ? $consultation->surgery2 : __('Nothing') }}
                </td>
                <td>
                    <!-- <strong>Abdominal
                    Surgery:</strong>{{ $consultation->surgery2 ? $consultation->surgery2 : __('Nothing') }} -->
                    <strong>Date:</strong>{{ $consultation->surgery2_date ? $consultation->surgery2_date : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                        DRUG</strong>{{ $consultation->surgery2 ? $consultation->surgery2 : __('Nothing') }}
                </td>
                <td>
                    <!-- <strong>From:</strong>{{ $consultation->f ? $consultation->surgery_text : __('Nothing') }} -->
                </td>
            </tr>
            <tr>
                <td>
                    <strong>
                    Back Surgery: </strong>{{ $consultation->surgery3 ? $consultation->surgery3 : __('Nothing') }}
                </td>
                <td>
                    <!-- <strong>Abdominal
                    Surgery:</strong>{{ $consultation->surgery2 ? $consultation->surgery2 : __('Nothing') }} -->
                    <strong>Date: </strong>{{ $consultation->f ? $consultation->surgery3_date : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                  <strong>DRUG: </strong>{{ $consultation->surgery3 ? $consultation->surgery3 : __('Nothing') }}
                <td>
                </td>
            </tr>
            <!-- other -->
            <tr style="border: 0cm;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan="3"><center class="pColor fs-2">Other</center></td>
            </tr>
            <tr>
                <td>
                    <strong>Allergy :</strong> {{ $consultation->allergy ? $consultation->allergy : __('Nothing') }}
                </td>
                <td>
                    <strong>From:</strong> {{ $consultation->allergy_text ? $consultation->allergy_text : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td>
                    <strong>Date: </strong>{{ $consultation->date ? $consultation->date : ''}}
                </td>
                <td>

                </td>
            </tr>
            <tr>
                <td>
                    <strong>Other
                        surgery:</strong>
                    {{ $consultation->other_surgery ? $consultation->other_surgery : __('Nothing') }}
                </td>
                <td>
                <strong>LAB:</strong> {{ $consultation->lab ? $consultation->lab : __('Nothing') }}
                </td>
            </tr>
            <tr>
               
                <td>
                <strong>Other Long Term
                        medication:</strong>
                    {{ $consultation->other_medication ? $consultation->other_medication : __('Nothing') }}
                </td>
                <td>
                <strong>examination:</strong>
                    {{ $consultation->examination ? $consultation->examination : __('Nothing') }}
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <strong>the international index of erectile function questionnaire ( IIEF 5 ):</strong>
                    {{ $consultation->international_index ? $consultation->international_index : __('Nothing') }}
                </td>
               
            </tr>
            <tr>
                <td colspan="3">
                    <strong>Impression and
                        recommendation:</strong>
                    {{ $consultation->impression_recommendation ? $consultation->impression_recommendation : __('Nothing') }}
                </td>
                <!-- <td>
                <strong>Attachments:</strong>  {{ $consultation->attachments ? $consultation->attachments : __('Nothing') }}
            </td> -->
            </tr>
        </tbody>
    </table>
    @else
    <h1 style="color: red;text-align: center">Empty list</h1>
    @endif

    <htmlpagefooter name="page-footer">
        <div id="footer">
            <img width="100%" src="{{ asset('dashboard/img/print-footer.jpg') }}" alt="Footer Image">
        </div>
    </htmlpagefooter>

    @section('js_code')
    <script type="text/javascript">
        $(window).on('load', function() {
            window.print();
        });
    </script>
    @endsection