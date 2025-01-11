@php use App\Models\Revenue; @endphp
<div>
    @if($revenues->count() > 0)
        <table width="100%">
            <thead>
            <tr class="bg-primary">
                <th colspan="10"><img width="100%" src="{{ asset('dashboard/img/header-table.jpg') }}" alt=""></th>
            </tr>
            <tr class="bg-light">
                <th colspan="5" align="start" style="font-size: 18px;border: 0"><span
                            style="display: inline-block;padding: 10px">Detection name: <b>Revenues</b> </span>
                </th>
                <th colspan="5" align="end" style="font-size: 18px;border: 0"><span
                            style="display: inline-block;padding: 10px">Report date: <b>{{date("Y/m/d" )}}</b> </span>
                </th>
            </tr>
            <tr class="bg-primary">
                <th class="text-white" colspan="10"><span
                            style="display: inline-block;padding: 10px">Revenues</span>
                </th>
            </tr>
            <tr align="center" class="bg-primary">
                <th class="table-title" scope="col">#</th>
                <th class="table-title" scope="col">Patient name</th>
                <th class="table-title" scope="col">The Clinic</th>
                <th class="table-title" scope="col">Type of revenue</th>
                <th class="table-title" scope="col">Payment method</th>
                <th class="table-title" scope="col">The total amount</th>
                <th class="table-title" scope="col">The amount paid</th>
                <th class="table-title" scope="col">Remaining amount</th>
                <th class="table-title" scope="col">Revenue date</th>
            </tr>
            </thead>
            <tbody>
            @foreach($revenues as $key => $revenue)
                <tr align="center">
                    <th scope="row">{{$key+1}}</th>
                    <td><p>{{$revenue->patient ? $revenue->patient->name : __("Nothing" )}}</p></td>
                    <td><p>{{$revenue->category ? $revenue->category->name : ''}}</p></td>
                    <td><p>{{Revenue::revenue_type_allList($revenue->revenue_type)}}</p></td>
                    <td><p>{{Revenue::payment_methodList($revenue->payment_method)}}</p></td>
                    <td><p>{{ $revenue->total_amount }}</p></td>
                    <td><p>{{ $revenue->amount }}</p></td>
                    <td><p>{{ $revenue->remainder_amount }}</p></td>
                    <td><p>{{ date('Y/m/d', strtotime($revenue->date))   }}</p></td>
                </tr>
            @endforeach
            <tr align="center">
                <td colspan="5" class="table-title bg-primary"><p>Total</p></td>
                <td><p>{{ $revenue->sum('total_amount') }}</p></td>
                <td><p>{{ $revenue->sum('amount') }}</p></td>
                <td><p>{{ $revenue->sum('remainder_amount') }}</p></td>
                <td colspan="2"></td>
            </tr>
            </tbody>
            <tfoot>
            <tr class="bg-primary">
                <th colspan="10">
                    @if ($revenues->count() > 12)
                        <img width="100%" src="{{asset('dashboard/img/footer-table.jpg')}}" alt="">

                    @else
                        <footer>
                            <img width="100%" src="{{asset('dashboard/img/footer-table.jpg')}}" alt="">
                        </footer>
                    @endif
                </th>
            </tr>

            </tfoot>

        </table>
    @else
        <h1 style="color: red;text-align: center">Empty list </h1>
    @endif

</div>
@section('js_code')
    <script type="text/javascript">
        $(window).on('load', function () {
            window.print();
        });
    </script>
@endsection
