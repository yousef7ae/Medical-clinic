<div dir="ltr">

    @if($prescription)
        <table width="100%">
            <thead>
            <tr>
                <th colspan="4" style="border-bottom:none "><img width="100%"
                                                                 src="{{ asset('dashboard/img/print-header.jpg') }}"
                                                                 alt=""></th>
            </tr>
            <tr>
                <th colspan="4" align="center" style="font-size: 24px;border: 0;color: #0a53be"><span
                        style="display: inline-block;padding: 10px"><b>Patient Prescription</b></span></th>
            </tr>
            <tr>
                <th colspan="2" align="start" style="font-size: 18px;border: 0">
                    <p style="margin-bottom: 0">DATE:<b> 05 / 02/ 2023</b></p>
                    <p><b> contact number:  +972597453786</b></p>
                </th>
                <th colspan="2" align="end" style="font-size: 18px;border: 0">
                    <p style="padding: 10px">INVOICE TO: Palestine - Kafr Kana Al-Rasheed Street</p>
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
                    <h5>Patient Name : </h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ ($patient = $prescription->patient) ? $patient->name : '' }}</h5>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>UpdateClinic section :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ $prescription->doctor->category->name ?? 'لايوجد' }}</h5>
                </td>
            </tr>
            <tr>
                <td width="150" class="px-3">
                    <h5>Dr. Name :</h5>
                </td>
                <td colspan="3">
                    <h5 style="font-weight: bold ;">{{ $prescription->doctor->name ?? 'لايوجد' }}</h5>
                </td>
            </tr>
{{--            <tr>--}}
{{--                <td width="150" class="px-3">--}}
{{--                    <h5>Clinic section :</h5>--}}
{{--                </td>--}}
{{--                <td colspan="3">--}}
{{--                    <h5 style="font-weight: bold ;">{{ ($category = $prescription->category) ? $category->name : '' }}</h5>--}}
{{--                </td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td width="150" class="px-3">--}}
{{--                    <h5>Digital Number :</h5>--}}
{{--                </td>--}}
{{--                <td colspan="3">--}}
{{--                    <h5 style="font-weight: bold ;">{{ ($patient = $prescription->patient) ? $patient->id_number : '' }}</h5>--}}
{{--                </td>--}}
{{--            </tr>--}}
            <tr>
                <td colspan="4">
                    <h3 style="color: #0a53be">Medication information</h3>
                </td>
            </tr>
            <tr>
                <td width="170" class="px-3">
                    <h5>Rx :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $prescription->name_drug }}</h5>
                </td>
                <td width="200" class="px-3">
                    <h5>Frequency :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $prescription->number_drug }}</h5>
                </td>
            </tr>
            <tr>
                <td width="170" class="px-3">
                    <h5>Strength :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $prescription->medicine_dose }}</h5>
                </td>
                <td width="200" class="px-3">
                    <h5>Unites :</h5>
                </td>
                <td>
                    <h5 style="font-weight: bold ;">{{ $prescription->medicine_unit }}</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <h5>Medical Prescription :</h5>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span style=" font-weight: bold; line-height: 30px">{{ $prescription->notes }}</span>
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
        <h1 style="color: red;text-align: center"> Empty list</h1>
    @endif

</div>
@section('js_code')
    <script type="text/javascript">
        $(window).on('load', function () {
            window.print();
        });
    </script>
@endsection
