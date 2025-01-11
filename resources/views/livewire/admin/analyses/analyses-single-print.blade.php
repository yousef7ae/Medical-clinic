<div dir="ltr">

    @if($analysis)
        <table width="100%">
            <thead>
            <tr>
                <th colspan="4" style="border-bottom:none "><img width="100%"
                                                                 src="{{ asset('dashboard/img/print-header.jpg') }}"
                                                                 alt=""></th>
            </tr>
            <tr>
                <th colspan="4" align="center" style="font-size: 24px;border: 0;color: #0a53be"><span
                        style="display: inline-block;padding: 10px"><b>Patient Analysis</b></span></th>
            </tr>
            <tr>
                <th colspan="2" align="start" style="font-size: 18px;border: 0">
                    <p style="margin-bottom: 0">DATE:<b> 05 / 02/ 2023</b></p>
                    <p><b>contact number:  +972597453786</b></p>
                </th>
                <th colspan="2" align="end" style="font-size: 18px;border: 0">
                    <p style="padding: 10px">INVOICE TO: Palestine - Kafr Kana Al-Rasheed Street </p>
                </th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td colspan="4">
                    <h3 style="color: #0a53be">Basic information</h3>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>Patient Name :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ ($patient = $analysis->patient) ? $patient->name : '' }}</h5>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>Clinic section :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ $analysis->doctor->category->name }}</h5>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>Dr. Name :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ $analysis->doctor->name }}</h5>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>Digital Number :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ ($patient = $analysis->patient) ? $patient->id_number : '' }}</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h3 style="color: #0a53be">Medication information</h3>
                </td>
            </tr>
            <tr>
                <td width="170" class="px-3">
                    <h5>Test Name :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $analysis->name }}</h5>
                </td>
                <td width="200" class="px-3">
                    <h5>Test Number :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $analysis->analyse_number }}</h5>
                </td>
            </tr>
            <tr>
                <td width="170" class="px-3">
                    <h5>Result Date :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $analysis->analyse_date }}</h5>
                </td>
                <td width="200" class="px-3">
                    <h5>Test Result :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $analysis->analyse_result }}</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h5>Recommendation :</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style=" font-weight: bold; line-height: 30px">{{ $analysis->notes }}</span>
                </td>
            </tr>
            </tbody>

            <tfoot>
            <tr>
                <th colspan="10">
                    <footer>
                        <img width="100%" src="{{ asset('dashboard/img/print-footer.jpg') }}" alt="">
                    </footer>
                </th>
            </tr>
            </tfoot>
        </table>
    @else
        <h1 style="color: red;text-align: center"> Empty list </h1>
    @endif

</div>
@section('js_code')
    <script type="text/javascript">
        $(window).on('load', function () {
            window.print();
        });
    </script>
@endsection
